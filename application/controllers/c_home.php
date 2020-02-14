<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("category_model","obj_category");
    }

    public function index()
    {
            //GET SESION ACTUALY
            $this->get_session();
            //get nav cursos
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.video,
                                    videos.description,
                                    videos.date,
                                    videos.active,
                                    courses.slug as courses_slug,
                                    courses.name as courses_name,
                                    videos.date",
                "join" => array( 'courses, courses.course_id = videos.course_id'),
                "where" => "videos.active = 1",
                "order" => "videos.video_id DESC",
                );
            $obj_video = $this->obj_videos->get_search_row($params);
            $video = $obj_video->video;
            
            $explo_video = explode("=", $video);
            $video_link = $explo_video[1];
            //get all videso
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.description,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.date,
                                    videos.active,
                                    courses.slug as courses_slug,
                                    courses.name as courses_name,
                                    videos.date",
                "join" => array( 'courses, courses.course_id = videos.course_id'),
                "where" => "videos.active = 1",
                "order" => "videos.video_id ASC");
            $obj_videos_all = $this->obj_videos->search($params);
            
            //SEND DATA
            $this->tmp_course->set("obj_category_videos",$obj_videos_all);
            $this->tmp_course->set("obj_videos_all",$obj_videos_all);
            $this->tmp_course->set("obj_video",$obj_video);
            $this->tmp_course->set("video_link",$video_link);
            $this->tmp_course->render("course/c_home");
    }
    
    public function detail($slug)
	{
            //GET SESION ACTUALY
            $this->get_session();
            //get nav cursos
            $obj_category_videos = $this->nav_videos();
             //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id",
                "where" => "slug like '%$slug%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
             
            $url = explode("/",uri_string());
            $slug_2 = $url[2];
            
            
             //get catalog
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.video,
                                    videos.description,
                                    videos.img2,
                                    videos.date,
                                    videos.active,
                                    category.slug as category_slug,
                                    category.name as category_name,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.slug = '$slug_2' and videos.category_id = $category_id and videos.active = 1");
            $obj_video = $this->obj_videos->get_search_row($params);
            $video = $obj_video->video;
            
            $explo_video = explode("=", $video);
            $video_link = $explo_video[1];
            //get all videso
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.date,
                                    videos.active,
                                    category.category_id,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.active = 1",
                "order" => "videos.category_id ASC");
            $obj_videos_all = $this->obj_videos->search($params);
            //SEND DATA
            
            $this->tmp_course->set("obj_category_videos",$obj_category_videos);
            $this->tmp_course->set("obj_videos_all",$obj_videos_all);
            $this->tmp_course->set("obj_video",$obj_video);
            $this->tmp_course->set("video_link",$video_link);
            
            $this->tmp_course->render("course/c_home");
	}
    
    public function nav_videos(){
            $params_category_videos = array(
                        "select" =>"category_id,
                                    slug,
                                    name",
                "where" => "type = 1 and active = 1",
            );
            //GET DATA COMMENTS
            return $obj_category_videos = $this->obj_category->search($params_category_videos);
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
