<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("category_model", "obj_category");
        $this->load->model("customer_courses_model", "obj_customer_courses");
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
        //SEND DATA
        $data['title'] = "Certificados | U-Linex";
        //view
        $this->load->view('certificados', $data);
    }

    public function validate() {
        if ($this->input->is_ajax_request()) {
            $code = $this->input->post("code");
            if ($code != null) {
                $params_customer_courses = array(
                    "select" => "customer_courses.date_start,
                                    courses.name as course_name,
                                    courses.time,
                                    customer_courses.date_start,
                                    customer_courses.date_end,
                                    courses.img,
                                    customer.customer_id,
                                    customer.name,
                                    customer.img,
                                    customer.last_name",
                    "join" => array('customer, customer_courses.customer_id = customer.customer_id',
                                    'courses, customer_courses.course_id = courses.course_id'),
                    "where" => "customer_courses.certificate = $code"
                );
                $result = $this->obj_customer_courses->get_search_row($params_customer_courses);
                if($result != null){
                    //verify img
                    if($result->img != null){
                        $img = site_url()."static/backoffice/images/profile/$result->customer_id/$result->img";
                    }else{
                        $img = site_url()."static/backoffice/images/avatar.png";
                    }
                    $data['status'] = true;
                    $data['name'] = $result->name." ".$result->last_name;
                    $data['time'] = $result->time;
                    $data['date_start'] = formato_fecha($result->date_start);
                    $data['date_end'] = formato_fecha($result->date_end);
                    $data['course_name'] = $result->course_name;
                    $data['img'] = $img;
                }else{
                    $data['status'] = false;
                }
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        }
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
