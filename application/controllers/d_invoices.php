<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_invoices extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("courses_model","obj_courses");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    customer.customer_id,
                                    customer.name,
                                    customer.email,
                                    courses.course_id,
                                    courses.name as course_name,
                                    invoices.active",
                "join" => array( 'courses, invoices.course_id = courses.course_id',
                                 'customer, invoices.customer_id = customer.customer_id'),
                "order" => "invoices.invoice_id ASC");
            //GET DATA FROM CUSTOMER
            $obj_invoices = $this->obj_invoices->search($params);
            /// VISTA
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
            $this->tmp_mastercms->render("dashboard/invoices/invoices_list");
    }
    
    public function load($invoice_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($invoice_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    customer.customer_id,
                                    customer.name,
                                    customer.email,
                                    courses.course_id,
                                    courses.name as course_name,
                                    invoices.active",
                "join" => array( 'courses, invoices.course_id = courses.course_id',
                                 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "invoices.invoice_id = $invoice_id");
            //GET DATA FROM CUSTOMER
            $obj_invoices  = $this->obj_invoices->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
          }
            //SELECT CURSOS
            $params = array("select" => "course_id,
                                        name",
                            "where" => "active = 1",);
            $obj_courses = $this->obj_courses->search($params);   
            
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_courses",$obj_courses); 
            $this->tmp_mastercms->render("dashboard/invoices/invoices_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $invoice_id = $this->input->post("invoice_id");
        $course_id = $this->input->post("course_id");
        $total =  $this->input->post('total');
        $active =  $this->input->post('active');

        //UPDATE DATA
        $data = array(
                'course_id' => $course_id,
                'total' => $total,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_invoices->update($invoice_id, $data);
        redirect(site_url()."dashboard/facturas");
    }
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             //OBETENER MARCA_ID
             $invoice_id = $this->input->post("invoice_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($invoice_id != ""){
                $this->obj_invoices->delete($invoice_id);
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