<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_activate extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("courses_model","obj_courses");
        $this->load->model("customer_courses_model","obj_customer_courses");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"courses.name as course_name,
                                    courses.duration,
                                    courses.course_id,
                                    customer_courses.duration_time,
                                    customer.customer_id,
                                    customer.email,
                                    customer.name,
                                    customer.last_name,
                                    customer_courses.customer_course_id,
                                    customer_courses.complete,
                                    customer_courses.date_start",
                "join" => array( 'courses, customer_courses.course_id = courses.course_id',
                                 'customer, customer_courses.customer_id = customer.customer_id'),
                "order" => "customer_courses.customer_course_id DESC");
            //GET DATA FROM INVOICES
            $obj_customer_courses = $this->obj_customer_courses->search($params);
            //SEND DATA
            $this->tmp_mastercms->set("obj_customer_courses",$obj_customer_courses);
            $this->tmp_mastercms->render("dashboard/activate/activate_list");
    }
    
    public function load($customer_course_id = NULL){
            if($customer_course_id){
               $params = array(
                        "select" =>"customer_courses.customer_course_id,
                                    customer_courses.duration_time,
                                    customer_courses.video_actual,
                                    customer_courses.total_video,
                                    courses.course_id,
                                    courses.name as course_name,
                                    courses.duration,
                                    customer.customer_id,
                                    customer.customer_id,
                                    customer.phone,
                                    customer.email,
                                    customer.name,
                                    customer.last_name,
                                    customer_courses.complete,
                                    customer_courses.date_start",
                "join" => array( 'courses, customer_courses.course_id = courses.course_id',
                                 'customer, customer_courses.customer_id = customer.customer_id'),
                "where" => "customer_courses.customer_course_id = $customer_course_id");
                $obj_customer_courses = $this->obj_customer_courses->get_search_row($params); 
                $this->tmp_mastercms->set("obj_customer_courses",$obj_customer_courses);
            }
        
            //OBTENER CLIENTES INACTIVOS
            $params = array(
                        "select" =>"email,
                                    name,
                                    customer_id",
            );
            //GET DATA COMMENTS
            $obj_customer = $this->obj_customer->search($params);
            //OBTENER COURSE ACTIVE
            $params = array(
                        "select" =>"name,
                                    course_id,
                                    price",
                "where" => "active = 1",
            );
            //GET DATA COMMENTS
            $obj_courses = $this->obj_courses->search($params);
            //send data
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->set("obj_courses",$obj_courses);
            $this->tmp_mastercms->render("dashboard/activate/active_form");    
    }
    
    public function validate(){
        //ACTIVE CUSTOMER NORMALY
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $customer_course_id = $this->input->post("customer_course_id");
                $customer_id = $this->input->post("customer_id");
                $course_id = $this->input->post("course_id");
                
                if($customer_course_id != ""){
                    if($customer_id != "" && $course_id != ""){
                        //obtener valores
                        $course_id = $this->input->post("course_id");
                        $duration_time = trim($this->input->post("duration_time"));
                        $duration_time = formato_fecha_datapicker_to_bd($duration_time);
                        $data = array(
                                'duration_time' => $duration_time,
                                'total_video' => $this->input->post("total_video"),
                                'video_actual' => $this->input->post("video_actual"),
                            );
                            $this->obj_customer_courses->update($customer_course_id, $data);
                    }
                }else{
                        if($customer_id != "" && $course_id != ""){
                            //GET DATA FROM TABLE COURSE
                            $params = array(
                                    "select" =>"price,
                                                duration",
                                    "where" => "course_id = $course_id"
                            );
                            //GET DATA FROM BONUS
                            $obj_courses = $this->obj_courses->get_search_row($params);
                            //CREATE INVOICE
                            $data_invoice = array(
                                'customer_id' => $customer_id,
                                'course_id' => $course_id,
                                'sub_total' => $obj_courses->price,
                                'igv' => 0,
                                'total' => $obj_courses->price,
                                'date' => date("Y-m-d H:i:s"),
                                'active' => 2,
                            );
                            $invoice_id = $this->obj_invoices->insert($data_invoice);
                            //CREATE CUSTOMER COURSE
                            //today
                            $today = date("Y-m-d");
                            $duration = $obj_courses->duration==null?0:$obj_courses->duration;
                            //sumar el tiempo de duración
                            $today_curso =  date("Y-m-d",strtotime($today."+ $duration days"));
                            $data = array(
                                'customer_id' => $customer_id,
                                'course_id' => $course_id,
                                'date_start' => date("Y-m-d H:i:s"),
                                'duration_time' => $today_curso,
                            );
                            $this->obj_customer_courses->insert($data);
                        }
                }
            redirect(site_url()."dashboard/activaciones");
    }
    
    public function validate_user() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
        $username = str_to_minuscula(trim($this->input->post('username')));
        $param_customer = array(
            "select" => "customer_id,name,last_name,phone",
            "where" => "email = '$username'");
        $customer = $this->obj_customer->get_search_row($param_customer);
        if (isset($customer->customer_id) != "") {
            $data['message'] = "true";
            $data['name'] = $customer->name.' '.$customer->last_name;
            $data['dni'] = $customer->phone;
            $data['customer_id'] = $customer->customer_id;
            $data['print'] = "Cliente Encontrado!";
            
        } else {
            $data['message'] = "false";
            $data['print'] = "Cliente no existe!";
        }
        echo json_encode($data);
        }
    }
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             $this->get_session();
             //OBETENER ID
             $customer_course_id = $this->input->post("customer_course_id");
             $course_id = $this->input->post("course_id");
             $customer_id = $this->input->post("customer_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($customer_course_id != null){
                $this->obj_customer_courses->delete($customer_course_id);
                //verificar si existe facturas y eliminar
                $params = array(
                        "select" =>"invoice_id",
                "where" => "course_id = $course_id and customer_id = $customer_id");
                //GET DATA FROM INVOICES
                $obj_invoices = $this->obj_invoices->get_search_row($params);
                    if($obj_invoices != null){
                        //eliminar factura
                        $this->obj_invoices->delete($obj_invoices->invoice_id);    
                    }
            }
            $data['status'] = true;
            echo json_encode($data);
        }       
    }
        
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE"){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
?>