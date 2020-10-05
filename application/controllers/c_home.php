<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("category_model","obj_category");
        $this->load->model("modules_model","obj_modules");
        $this->load->model("courses_model","obj_courses");
        $this->load->model("video_message_model","obj_video_message");
        $this->load->model("customer_courses_model","obj_customer_courses");
        $this->load->model("archives_model","obj_archives");
        }
    
    public function detail($slug)
	{
        
            //GET SESION ACTUALY
            $this->get_session();
            //get slug
            $url = explode("/",uri_string());
            $slug_category = $url[1];
            $slug_2 = $url[2];
            $slug_3 = isset($url[3])?$url[3]:"";
           
            //obtener curso
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
                            "where" => "courses.slug = '$slug_2' and category.slug = '$slug_category'");
            $obj_courses = $this->obj_courses->get_search_row($params);
            $course_id = $obj_courses->course_id;
            $course_img = $obj_courses->img;
            //obtener modulos por cursos
            $params = array(
                            "select" =>"module_id,
                                        name",
                            "where" => "course_id = $course_id",
                            "order" => "order, module_id ASC");
            $obj_modules = $this->obj_modules->search($params);
            //establecer modulos id para busqqueda
            $array_data = "";
            foreach ($obj_modules as $value) {
                $array_data .= $value->module_id.",";
            }
            $array_data = eliminar_ultimo_caracter($array_data);
            //GET videos by course
            $params = array(
                            "select" =>"videos.video_id,
                                        videos.name,
                                        videos.module_id,
                                        videos.video,
                                        videos.date,
                                        videos.type,
                                        videos.order,
                                        videos.slug,
                                        videos.time",
                            "where" => "videos.module_id in ($array_data) and videos.active = 1",
                            "order" => "videos.order, videos.video_id ASC");
            $obj_videos = $this->obj_videos->search($params);
            $total_videos = count($obj_videos);
            //obtener video actual
            if($slug_3 != ""){
                $where = "slug = '$slug_3' and videos.type = 2"; 
            }else{
                    $where = "videos.type = 2";
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
                            "where" => "videos.module_id in ($array_data) and $where");
                $obj_courses_overview = $this->obj_videos->get_search_row($params);
            //obtener video actual en reproduccion
            $video_actual = $this->select_video_actual($course_id, $obj_courses_overview->video_id, $total_videos); 
            //obtener porcentaje avanzado
            $total_visto = $video_actual->total_video;
            $percent = ($total_visto / $total_videos) * 100;
            //redondear arriba
            $percent =  ceil ($percent);
            //update complete
            $complete = 0;
            if($percent == 100){
               $complete = $this->update_video_100($video_actual->customer_course_id); 
            }
            //VIDEO LINK
            $video = $obj_courses_overview->video;
            $explo_video = explode("/", $video);
            $video_link = $explo_video[3];
            //get all message
//            $params = array(
//                        "select" =>"video_message.video_message_id,
//                                    video_message.date,
//                                    video_message.message,
//                                    video_message.respose,
//                                    customer.name",
//                "join" => array('customer, video_message.customer_id = customer.customer_id'),
//                "where" => "video_message.video_id = $obj_courses_overview->video_id",
//                "order" => "video_message.video_message_id ASC",
//                );
//            $obj_video_message = $this->obj_video_message->search($params);
            //obtener material del video actual
            $params_archive = array(
                        "select" =>"name,
                                    link",
                "where" => "video_id = $obj_courses_overview->video_id"
                );
            $obj_archive = $this->obj_archives->search($params_archive);
            //SEND DATA
            $this->tmp_course->set("slug",$slug);
            $this->tmp_course->set("course_img",$course_img);
            $this->tmp_course->set("obj_courses_overview",$obj_courses_overview);
//            $this->tmp_course->set("obj_video_message",$obj_video_message);
            $this->tmp_course->set("obj_videos",$obj_videos);
            $this->tmp_course->set("percent",$percent);
            $this->tmp_course->set("obj_modules",$obj_modules);
            $this->tmp_course->set("obj_courses",$obj_courses);
            $this->tmp_course->set("video_link",$video_link);
            $this->tmp_course->set("video_actual",$video_actual);
            $this->tmp_course->set("complete",$complete);
            $this->tmp_course->set("obj_archive",$obj_archive);
            $this->tmp_course->render("course/c_home");
	}
    
    public function update_video_100($customer_course_id) {
                //actualizar a completo el curso by customer
                $data = array(
                    'complete' => 1,
                    'date_end' => date("Y-m-d H:i:s"),
                );
               $this->obj_customer_courses->update_total_video($customer_course_id,  $data); 
               return 1;
    }   
    
    public function select_video_actual($course_id,$video_id,$total_videos) {
                //GET CUSTOMER_ID por session
                $customer_id = $_SESSION['customer']['customer_id'];
                //GET VIDEO ACTUAL
                $params = array(
                            "select" =>"customer_course_id,
                                        video_actual,
                                        total_video,
                                        total,
                                        complete",
                    "where" => "customer_id = $customer_id and course_id = $course_id",
                    );
                $video_actual = $this->obj_customer_courses->get_search_row($params);
                
                    if($video_actual->total_video == 0){
                            //ADD VIDEO_MESSAGE
                            $data = array(
                                'video_actual' => $video_id,
                                'total_video' => 1,
                                'total' => $total_videos,
                            );
                           $video_actual = $this->obj_customer_courses->update_total_video($video_actual->customer_course_id,  $data); 
                    }else{
                       if($video_actual->video_actual < $video_id){
                            $total_video = $video_actual->total_video + 1;
                            //ADD VIDEO_MESSAGE
                            $data = array(
                                'video_actual' => $video_id,
                                'total_video' => $total_video,
                                'total' => $total_videos,
                            );
                           $video_actual = $this->obj_customer_courses->update_total_video($video_actual->customer_course_id,  $data);
                        } 
                    }
                //ACTUALIZAR VIDEO
                return $video_actual;
    } 
        
    public function send_message() {
        if($this->input->is_ajax_request()){   
                //GET CUSTOMER_ID
                $customer_id = $_SESSION['customer']['customer_id'];
                $message = $this->input->post('comment');
                $video_id = $this->input->post('video_id');
                //ADD VIDEO_MESSAGE
                    $data = array(
                        'customer_id'      => $customer_id,
                        'video_id'     => $video_id,
                        'message'   => $message,
                        'date'   => date("Y-m-d H:i:s"),
                        'active'    => 1,
                    );
                    $video_message_id = $this->obj_video_message->insert($data);
                    if($video_message_id != ""){
                        $data['status'] = "true";
                    }else{
                        $data['status'] = "false";
                    }
               echo json_encode($data); 
        }
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
