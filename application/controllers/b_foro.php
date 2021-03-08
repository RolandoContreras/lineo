<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class B_foro extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("category_model", "obj_category");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("foro_model", "obj_foro");
    }

    public function index() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        $obj_category = $this->nav_category();
        //get courses
        $obj_courses_nav = $this->nav_courses();
        //GET course
        $obj_courses = $this->get_course();
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        //SEND DATA
        $this->tmp_backoffice->set("obj_courses", $obj_courses);
        $this->tmp_backoffice->set("obj_category", $obj_category);
        $this->tmp_backoffice->set("obj_courses_nav", $obj_courses_nav);
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("customer_id", $customer_id);
        $this->tmp_backoffice->render("backoffice/b_foro");
    }
    
    public function edit($foro_id = null) {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        //GET NAV CURSOS
        $obj_category = $this->nav_category();
        //get profile
        if(isset($foro_id)){
            $obj_foro = $this->get_foro($foro_id);
            //RENDER
            $this->tmp_backoffice->set("obj_foro", $obj_foro);
        }
        //GET course
        $obj_courses = $this->get_course();
        //SEND DATA
        $this->tmp_backoffice->set("obj_courses", $obj_courses);
        $this->tmp_backoffice->set("obj_category", $obj_category);
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("customer_id", $customer_id);
        $this->tmp_backoffice->render("backoffice/b_foro");
    }
    
    public function validate() {
        //SELECT ID FROM CUSTOMER
        $customer_id = $_SESSION['customer']['customer_id'];
        $foro_id = $this->input->post('foro_id');
        //get data quiz
        $title = trim($this->input->post('title'));
        $slug = convert_slug($title);
        $course_id = $this->input->post('course_id');
        $description = $this->input->post('description');
        //create blog
        if ($foro_id != null) {
            $param_foro = array(
                'title' => $title,
                'slug' => $slug,
                'customer_id' => $customer_id,
                'description' => $description,
                'course_id' => $course_id,
                'date' => date("Y-m-d H:i:s"),
            );
            //SAVE DATA IN TABLE    
            $this->obj_foro->update($foro_id, $param_foro);
        } else{
            $param_foro = array(
                'title' => $title,
                'slug' => $slug,
                'customer_id' => $customer_id,
                'course_id' => $course_id,
                'description' => $description,
                'date' => date("Y-m-d H:i:s"),
                'active' => 1,
            );
            //SAVE DATA IN TABLE    
            $foro_id = $this->obj_foro->insert($param_foro);
        }
        if (!empty($foro_id)) {
            //save image
            $img = $_FILES['file'];
            $templocation = $img["tmp_name"];
            $name = convert_slug($img["name"]);
            if ($name != null) {
                if (!is_dir("./static/backoffice/images/foro/$foro_id")) {
                    mkdir("./static/backoffice/images/foro/$foro_id", 0777);
                }
                if (!$templocation) {
                    die("No se ha seleccionado ningun archivos");
                }
                if (move_uploaded_file($templocation, "./static/backoffice/images/foro/$foro_id/$name")) {
                    $param = array(
                        'img' => $name,
                    );
                    //SAVE DATA IN TABLE    
                    $this->obj_foro->update($foro_id, $param);
                }
            }
            //save document
            $img = $_FILES['file_2'];
            $templocation = $img["tmp_name"];
            $name = convert_slug($img["name"]);
            if ($name != null) {
                if (!is_dir("./static/backoffice/images/foro/$foro_id")) {
                    mkdir("./static/backoffice/images/foro/$foro_id", 0777);
                }
                if (!$templocation) {
                    die("No se ha seleccionado ningun archivos");
                }
                if (move_uploaded_file($templocation, "./static/backoffice/images/foro/$foro_id/$name")) {
                    $param = array(
                        'document' => $name,
                    );
                    //SAVE DATA IN TABLE    
                    $this->obj_foro->update($foro_id, $param);
                }
            }
            $data['status'] = true;
            $data['blog_id'] = $foro_id;
        } else {
            $data['status'] = false;
        }
        echo json_encode($data);
    }
    
    public function update_description() {
        $foro_id = $this->input->post('foro_id');
        $description = $this->input->post('description');
        if ($foro_id != null) {
            $param_foro = array(
                'description' => $description,
            );
            //SAVE DATA IN TABLE    
            $this->obj_foro->update($foro_id, $param_foro);
        } 
        return true;
    }
    
    public function get_profile($customer_id) {
        $params_category = array(
            "select" => "customer.customer_id,
                                    customer.name,
                                    customer.last_name,
                                    customer.bio,
                                    customer.facebook,
                                    customer.twitter,
                                    customer.instagram,
                                    customer.img",
            "where" => "customer.customer_id = $customer_id and customer.active = 1"
        );
        //GET DATA COMMENTS
        return $obj_customer = $this->obj_customer->get_search_row($params_category);
    }
    
    public function get_foro($foro_id) {
        $params_foro = array(
            "select" => "foro.title,
                                    foro.slug,
                                    foro.foro_id,
                                    foro.description,
                                    foro.document,
                                    courses.course_id,
                                    foro.img",
            "join" => array('courses, foro.course_id = courses.course_id'),
            "where" => "foro.foro_id = $foro_id"
        );
        //GET DATA COMMENTS
        return $obj_foro = $this->obj_foro->get_search_row($params_foro);
    }
    
    public function get_course() {
        $params_category = array(
            "select" => "course_id,
                        name,
                        slug",
            "where" => "active = 1",
        );
//GET DATA COMMENTS
        return $obj_course = $this->obj_courses->search($params_category);
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
    
    public function get_session() {
        if (isset($_SESSION['customer'])) {
            if ($_SESSION['customer']['logged_customer'] == "TRUE") {
                return true;
            } else {
                redirect(site_url() . 'home');
            }
        } else {
            redirect(site_url() . 'home');
        }
    }

}
