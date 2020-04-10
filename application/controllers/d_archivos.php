<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_archivos extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("archives_model","obj_archives");
    }   
                
    public function index(){  
        
           $this->get_session();
           $url = explode("/",uri_string());
           $course_id = $url[2];
           $video_id = $url[4];
           $params = array(
                        "select" =>"archives.archive_id,
                                    archives.name,
                                    archives.video_id,
                                    archives.link,
                                    videos.name  as video_name,
                                    ",
               "join" => array( 'videos, archives.video_id = videos.video_id'),
               "where" => "archives.video_id = $video_id",
                "order" => "archives.archive_id DESC");
            //GET DATA FROM CUSTOMER
            $obj_archives = $this->obj_archives->search($params);
            //send
            $this->tmp_mastercms->set("obj_archives",$obj_archives);
            $this->tmp_mastercms->set("course_id",$course_id);
            $this->tmp_mastercms->set("video_id",$video_id);
            $this->tmp_mastercms->render("dashboard/archivos/archivos_list");
    }
    
    public function load($course_id=NULL){
        
        //obtener id de curso
        $this->get_session();
        $url = explode("/",uri_string());
        $course_id = $url[2];
        $video_id = $url[4];
        $archive_id = isset($url[6])?$url[6]:"";
        
        if ($archive_id != ""){
            //obtener datos del registro archivo
            $params = array(
                        "select" =>"archive_id,
                                    link,
                                    name",
                         "where" => "archive_id = $archive_id",
            ); 
            $obj_archives  = $this->obj_archives->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_archives",$obj_archives);
          }
            //send data
            $this->tmp_mastercms->set("course_id",$course_id);
            $this->tmp_mastercms->set("video_id",$video_id);
            $this->tmp_mastercms->render("dashboard/archivos/archivos_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $archive_id = $this->input->post("archive_id");
        //get course_id by url
        $url = explode("/",uri_string());
        $course_id = $url[2];
        $video_id = $url[4];
        if($archive_id != ""){
             $data = array(
                'name' => trim($this->input->post('name')),
                'link' => trim($this->input->post('link')),
                'video_id' => $video_id,
                );          
             $this->obj_archives->update($archive_id, $data);
        }else{
            //SAVE DATA IN TABLE    
            $data = array(
                'name' => trim($this->input->post('name')),
                'link' => trim($this->input->post('link')),
                'video_id' => $video_id,
                );          
             $archive_id = $this->obj_archives->insert($data);        
        }    
        redirect(site_url()."dashboard/videos/$course_id/archivos/$video_id");
    }
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             $this->get_session();
             //OBETENER MARCA_ID
             $archive_id = $this->input->post("archive_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($archive_id != null){
                $this->obj_archives->delete($archive_id);
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