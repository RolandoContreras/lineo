<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_courses extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("category_model","obj_category");
        $this->load->model("courses_model","obj_courses");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            //SET PARAM
            $params = array(
                        "select" =>"courses.course_id,
                                    courses.name,
                                    courses.category_id,
                                    courses.img,
                                    courses.price,
                                    courses.date,
                                    courses.active,
                                    category.name as category_name",
                        "join" => array( 'category, courses.category_id = category.category_id'),            
            );
            //GET DATA COMMENTS
            $obj_courses = $this->obj_courses->search($params);
            
            /// VISTA
            $this->tmp_mastercms->set("obj_courses",$obj_courses);
            $this->tmp_mastercms->render("dashboard/cursos/course_list");
    }
    
    public function load($course_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        if ($course_id != ""){
            /// PARAM FOR SELECT 
            $where = "course_id = $course_id";
            $params = array(
                        "select" =>"courses.course_id,
                                    courses.category_id,
                                    courses.name,
                                    courses.slug,
                                    courses.description,
                                    courses.img,
                                    courses.img2,
                                    courses.price,
                                    courses.price_del,
                                    courses.active,
                                    category.name as category_name,
                                    ",
                        "join" => array('category, courses.category_id = category.category_id'),    
                        "where" => $where,
            ); 
            $obj_courses  = $this->obj_courses->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_courses",$obj_courses);
          }
          //GET CATEGORIES
            $params = array(
                        "select" =>"*",
                         "where" => "active = 1",
            ); 
            $obj_category = $this->obj_category->search($params); 
            
         $this->tmp_mastercms->set("obj_category",$obj_category); 
         $this->tmp_mastercms->render("dashboard/cursos/course_form");    
    }
    
    public function validate(){
        
        //GET COURSE_ID
        $course_id = $this->input->post("course_id");
        $img2 = $this->input->post("img2");
        $img3 = $this->input->post("img3");
        
        if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/cms/img/cursos/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
                $img = $_FILES["image_file"]["name"];        
                 if($img == ""){
                     $img = $img2;
                 }   
            }
            
          if(isset($_FILES["image_file2"]["name"])){
                $config['upload_path']          = './static/cms/img/cursos/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file2')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
                $img2 = $_FILES["image_file2"]["name"];        
                 if($img2 == ""){
                     $img2 = $img3;
                 }   
            }
            
        if($course_id != ""){
             $data = array(
                'name' => $this->input->post("name"),
                'slug' => convert_slug($this->input->post("name")), 
                'price' => $this->input->post('price'),
                'price_del' => $this->input->post('price_del'),
                'category_id' => $this->input->post('category_id'),
                'description' => $this->input->post('description'),
                'img' => $img,
                'img2' => $img2,
                'date' => date("Y-m-d H:i:s"),  
                'active' => $this->input->post('active'),  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
             $this->obj_courses->update($course_id, $data);
        }else{
            $data = array(
                'name' => $this->input->post("name"),
                'slug' => convert_slug($this->input->post("name")), 
                'price' => $this->input->post('price'),
                'price_del' => $this->input->post('price_del'),
                'category_id' => $this->input->post('category_id'),
                'description' => $this->input->post('description'),
                'img' => $img,
                'img2' => $img2,
                'date' => date("Y-m-d H:i:s"),  
                'active' => $this->input->post('active'),  
                );          
             $this->obj_courses->insert($data);        
            //SAVE DATA IN TABLE    
        }    
        redirect(site_url()."dashboard/cursos");
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
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