<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class B_home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("videos_model", "obj_videos");
        $this->load->model("category_model", "obj_category");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("modules_model", "obj_modules");
        $this->load->model("customer_courses_model", "obj_customer_courses");
        $this->load->library('culqi');
    }

    public function index() {
        //GET SESION ACTUALY
        $this->get_session();
        //get customer id
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        $obj_category = $this->nav_category();
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        //get cursos comprados
        $obj_courses_by_customer = $this->courses_by_customer($customer_id);
        //get porcent of curse
        $params_customer_courses = array(
            "select" => "customer_courses.date_start,
                         category.name as category_name",
            "join" => array('customer, customer_courses.customer_id = customer.customer_id',
                'courses, customer_courses.course_id = courses.course_id',
                'category, courses.category_id = category.category_id'),
            "where" => "customer.customer_id = $customer_id",
            "order" => "courses.course_id DESC",
        );
        $obj_customer_courses = $this->obj_customer_courses->search($params_customer_courses);

        //mis compras
        $obj_orders = $this->mis_pedidos($customer_id);
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $where = "courses.name like '%$search%' and courses.active = 1";
        } else {
            $where = "courses.active = 1";
        }
        $category_name = "Todos los videos";
        //get all courses
        $params_course = array(
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
            "where" => $where,
            "order" => "courses.course_id DESC",
        );

        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("backoffice");
        $config["total_rows"] = $this->obj_courses->total_records($params_course);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 2;

        $config['first_tag_open'] = '<li class="paginate_button page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="paginate_button page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="paginate_button page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=" paginate_button page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="paginate_button page-item">';
        $config['next_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li class="paginate_button page-item">';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $obj_pagination = $this->pagination->create_links();
        /// DATA
        $obj_courses = $this->obj_courses->search_data($params_course, $config["per_page"], $this->uri->segment(2));
        //GET DATA CURSOS COMPRADOS
        $title = "Oficina Virtual | U-linex";
        $this->tmp_backoffice->set("title", $title);
        $this->tmp_backoffice->set("obj_orders", $obj_orders);
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("category_name", $category_name);
        $this->tmp_backoffice->set("obj_pagination", $obj_pagination);
        $this->tmp_backoffice->set("obj_category", $obj_category);
        $this->tmp_backoffice->set("obj_courses_by_customer", $obj_courses_by_customer);
        $this->tmp_backoffice->set("obj_courses", $obj_courses);
        $this->tmp_backoffice->render("backoffice/b_home");
    }

    public function cursos() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET NAV CURSOS
        $data['obj_category'] = $this->nav_category();
        //get profile
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $where = "courses.name like '%$search%' and courses.active = 1";
        } else {
            $where = "courses.active = 1";
        }
        //get all courses
        $params_course = array(
            "select" => "courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.description,
                                                courses.img,
                                                courses.price,
                                                courses.price_del,
                                                courses.time,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => "courses.active = 1",
        );

        /// DATA
        $data['obj_courses'] = $this->obj_courses->search($params_course);
        //GET DATA CURSOS COMPRADOS
        $this->load->view("backoffice/b_cursos", $data);
    }

    public function certificados() {
        //GET SESION ACTUALY
        //get customer id

        $this->get_session();
        $customer_id = $_SESSION['customer']['customer_id'];
        $obj_category = $this->nav_category();
        //get cursos comprados
        $obj_courses_by_customer = $this->courses_by_customer($customer_id);
        $this->validate_certificate($obj_courses_by_customer);
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("obj_courses_by_customer", $obj_courses_by_customer);
        $this->tmp_backoffice->set("obj_category", $obj_category);
        $this->tmp_backoffice->render("backoffice/b_certificados");
    }

    public function validate_certificate($obj_courses_by_customer) {

        if (!empty($obj_courses_by_customer)) {
            foreach ($obj_courses_by_customer as $value) {
                if ($value->certificate == null && $value->complete == 1) {
                    //make certificate
                    $text = "0000" . $value->customer_course_id . $value->customer_id;
                    $data = array(
                        'certificate' => $text,
                    );
                    $this->obj_customer_courses->update($value->customer_course_id, $data);
                }
            }
        }
    }

    public function certificados_download() {

        $this->get_session();
//            $customer_course_id = $this->input->post('id');
        //GET SESION ACTUALY
        //Report any errors
        ini_set("display_errors", "1");
        error_reporting(E_ALL);

        header('Content-Type: image/jpeg');
        $fuente = site_url() . 'static/backoffice/fonts/arial.ttf';
        $imagen = 'static/backoffice/images/certificados/certificado.jpg';

        $font_path = dirname(__FILE__) . '\arial.ttf';

        $im = imagecreate(500, 500);
        $dark_grey = imagecolorallocate($im, 102, 102, 102);
        $black = imagecolorallocate($im, 0, 0, 0);
        $img2 = imagecreatefromjpeg($imagen);
//        imagestring($img2, 5, 250, 100, "Prueba de Certificado", $black);
//        imagestring($img2, 5, 500, 100, "Prueba de Certificado", $black);
//        imagestring($img2, 5, 700, 100, "Prueba de Certificado", $black);
        imagettftext($img2, 20, 0, 11, 21, $black, $fuente, "Fuunetetete");

//        imagettftext($image, 50, 0, 10, 160, $white, $font_path, $string);




        header('content-type: image/png');

//Create our basic image stream 300x300 pixels
        $image = imagecreate(300, 300);

//Set up some colors, use a dark gray as the background color
        $dark_grey = imagecolorallocate($image, 102, 102, 102);
        $white = imagecolorallocate($image, 255, 255, 255);

//Set the path to our true type font
// $font_path = 'advent_light';
// $font_path = 'arial';
// $font_path = '/arial.tff';
// $font_path = dirname(__FILE__) . '/arial.ttf';
        $font_path = dirname(__FILE__) . '/fonts/arial.ttf';

        var_dump($dark_grey);
        die();


        //Set our text string
        $string = 'Hello World!';

        //Write our text to the existing image.
        imagettftext($image, 50, 0, 10, 160, $white, $font_path, $string);


        var_dump($result);
        die();


        imagejpeg($img2);
        imagedestroy($img2);
    }

    public function soporte() {
//GET SESION ACTUALY
        $this->get_session();
//get customer id
        $customer_id = $_SESSION['customer']['customer_id'];
//GET NAV CURSOS
        $obj_category = $this->nav_category();
//get profile
        $obj_profile = $this->get_profile($customer_id);
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("obj_category", $obj_category);
        $this->tmp_backoffice->render("backoffice/b_zoom");
    }

    public function category() {
        $this->get_session();
//GET NAV CURSOS
        $data['obj_category'] = $this->nav_category();
//verificar si existe busqueda
        $where_category = null;
        $where_search = null;
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $categorias = $_GET['category'];
            $array_data = "";
            foreach ($categorias as $value) {
                $array_data .= $value . ",";
            }
            $array_data = eliminar_ultimo_caracter($array_data);
            $where_category = "category.category_id in ($array_data)";
        }
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $where_search = "courses.name like '%$search%'";
        }
//make where
        if ($where_category != null && $where_search != null) {
            $where = "$where_category and $where_search and courses.active = 1";
        } elseif ($where_category != null) {
            $where = "$where_category and courses.active = 1";
        } elseif ($where_search != null) {
            $where = "$where_search and courses.active = 1";
        } else {
            $where = "courses.active = 1";
        }
        $params_course = array(
            "select" => "courses.course_id,
courses.category_id,
courses.name,
courses.slug,
courses.description,
courses.img,
courses.time,
courses.price,
courses.price_del,
courses.date,
category.name as category_name,
category.slug as category_slug",
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => $where,
            "order" => "courses.course_id DESC",
        );
        $data['obj_courses'] = $this->obj_courses->search($params_course);
        $this->load->view("backoffice/b_cursos", $data);
    }

    public function active_course() {
        //ACTIVE CUSTOMER NORMALY
        try {
//GET SESION ACTUALY
            $this->get_session();
//UPDATED SET TIME ZONE
            date_default_timezone_set('America/Lima');
//get customer
            $customer_id = $_SESSION['customer']['customer_id'];
//SELECT DATA CUSTOMER
            $params_customer = array(
                "select" => "name",
                "where" => "customer_id = $customer_id",
            );
//GET DATA COMMENTS
            $obj_customer = $this->obj_customer->get_search_row($params_customer);

            $price_cart = $this->cart->format_number($this->cart->total());
            $price = $this->input->post('price');
            $token = $this->input->post('token');
            $email = $this->input->post('email');
//obtener día de hoy
            $today = date("Y-m-d");
//make charged
            $charge = $this->culqi->charge($token, $price, $email, $obj_customer->name);

            $price_cart = explode(".", $price_cart);
            $price = $price_cart[0];
            $price = quitar_coma_number($price);
//INSERT INVOICE

            $option = "";
            foreach ($this->cart->contents() as $items) {
//CREATE INVOICE
                $data_invoice = array(
                    'customer_id' => $customer_id,
                    'course_id' => $items['id'],
                    'sub_total' => $items['price'],
                    'igv' => 0,
                    'total' => $items['price'],
                    'date' => date("Y-m-d H:i:s"),
                    'active' => 2,
                );
                $invoice_id = $this->obj_invoices->insert($data_invoice);
                $course_id = $items['id'];
                $params = array(
                    "select" => "duration",
                    "where" => "course_id = $course_id",
                );
//GET DATA COMMENTS
                $obj_courses = $this->obj_courses->get_search_row($params);
//CREATE CUSTOMER COURSE
                $duration = $obj_courses->duration == null ? 0 : $obj_courses->duration;
//sumar el tiempo de duración
                $today_curso = date("Y-m-d", strtotime($today . "+ $duration days"));
                $data = array(
                    'customer_id' => $customer_id,
                    'course_id' => $items['id'],
                    'date_start' => date("Y-m-d H:i:s"),
                    'duration_time' => $today_curso,
                );
                $this->obj_customer_courses->insert($data);
            }
//DESTROY CART
            $this->cart->destroy();
// Respuesta
            $data['status'] = "true";
            echo json_encode($charge);
        } catch (Exception $e) {
            $data['status'] = "false";
            echo json_encode($e->getMessage());
        }
    }

    public function upload() {

//SELECT ID FROM CUSTOMER
        if (isset($_FILES["file"]["name"])) {
            $config['upload_path'] = './static/backoffice/images/profile/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $img = $_FILES["file"]["name"];
            if ($img != null) {
                $customer_id = $_SESSION['customer']['customer_id'];
                $data = array(
                    'img' => $img,
                );
//GRABAR EN CLIENTES
                $this->obj_customer->update($customer_id, $data);
//elimina imagen anterior
                if ($_SESSION['customer']['img'] != null) {
                    unlink("./static/backoffice/images/profile/" . $_SESSION['customer']['img']);
                }
                $this->update_session($img);
            }
        }
    }

    public function update_session($img) {
        $data_customer_session['customer_id'] = $_SESSION['customer']['customer_id'];
        $data_customer_session['name'] = $_SESSION['customer']['name'];
        $data_customer_session['email'] = $_SESSION['customer']['email'];
        $data_customer_session['img'] = $img;
        $data_customer_session['logged_customer'] = "TRUE";
        $data_customer_session['active'] = $_SESSION['customer']['active'];
        $this->session->unset_userdata('customer');
        $_SESSION['customer'] = $data_customer_session;
    }

    public function add_cart() {
        if ($this->input->is_ajax_request()) {
//GET CUSTOMER_ID
            $price = $this->input->post('price');
            $course_id = $this->input->post('course_id');
            $quantity = 1;
            $name = $this->input->post('name');
            $name_cart = convert_slug_cart($name);
            $img = $this->input->post('img');
//ADD CART
            if ($quantity > 0) {
                $data = array(
                    'id' => $course_id,
                    'qty' => $quantity,
                    'price' => $price,
                    'name' => "$name_cart",
                    'img' => "$img"
                );
                $cart_id = $this->cart->insert($data);
                if ($cart_id != "") {
                    $data['status'] = "true";
                } else {
                    $data['status'] = "false";
                }
            } else {
                $data['status'] = "false";
            }
            echo json_encode($data);
        }
    }

    public function pay_order() {
//GET SESION ACTUALY
        $this->get_session_pay_order();
//get customer id
        $customer_id = $_SESSION['customer']['customer_id'];
//get nav ctalogo
        $obj_category = $this->nav_category();
//get cursos comprados
        $obj_courses_by_customer = $this->courses_by_customer($customer_id);
//SEND DATA
        $this->tmp_backoffice->set("obj_courses_by_customer", $obj_courses_by_customer);
        $this->tmp_backoffice->set("obj_category", $obj_category);
        $this->tmp_backoffice->render("backoffice/b_pay_order");
    }

    public function delete_cart() {

        if ($this->input->is_ajax_request()) {
//GET SESION ACTUALY
            $this->get_session();
//GET CUSTOMER_ID

            $id = $this->input->post('id');
//UPDATE CART
            $data = array(
                'rowid' => "$id",
                'qty' => 0
            );

            $this->cart->update($data);

            $data['status'] = "true";
            echo json_encode($data);
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

    public function mis_pedidos($customer_id) {
//GET DATA INVOICES BY CUSTOMER
        $params = array(
            "select" => "invoices.invoice_id,
invoices.date,
invoices.total,
invoices.active,
courses.name as course_name",
            "where" => "invoices.customer_id = $customer_id",
            "join" => array('courses, courses.course_id = invoices.course_id'),
            "order" => "invoices.invoice_id DESC",
        );

        return $obj_invoices = $this->obj_invoices->search($params);
    }

    public function get_profile($customer_id) {
        $params_category = array(
            "select" => "customer_id,
                        name,
                        last_name,
                        bio,
                        facebook,
                        twitter,
                        instagram,
                        google,
                        img",
            "where" => "customer_id = $customer_id and active = 1",
        );
//GET DATA COMMENTS
        return $obj_customer = $this->obj_customer->get_search_row($params_category);
    }

    public function courses_by_customer($customer_id) {
        $params_customer_courses = array(
            "select" => "customer_courses.date_start,
                        courses.course_id,
                        courses.category_id,
                        courses.name,
                        courses.slug,
                        courses.time,
                        customer_courses.customer_course_id,
                        customer_courses.total_video,
                        customer_courses.certificate,
                        customer_courses.total,
                        customer_courses.complete,
                        courses.description,
                        courses.img,
                        courses.price,
                        courses.date,
                        customer.customer_id,
                        category.slug as category_slug,
                        category.name as category_name",
            "join" => array('customer, customer_courses.customer_id = customer.customer_id',
                'courses, customer_courses.course_id = courses.course_id',
                'category, courses.category_id = category.category_id'),
            "where" => "customer.customer_id = $customer_id",
            "order" => "courses.course_id DESC",
        );
        return $obj_customer_courses = $this->obj_customer_courses->search($params_customer_courses);
    }

    public function update_data() {
        if ($this->input->is_ajax_request()) {
//GET SESION ACTUALY
            $this->get_session();
//get customer id
            $customer_id = $_SESSION['customer']['customer_id'];
            $bio = $this->input->post("bio");
            $facebook = trim($this->input->post("facebook"));
            $google = trim($this->input->post("google"));
            $twitter = trim($this->input->post("twitter"));
            $instagram = trim($this->input->post("instagram"));

            if ($customer_id != null) {
                $data = array(
                    'bio' => $bio,
                    'facebook' => $facebook,
                    'google' => $google,
                    'twitter' => $twitter,
                    'instagram' => $instagram,
                );
//SAVE DATA IN TABLE    
                $result = $this->obj_customer->update($customer_id, $data);
                if ($result != null) {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function change_pass() {
        if ($this->input->is_ajax_request()) {
//GET SESION ACTUALY
            $this->get_session();
//get customer id
            $customer_id = $_SESSION['customer']['customer_id'];
            $pass = trim($this->input->post("pass"));
            if ($customer_id != null) {
                $data = array(
                    'password' => $pass,
                );
//SAVE DATA IN TABLE    
                $result = $this->obj_customer->update($customer_id, $data);
                if ($result != null) {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
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

    public function get_session_pay_order() {
        if (isset($_SESSION['customer'])) {
            if ($_SESSION['customer']['logged_customer'] == "TRUE") {
                return true;
            } else {
                redirect(site_url() . 'compra');
            }
        } else {
            redirect(site_url() . 'compra');
        }
    }

}
