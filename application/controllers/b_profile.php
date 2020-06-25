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
    
    public function upload() {

        //SELECT ID FROM CUSTOMER
        $img = $_FILES['file'];
        $templocation = $img["tmp_name"];
        $name = $img["name"];
        //get customer_id
        $customer_id = $_SESSION['customer']['customer_id'];
        //create file


        if (!is_dir("./static/backoffice/images/profile/$customer_id")) {
            mkdir("./static/backoffice/images/profile/$customer_id", 0777);
        }
        if (!$templocation) {
            die("No se ha seleccionado ningun archivos");
        }

        $files = glob("./static/backoffice/images/profile/$customer_id/*"); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file); //elimino el fichero
        }
        
        if (move_uploaded_file($templocation, "./static/backoffice/images/profile/$customer_id/$name")) {
            echo "archivos guardos";
            //save on table
            $data = array(
                'img' => $name
            );
            //SAVE DATA IN TABLE    
            $result = $this->obj_customer->update($customer_id, $data);
            if (!empty($result)) {
                echo "guardado";
            } else {
                echo "error";
            }
        } else {
            echo "Error";
        }
    }
    
    public function update_session($img){
        $data_customer_session['customer_id'] = $_SESSION['customer']['customer_id'];
        $data_customer_session['name'] = $_SESSION['customer']['name'];
        $data_customer_session['email'] = $_SESSION['customer']['email'];
        $data_customer_session['img'] = $img;
        $data_customer_session['logged_customer'] = "TRUE";
        $data_customer_session['active'] = $_SESSION['customer']['active'];
        $this->session->unset_userdata('customer'); 
        $_SESSION['customer'] = $data_customer_session; 
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


    
