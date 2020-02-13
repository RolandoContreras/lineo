<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
     parent::__construct();
     $this->load->model('customer_model','obj_customer');
     $this->load->model("category_model","obj_category");
    } 

    public function index(){
        //get category
        $data['obj_category'] = $this->nav_category();
        //send meta title
        $data['title'] = "Inicio de Sesión";
        $this->load->view('login',$data);
    }
        
    public function validate(){
        if (isset($_SERVER['HTTP_ORIGIN'])) {  
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");  
            header('Access-Control-Allow-Credentials: true');  
            header('Access-Control-Max-Age: 86400');   
        }

            //GET DATA STRING
            $email = $this->input->post("code");
            $pass = $this->input->post("pass");
            //SET PARAMETER
            $params = array("select" =>"customer.customer_id,
                                        customer.name,
                                        customer.email,
                                        customer.active",
                             "where" => "customer.email = '$email' and customer.password = '$pass' and customer.active = 1");
            $obj_customer = $this->obj_customer->get_search_row($params);
            
            if (isset($obj_customer->customer_id) != ""){
                    $data_customer_session['customer_id'] = $obj_customer->customer_id;
                    $data_customer_session['name'] = $obj_customer->name;
                    $data_customer_session['email'] = $obj_customer->email;
                    $data_customer_session['active'] = $obj_customer->active;
                    $data_customer_session['logged_customer'] = "TRUE";
                    $data_customer_session['active'] = $obj_customer->active;
                    $_SESSION['customer'] = $data_customer_session; 
                    $data['status'] = "true";
            }else{
                   $data['status'] = "false";
            }
            
            echo json_encode($data); 
            exit(); 
    }

    public function nav_category(){
            $params_category = array(
                        "select" =>"category_id,
                                    slug,
                                    name",
                "where" => "active = 1",
            );
            //GET DATA COMMENTS
            return $obj_category = $this->obj_category->search($params_category);
    }
    
    public function logout(){        
        $this->session->unset_userdata('customer');
	$this->session->destroy();
        redirect('home'); 
    }
    
}
