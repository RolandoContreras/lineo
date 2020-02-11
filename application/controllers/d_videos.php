<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_videos extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("courses_model","obj_courses");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"videos.video_id,
                                    videos.course_id,
                                    videos.name,
                                    videos.description,
                                    videos.img,
                                    videos.video,
                                    videos.type,
                                    videos.date,
                                    videos.active,
                                    courses.name as course_name",
                "join" => array( 'courses, videos.course_id = courses.course_id'),
                "order" => "videos.video_id DESC");
            //GET DATA FROM CUSTOMER
            $obj_videos = $this->obj_videos->search($params);
            //send
            $this->tmp_mastercms->set("obj_videos",$obj_videos);
            $this->tmp_mastercms->render("dashboard/videos/videos_list");
    }
    
    public function load($video_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($video_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"*",
                         "where" => "video_id = $video_id",
            ); 
            $obj_videos  = $this->obj_videos->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_videos",$obj_videos);
          }
      
          $params = array(
                        "select" =>"*",
                         "where" => "active = 1",
            ); 
            $obj_courses = $this->obj_courses->search($params); 
            //send data
            $this->tmp_mastercms->set("obj_courses",$obj_courses);
            $this->tmp_mastercms->render("dashboard/videos/videos_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $video_id = $this->input->post("video_id");
        $course_id = $this->input->post("course_id");
//        if(isset($_FILES["image_file"]["name"])){
//                $config['upload_path']          = './static/cms/img/videos';
//                $config['allowed_types']        = 'gif|jpg|png';
//                $config['max_size']             = 2000;
//                $this->load->library('upload', $config);
//                    if ( ! $this->upload->do_upload('image_file')){
//                         $error = array('error' => $this->upload->display_errors());
//                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
//                    }else{
//                        $data = array('upload_data' => $this->upload->data());
//                    }
//                $img = $_FILES["image_file"]["name"];        
//                 if($img == ""){
//                     $img = $this->input->post("img2");
//                 }   
//            }
        
        if($video_id != ""){
             $data = array(
                'name' => $this->input->post('name'),
                'slug' => convert_slug($this->input->post('name')),
                'type' => $this->input->post('type'),
                'time' => $this->input->post('time'),
                'video' => $this->input->post('video'),
                'description' => $this->input->post('description'),
                'course_id' => $this->input->post('course_id'),
                'date' => date("Y-m-d H:i:s"),  
                'active' => $this->input->post('active'),  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
             $this->obj_videos->update($video_id, $data);
        }else{
            $data = array(
                'name' => $this->input->post('name'),
                'slug' => convert_slug($this->input->post('name')),
                'time' => $this->input->post('time'),
                'type' => $this->input->post('type'),
                'video' => $this->input->post('video'),
                'description' => $this->input->post('description'),
                'course_id' => $course_id,
                'date' => date("Y-m-d H:i:s"),  
                'active' => $this->input->post('active'),  
                );          
             $this->obj_videos->insert($data);        
            //SAVE DATA IN TABLE    
        }    
        redirect(site_url()."dashboard/videos");
    }
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             //OBETENER MARCA_ID
             $video_id = $this->input->post("video_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($video_id != ""){
                $this->obj_videos->delete($video_id);
            }
            $data['status'] = true;
            echo json_encode($data);
        }       
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