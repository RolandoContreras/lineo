<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
     parent::__construct();
     $this->load->model('customer_model','obj_customer');
     $this->load->model("category_model","obj_category");
     $this->load->model("courses_model","obj_courses");
     $this->load->library('facebook'); 
    } 

    public function index(){
        //get category
        $data['obj_category'] = $this->nav_category();
        //get courses
        $data['obj_courses_nav'] = $this->nav_courses();
        //send meta title
        $data['title'] = "U-Linex | Inicio de Sesión";
        
        //sesion facebook
        $userData = array(); 
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email'); 
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $first_name = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $last_name = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $userData['name'] = $first_name." ".$last_name;
            $userData['email'] = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['active'] = 1; 
            $userData['country'] = 89; 
            // Insert or update user data to the database 
            $user_id = $this->obj_customer->checkUser($userData); 
            // Check user data insert or update status 
            if(!empty($user_id)){ 
                $data_customer_session['customer_id'] = $user_id;
                $data_customer_session['name'] = $userData['name'];
                $data_customer_session['email'] = $userData['email'];
                $data_customer_session['img'] = $userData['img'];
                $data_customer_session['active'] = 1;
                $data_customer_session['country'] = 89;
                $data_customer_session['logged_customer'] = "TRUE";
                $_SESSION['customer'] = $data_customer_session; 
                redirect("backoffice");
            }else{ 
               $data['userData'] = array(); 
               $data['authURL'] =  $this->facebook->login_url(); 
               $this->load->view('login',$data);
            } 
            // Facebook logout URL 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
        } 
        // Load login/profile view 
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
                                        customer.img,
                                        customer.active",
                             "where" => "customer.email = '$email' and customer.password = '$pass' and customer.active = 1");
            $obj_customer = $this->obj_customer->get_search_row($params);
            if (isset($obj_customer->customer_id) != ""){
                    $data_customer_session['customer_id'] = $obj_customer->customer_id;
                    $data_customer_session['name'] = $obj_customer->name;
                    $data_customer_session['email'] = $obj_customer->email;
                    $data_customer_session['img'] = $obj_customer->img;
                    $data_customer_session['logged_customer'] = "TRUE";
                    $data_customer_session['active'] = $obj_customer->active;
                    $_SESSION['customer'] = $data_customer_session; 
                    //verify cart shop
                    $cart = count($this->cart->contents());
                    if($cart > 0){
                        $data['status'] = "true2";
                    }else{
                        $data['status'] = "true";
                    }
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
    
    public function nav_courses() {
        $params_courses = array(
            "select" => "course_id,
                        slug,
                        name",
            "where" => "active = 1",
        );
        //GET DATA COMMENTS
        return $obj_courses = $this->obj_courses->search($params_courses);
    }
    
    public function logout(){      
        
            // Remove local Facebook session 
            $this->facebook->destroy_session(); 
            // Remove user data from session 
            $this->session->unset_userdata('customer'); 
                        $this->session->destroy();
            // Redirect to login page 
            redirect('home'); 
//        
//            $this->facebook->destroy_session(); 
//            $this->session->unset_userdata('customer');

//            redirect('home'); 
    }
}
