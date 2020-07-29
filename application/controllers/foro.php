<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Foro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("category_model", "obj_category");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("foro_model", "obj_foro");
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        //get category
        $data['obj_category'] = $this->nav_category();
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $where = "courses.name like '%$search%' and courses.active = 1";
        } else {
            $where = "courses.active = 1";
        }
        //get all foro
        $params_foro = array(
            "select" => "foro.foro_id,
                                                foro.customer_id,
                                                foro.course_id,
                                                foro.title,
                                                foro.slug,
                                                foro.description,
                                                foro.img,
                                                foro.date,
                                                courses.slug as course_slug,
                                                customer.name,
                                                customer.last_name",
            "join" => array('customer, foro.customer_id = customer.customer_id',
                'courses, foro.course_id = courses.course_id'),
            "where" => $where,
            "order" => "foro.foro_id DESC",
        );

        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("foro");
        $config["total_rows"] = $this->obj_foro->total_records($params_foro);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 2;

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span aria-current="page" class="page-numbers current">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['obj_pagination'] = $this->pagination->create_links();
        /// DATA
        $data['obj_foro'] = $this->obj_foro->search_data($params_foro, $config["per_page"], $this->uri->segment(2));
        //SEND DATA
        $data['title'] = "U-Linex | Foro";
        //view
        $this->load->view('foro', $data);
    }

    public function category($slug) {

        //get category_id
        $params_categogory_id = array(
            "select" => "category_id,
                                    name",
            "where" => "slug like '%$slug%'");
        $obj_category = $this->obj_category->get_search_row($params_categogory_id);
        $category_id = $obj_category->category_id;

        //get coruse category
        $data['obj_category'] = $this->nav_category();
        //get all courses
        $params_course = array(
            "select" => "courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.time,
                                                courses.description,
                                                courses.img,
                                                courses.price,
                                                courses.price_del,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => "courses.category_id = $category_id and courses.active = 1",
            "order" => "courses.course_id DESC",
        );

        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("cursos/$slug");
        $config["total_rows"] = $this->obj_courses->total_records($params_course);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 2;

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span aria-current="page" class="page-numbers current">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['obj_pagination'] = $this->pagination->create_links();
        /// DATA
        $data['obj_courses'] = $this->obj_courses->search_data($params_course, $config["per_page"], $this->uri->segment(2));
        //GET COURSES TOP
        $params_course_top = array(
            "select" => "courses.course_id,
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
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => "courses.active = 1",
            "order" => "courses.course_id ASC",
            "limit" => "3",
        );
        $data['obj_courses_top'] = $this->obj_courses->search($params_course_top);


        //send total row
        $data['total'] = $config["total_rows"];

        //SEND DATA
        $data['title'] = "U-Linex |  Cursos | $obj_category->name";
        $this->load->view('courses', $data);
    }

    public function detail($course_slug) {
        //get category
        $data['obj_category'] = $this->nav_category();
        //GET COURSE
        $url = explode("/", uri_string());
        $slug = $url[2];

        //get only foro
        $params_foro = array(
            "select" => "foro.foro_id,
                        foro.customer_id,
                        foro.course_id,
                        foro.title,
                        foro.slug,
                        foro.description,
                        foro.img,
                        foro.date,
                        courses.name as course_name,
                        courses.slug as course_slug,
                        customer.name,
                        customer.last_name",
            "join" => array('customer, foro.customer_id = customer.customer_id',
                'courses, foro.course_id = courses.course_id'),
            "where" => "courses.slug = '$course_slug' and foro.slug = '$slug'",
            "order" => "foro.foro_id DESC",
        );
        $data['obj_foro'] = $this->obj_foro->get_search_row($params_foro);
        //send data meta
        $obj_foro_meta = $data['obj_foro'];
        //get data   
        //SEND DATA META OG: FACEBOOK
        $data['title'] = "U-Linex | Foro | $obj_foro_meta->course_name | $obj_foro_meta->title";
        $data['meta_img_og'] = site_url() . "static/backoffice/images/foro/$obj_foro_meta->foro_id/$obj_foro_meta->img";
        //view
        $this->load->view('foro_detail', $data);
    }

    public function resumen() {
        //get category
        $data['obj_category'] = $this->nav_category();
        //GET COURSE
        $url = explode("/", uri_string());
        $slug_2 = $url[2];
        //get course
        $params = array(
            "select" => "courses.course_id,
                                        courses.category_id,
                                        courses.name,
                                        courses.slug,
                                        courses.description,
                                        courses.img,
                                        courses.img2,
                                        category.name as category_name,
                                        category.slug as category_slug",
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => "courses.slug = '$slug_2'");
        $data['obj_courses'] = $this->obj_courses->get_search_row($params);
        $obj_courses_meta = $data['obj_courses'];
        $course_id = $data['obj_courses']->course_id;
        //obtener modulos por cursos
        $params = array(
            "select" => "module_id,
                                        name",
            "where" => "course_id = $course_id");
        $data['obj_modules'] = $this->obj_modules->search($params);
        $data['total_modules'] = count($data['obj_modules']);
        //establecer modulos id para busqqueda
        $array_data = "";
        foreach ($data['obj_modules'] as $value) {
            $array_data .= $value->module_id . ",";
        }
        $array_data = eliminar_ultimo_caracter($array_data);
        //GET videos by course
        $params = array(
            "select" => "videos.video_id,
                                        videos.name,
                                        videos.module_id,
                                        videos.video,
                                        videos.type,
                                        videos.slug,
                                        videos.time",
            "where" => "videos.type = 1 and videos.module_id in ($array_data) and videos.active = 1",
            "order" => "videos.video_id ASC");
        $data['obj_videos'] = $this->obj_videos->get_search_row($params);
        //convertir vídeo
        $video = $data['obj_videos']->video;
        $explo_video = explode("/", $video);
        $data['video_link'] = $explo_video[3];
        //SEND DATA META OG: FACEBOOK
        $data['title'] = "U-Linex | Cursos | $obj_courses_meta->category_name | $obj_courses_meta->name | Resumen";
        $this->load->view('courses_resumen', $data);
    }

    public function nav_category() {
        $params_category = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "active = 1",
        );
        //GET DATA COMMENTS
        return $obj_category = $this->obj_category->search($params_category);
    }

}
