<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("category_model","obj_category");
        $this->load->model("courses_model","obj_courses");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET NAV CURSOS
        $obj_category_videos = $this->nav_category();
        
        if(isset($_GET['search'])){
                $search = $_GET['search'];
                    $where = "courses.name like '%$search%' and courses.active = 1";
        }else{
                $where = "courses.active = 1";
        }
        $category_name = "Todos los videos";
        
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
            $config["base_url"] = site_url("backoffice"); 
            $config["total_rows"] = $this->obj_courses->total_records($params_course);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 2;   
            
            $config['first_tag_open'] = '<li class="paginate_button page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="paginate_button page-item">';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li class="paginate_button page-item">';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class=" paginate_button page-item active"><a class="page-link">';
            $config['cur_tag_close']= '</a></li>';            
            $config['next_tag_open'] = '<li class="paginate_button page-item">';
            $config['next_tag_close'] = '</a></li>';            
            $config['last_tag_open'] = '<li class="paginate_button page-item">';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $obj_pagination = $this->pagination->create_links();
            /// DATA
            $obj_courses = $this->obj_courses->search_data($params_course, $config["per_page"],$this->uri->segment(2));
        //GET DATA FROM CUSTOMER
            
        $url = 'backoffice';
        $this->tmp_backoffice->set("url",$url);    
        $this->tmp_backoffice->set("category_name",$category_name);
        $this->tmp_backoffice->set("obj_pagination",$obj_pagination);
        $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
        $this->tmp_backoffice->set("obj_courses",$obj_courses);
        $this->tmp_backoffice->render("backoffice/b_home");
    }
    
    public function category($slug)
	{
            
            //GET NAV CURSOS
            $obj_category_videos = $this->nav_category();
            //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id,
                                    name",   
                "where" => "slug like '%$slug%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            
            //get courses by category
            $params = array(
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
            $config["base_url"] = site_url("backoffice/$slug"); 
            $config["total_rows"] = $this->obj_courses->total_records($params);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 3;   
            
            $config['first_tag_open'] = '<li class="paginate_button page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="paginate_button page-item">';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li class="paginate_button page-item">';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class=" paginate_button page-item active"><a class="page-link">';
            $config['cur_tag_close']= '</a></li>';            
            $config['next_tag_open'] = '<li class="paginate_button page-item">';
            $config['next_tag_close'] = '</a></li>';            
            $config['last_tag_open'] = '<li class="paginate_button page-item">';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $obj_pagination = $this->pagination->create_links();
            /// DATA
            $obj_courses = $this->obj_courses->search_data($params, $config["per_page"],$this->uri->segment(3));
            //SEND DATA
            $category_name = "Cursos de $obj_category->name";
            $url = 'backoffice';
            $this->tmp_backoffice->set("url",$url);    
            $this->tmp_backoffice->set("category_name",$category_name);
            $this->tmp_backoffice->set("obj_pagination",$obj_pagination);
            $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
            $this->tmp_backoffice->set("obj_courses",$obj_courses);
            $this->tmp_backoffice->render("backoffice/b_home");
	}
    
    public function detail($slug)
	{
            //get nav cursos
            $obj_category_videos = $this->nav_category();
             //get data catalog
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
            $obj_courses = $this->obj_courses->get_search_row($params);
            $course_id = $obj_courses->course_id;
            
             //GET videos by course
            $params = array(
                            "select" =>"videos.video",
                            "where" => "videos.course_id = $course_id and type = 1");
            $obj_courses_overview = $this->obj_videos->get_search_row($params);
            //GET videos by course
            $params = array(
                            "select" =>"videos.video_id,
                                        videos.name,
                                        videos.slug,
                                        videos.date,
                                        videos.time",
                            "where" => "videos.course_id = $course_id and videos.active = 1");
            $obj_videos = $this->obj_videos->search($params);
            //SEND DATA
            
            $this->tmp_backoffice->set("obj_videos",$obj_videos);
            $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
            $this->tmp_backoffice->set("obj_courses_overview",$obj_courses_overview);
            $this->tmp_backoffice->set("obj_courses",$obj_courses);
            $this->tmp_backoffice->render("backoffice/b_detail");
	}
    
    public function document()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $this->tmp_course->render("course/c_document");
    }
    
    public function profile()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
                        "select" =>"customer.username,
                                    customer.email,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.btc_address,
                                    customer.created_at,
                                    customer.date_start,
                                    customer.address,
                                    customer.phone,
                                    customer.dni,
                                    customer.active,
                                    paises.nombre,
                                    kit.kit_id,
                                    kit.name as kit",
                        "where" => "customer.customer_id = $customer_id and customer.status_value = 1 and paises.id_idioma = 7",
                        "join" => array('kit, customer.kit_id = kit.kit_id',
                                        'paises, customer.country = paises.id'),
                        );

        $obj_customer = $this->obj_customer->get_search_row($params);
        
        $kit = $obj_customer->kit_id;
        if($kit == 1){
            $text_course = "Prueba";
        }elseif($kit == 2){
            $text_course = "Inversiones y Marketing - Módulo Basico";
        }elseif($kit == 3){
            $text_course = "Inversiones y Marketing - Módulo Intermedio";
        }else{
            $text_course = "Inversiones y Marketing - Módulo Avanzando";
        }
        
        $this->tmp_course->set("text_course",$text_course);
        $this->tmp_course->set("obj_customer",$obj_customer);
        $this->tmp_course->render("course/c_profile");
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
