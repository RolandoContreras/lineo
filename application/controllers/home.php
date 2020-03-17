<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this->load->model("category_model","obj_category");
            $this->load->model("courses_model","obj_courses");
            $this->load->model("videos_model","obj_videos");
            $this->load->model("paises_model","obj_paises");
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
            
            
            $params_course_principal = array(
                                    "select" =>"courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.img2,
                                                courses.description,
                                                category.name as category_name,
                                                category.slug as category_slug",
                                    "join" => array( 'category, courses.category_id = category.category_id'),
                                    "where" => "courses.active = 1",
                                    "order" => "courses.course_id ASC",
                                );  
            $data['obj_courses_principal'] = $this->obj_courses->get_search_row($params_course_principal);
            $course_id = $data['obj_courses_principal']->course_id;
            //set para home
            $params_course = array(
                                    "select" =>"courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.img,
                                                courses.price,
                                                courses.price_del,
                                                category.name as category_name,
                                                category.slug as category_slug",
                                    "join" => array( 'category, courses.category_id = category.category_id'),
                                    "where" => "courses.active = 1",
                                    "order" => "courses.course_id ASC",
                                    "limit" => "10",
                                );  
            $data['obj_courses'] = $this->obj_courses->search($params_course); 
            
            //set meta title
            $data['title'] = "Bienvenido";
            $this->load->view('home', $data);
	}
        
        public function term_condition()
	{
            //get category
            $data['obj_category'] = $this->nav_category();
            $data['title'] = "Terminos y Condiciones";
            $this->load->view('terminos', $data);
	}
        
        public function policy()
	{
            //get category
            $data['obj_category'] = $this->nav_category();
            $data['title'] = "Política de privacidad y cookies";
            $this->load->view('policy', $data);
	}
        
        public function pagar()
	{
            //get category
            $data['obj_category'] = $this->nav_category();
            $data['obj_paises'] = $this->list_pais();
            $data['title'] = "Finalizar Compra";
            $this->load->view('pay_home', $data);
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
        
        public function list_pais() {
            //Select params
            $params = array(
                "select" => "id, nombre",
                "where" => "id_idioma = 7");
            $obj_paises = $this->obj_paises->search($params);
            return $obj_paises;
        }
}
