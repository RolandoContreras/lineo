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
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    customer.customer_id,
                                    customer.email,
                                    customer.name,
                                    courses.name as course_name,
                                    invoices.active",
                "join" => array( 'courses, invoices.course_id = courses.course_id',
                                 'customer, invoices.customer_id = customer.customer_id'),
                "order" => "invoices.invoice_id DESC");
            //GET DATA FROM INVOICES
            $obj_invoices = $this->obj_invoices->search($params);
            //SEND DATA
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
            $this->tmp_mastercms->render("dashboard/activate/activate_list");
    }
    
    public function load(){
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
    
    public function active(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $customer_id = $this->input->post("customer_id");
                $course_id = $this->input->post("course_id");
                
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
                    $data['status'] = "true";
                }else{
                    $data['status'] = "false";
                }
                echo json_encode($data); 
                exit();
            }
    }
    
    public function validate_user() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
        $username = str_to_minuscula(trim($this->input->post('username')));
        $param_customer = array(
            "select" => "customer_id,name,phone",
            "where" => "email = '$username'");
        $customer = $this->obj_customer->get_search_row($param_customer);
        if (isset($customer->customer_id) != "") {
            $data['message'] = "true";
            $data['name'] = $customer->name;
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