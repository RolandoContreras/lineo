<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("category_model","obj_category");
        $this->load->model("courses_model","obj_courses");
        $this->load->model("video_message_model","obj_video_message");
    }
    
    public function detail($slug)
	{
        
            //GET SESION ACTUALY
            $this->get_session();
            //get slug
            $url = explode("/",uri_string());
            $slug_2 = $url[2];
            $slug_3 = $url[3];
            //get category_id
            $params_categogory_id = array(
                        "select" =>"category_id,
                                    name",   
                "where" => "slug like '%$slug%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            
            //get course
            $params = array(
                            "select" =>"courses.course_id,
                                        courses.category_id,
                                        courses.name,
                                        courses.slug,
                                        courses.img,
                                        courses.description,
                                        courses.price,
                                        courses.price_del,
                                        courses.date,
                                        category.name as category_name,
                                        category.slug as category_slug",
                            "join" => array('category, courses.category_id = category.category_id'),
                            "where" => "courses.slug = '$slug_2' and courses.category_id = $category_id");
            $obj_courses = $this->obj_courses->get_search_row($params);
            $course_id = $obj_courses->course_id;
            $course_img = $obj_courses->img;
            
            if(isset($slug_3)){
                $where = "slug = '$slug_3'"; 
            }else{
               $where = "videos.type = 1";
            }
             //GET videos by course
            $params = array(
                            "select" =>"video_id,
                                        slug,
                                        name,
                                        video,
                                        description,
                                        time,
                                        date",
                            "where" => "course_id = $course_id and $where ");
                $obj_courses_overview = $this->obj_videos->get_search_row($params);
            //VIDEO LINK
            $video = $obj_courses_overview->video;
            $explo_video = explode("=", $video);
            $video_link = $explo_video[1];
            //get videos
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.time,
                                    videos.video,
                                    videos.description,
                                    videos.date,
                                    videos.active,
                                    courses.slug as courses_slug,
                                    courses.name as courses_name,
                                    videos.date",
                "join" => array( 'courses, courses.course_id = videos.course_id'),
                "where" => "courses.course_id = $course_id and videos.active = 1",
                "order" => "videos.video_id ASC",
                );
            $obj_videos = $this->obj_videos->search($params);
            //get all message
            
            
            $params = array(
                        "select" =>"video_message.video_message_id,
                                    video_message.date,
                                    video_message.message,
                                    video_message.respose,
                                    customer.name",
                "join" => array('customer, video_message.customer_id = customer.customer_id'),
                "order" => "video_message.video_id = $obj_courses_overview->video_id",
                "order" => "video_message.video_message_id ASC",
                );
            $obj_video_message = $this->obj_video_message->search($params);
            //SEND DATA
            $this->tmp_course->set("slug",$slug);
            $this->tmp_course->set("course_img",$course_img);
            $this->tmp_course->set("obj_courses_overview",$obj_courses_overview);
            $this->tmp_course->set("obj_video_message",$obj_video_message);
            $this->tmp_course->set("obj_videos",$obj_videos);
            $this->tmp_course->set("obj_courses",$obj_courses);
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
