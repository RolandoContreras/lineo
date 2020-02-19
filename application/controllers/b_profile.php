<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_profile extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("category_model","obj_category");
        $this->load->model("customer_courses_model","obj_customer_courses");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CATEGORY
        $obj_category_videos = $this->nav_category();
        //get courses by customer
        $obj_courses_by_customer = $this->courses_by_customer($customer_id);
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
                        "select" =>"customer.email,
                                    customer.name,
                                    customer.password,
                                    customer.date,
                                    customer.phone,
                                    customer.active,
                                    customer.date,
                                    paises.nombre as pais",
                        "where" => "customer.customer_id = $customer_id and paises.id_idioma = 7",
                        "join" => array('paises, customer.country = paises.id'),
                        );

        $obj_customer = $this->obj_customer->get_search_row($params);
        //SEND DATA
        $this->tmp_backoffice->set("obj_courses_by_customer",$obj_courses_by_customer);
        $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_profile");
    }
    
    public function update_password(){
             if($this->input->is_ajax_request()){   
                //SELECT ID FROM CUSTOMER
               $pass = trim($this->input->post('pass'));
               $new_pass = $this->input->post('new_pass');
               $customer_id = $_SESSION['customer']['customer_id'];
               $param_customer = array(
                                "select" => "password",
                                "where" => "customer_id = '$customer_id' and password = '$pass'");
                $customer = $this->obj_customer->get_search_row($param_customer);
                
                if(isset($customer) != ""){
                    //UPDATE DATA EN CUSTOMER TABLE
                    $data = array(
                        'password' => $new_pass,
                        'updated_by' => $customer_id,
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                    $data['status'] = "true";
                }else{
                    $data['status'] = "false";
                }
               echo json_encode($data); 
            }
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
    
    public function courses_by_customer($customer_id){
        $params_customer_courses = array(
                                    "select" =>"courses.course_id,
                                                courses.name,
                                                courses.category_id,
                                                courses.slug as course_slug,
                                                customer.customer_id,
                                                category.slug as category_slug",
                                    "join" => array('customer, customer_courses.customer_id = customer.customer_id',
                                                    'courses, customer_courses.course_id = courses.course_id',
                                                    'category, courses.category_id = category.category_id'),
                                    "where" => "customer.customer_id = $customer_id",
                                    "order" => "courses.course_id DESC",
                                ); 
        return $obj_customer_courses = $this->obj_customer_courses->search($params_customer_courses);
    }
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE"){               
                return true;
            }else{
                redirect(site_url().'home');
            }
        }else{
            redirect(site_url().'home');
        }
    }
}


    
