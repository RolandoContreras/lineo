<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this->load->model("category_model","obj_category");
            $this->load->model("courses_model","obj_courses");
            $this->load->model("videos_model","obj_videos");
    }   

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            //get category
            $data['obj_category'] = $this->nav_category();
            
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $where = "courses.name like '%$search%' and courses.active = 1";
            }else{
                $where = "courses.active = 1";
            }
            
            //get all courses
            $params_course = array(
                                    "select" =>"courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.description,
                                                courses.img,
                                                courses.price,
                                                courses.price_del,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
                                    "join" => array( 'category, courses.category_id = category.category_id'),
                                    "where" => $where,
                                    "order" => "courses.course_id DESC",
                                );  
            
              /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("cursos"); 
            $config["total_rows"] = $this->obj_courses->total_records($params_course);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 2;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="active"><span aria-current="page" class="page-numbers current">';
            $config['cur_tag_close']= '</span></li>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $data['obj_pagination'] = $this->pagination->create_links();
            /// DATA
            $data['obj_courses'] = $this->obj_courses->search_data($params_course, $config["per_page"],$this->uri->segment(2));
            
            $params_course_top = array(
                                    "select" =>"courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.description,
                                                courses.img,
                                                courses.price,
                                                courses.price_del,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
                                    "join" => array( 'category, courses.category_id = category.category_id'),
                                    "where" => "courses.active = 1",
                                    "order" => "courses.course_id ASC",
                                    "limit" => "3",
                                );  
            $data['obj_courses_top'] = $this->obj_courses->search($params_course_top);
            
            //send total row
            $data['total'] = $config["total_rows"];
            
            //SEND DATA
            $data['title'] = "Cursos";
            //view
            $this->load->view('courses',$data);
	}
        public function category($slug)
	{
            
            //get category_id
            $params_categogory_id = array(
                        "select" =>"category_id,
                                    name",   
                "where" => "slug like '%$slug%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            
            //get coruse category
            $data['obj_category'] = $this->nav_category();
            //get all courses
            $params_course = array(
                                    "select" =>"courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.description,
                                                courses.img,
                                                courses.price,
                                                courses.price_del,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
                                    "join" => array( 'category, courses.category_id = category.category_id'),
                                    "where" => "courses.category_id = $category_id and courses.active = 1",
                                    "order" => "courses.course_id DESC",
                                );  
            
              /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("cursos/$slug"); 
            $config["total_rows"] = $this->obj_courses->total_records($params_course);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 2;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="active"><span aria-current="page" class="page-numbers current">';
            $config['cur_tag_close']= '</span></li>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $data['obj_pagination'] = $this->pagination->create_links();
            /// DATA
            $data['obj_courses'] = $this->obj_courses->search_data($params_course, $config["per_page"],$this->uri->segment(2));
            //GET COURSES TOP
            $params_course_top = array(
                                    "select" =>"courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.description,
                                                courses.img,
                                                courses.price,
                                                courses.price_del,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
                                    "join" => array( 'category, courses.category_id = category.category_id'),
                                    "where" => "courses.active = 1",
                                    "order" => "courses.course_id ASC",
                                    "limit" => "3",
                                );  
            $data['obj_courses_top'] = $this->obj_courses->search($params_course_top);
            
            
            //send total row
            $data['total'] = $config["total_rows"];
            
            //SEND DATA
            $data['title'] = "Cursos | $obj_category->name";
            $this->load->view('courses',$data);
	}
        public function detail($slug)
	{
            //get category
            $data['obj_category'] = $this->nav_category();
            //GET COURSE
            $url = explode("/",uri_string());
            $slug_2 = $url[2];
            //get course
            $params = array(
                            "select" =>"courses.course_id,
                                        courses.category_id,
                                        courses.name,
                                        courses.slug,
                                        courses.description,
                                        courses.img2,
                                        courses.price,
                                        courses.price_del,
                                        courses.date,
                                        category.name as category_name,
                                        category.slug as category_slug",
                            "join" => array( 'category, courses.category_id = category.category_id'),
                            "where" => "courses.slug = '$slug_2'");
            $data['obj_courses'] = $this->obj_courses->get_search_row($params);
            $obj_courses_meta = $data['obj_courses'];
            $course_id = $data['obj_courses']->course_id;
            
             //GET videos by course
            $params = array(
                            "select" =>"videos.video",
                            "where" => "videos.course_id = $course_id and type = 1");
            $data['obj_courses_overview'] = $this->obj_videos->get_search_row($params);
            
            //GET videos by course
            $params = array(
                            "select" =>"videos.video_id,
                                        videos.name,
                                        videos.slug,
                                        videos.time,
                                        (SELECT video FROM (videos) WHERE course_id = $course_id and type = 1) as link_video",
                            "where" => "videos.course_id = $course_id and videos.active = 1");
            $data['obj_videos'] = $this->obj_videos->search($params);
            $data['total_videos'] = count($data['obj_videos']);
            
             //get category_id
            $params_categogory_id = array(
                        "select" =>"category_id",
                "where" => "slug like '%$slug%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            
            $params = array(
                            "select" =>"courses.course_id,
                                        courses.category_id,
                                        courses.name,
                                        courses.slug,
                                        courses.img,
                                        courses.price,
                                        courses.price_del,
                                        courses.date,
                                        category.name as category_name,
                                        category.slug as category_slug",
                            "join" => array( 'category, courses.category_id = category.category_id'),
                            "where" => "courses.category_id = $category_id and courses.course_id <> $course_id",
                            "order" => "RAND()"
                );
            $data['obj_courses_related'] = $this->obj_courses->search($params);
//            var_dump($data['obj_courses_related']);
//            die();
            
            $obj_courses_meta = $data['obj_courses'];
            $course_id = $data['obj_courses']->course_id;
            
            //view
            $data['title'] = "Cursos | $obj_courses_meta->category_name | $obj_courses_meta->name";      
            $this->load->view('courses_detail',$data);
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
}
