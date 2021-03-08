<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
        //get courses
        $data['obj_courses_nav'] = $this->nav_courses();
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
                        foro.img_tumb,
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

    public function courses($slug) {
        //get coruse category
        $data['obj_category'] = $this->nav_category();
        //get courses
        $data['obj_courses_nav'] = $this->nav_courses();
        //get all courses
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
            "where" => "courses.slug = '$slug'",
            "order" => "foro.foro_id DESC",
        );

        $data["obj_foro"] = $this->obj_foro->search($params_foro);
        $meta_name = ucfirst(convert_query($slug));
        //SEND DATA
        $data['title'] = "U-Linex |  Foro | $meta_name";
        $this->load->view('foro', $data);
    }

    public function detail($course_slug) {
        //get category
        $data['obj_category'] = $this->nav_category();
        //get courses
        $data['obj_courses_nav'] = $this->nav_courses();
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
                        foro.document,
                        foro.img,
                        foro.date,
                        courses.name as course_name,
                        courses.slug as course_slug,
                        customer.customer_id,
                        customer.facebook,
                        customer.instagram,
                        customer.twitter,
                        customer.google,
                        customer.bio,
                        customer.customer_id,
                        customer.name,
                        customer.last_name,
                        customer.img as customer_img",
            "join" => array('customer, foro.customer_id = customer.customer_id',
                'courses, foro.course_id = courses.course_id'),
            "where" => "courses.slug = '$course_slug' and foro.slug = '$slug'",
            "order" => "foro.foro_id DESC",
        );
        $data['obj_foro'] = $this->obj_foro->get_search_row($params_foro);
        //send data meta
        $obj_foro_meta = $data['obj_foro'];
        $obj_foro_id = $data['obj_foro']->foro_id;
        //send data course_slug
        $data['obj_foro_related'] = $this->get_foro_related($course_slug, $obj_foro_id);
        //get data   
        //SEND DATA META OG: FACEBOOK
        $data['title'] = "U-Linex | Foro | $obj_foro_meta->course_name | $obj_foro_meta->title";
        $data['meta_img_og'] = site_url() . "static/backoffice/images/foro/$obj_foro_meta->foro_id/$obj_foro_meta->img";
        //view
        $this->load->view('foro_detail', $data);
    }

    public function get_foro_related($course_slug, $obj_foro_id) {
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
                        courses.slug as course_slug",
            "join" => array('courses, foro.course_id = courses.course_id'),
            "where" => "courses.slug = '$course_slug' and foro.foro_id <> '$obj_foro_id'",
            "order" => "foro.foro_id DESC",
            "limit" => "10",
        );
        return $obj_foro_related = $this->obj_foro->search($params_foro);
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
    
    public function nav_courses() {
        $params_courses = array(
            "select" => "course_id,
                        slug,
                        name",
            "where" => "active = 1",
        );
        //GET DATA COMMENTS
        return $obj_courses = $this->obj_courses->search($params_courses);
    }

}