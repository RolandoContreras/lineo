<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("category_model","obj_category");
        $this->load->model("courses_model","obj_courses");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("modules_model","obj_modules");
        $this->load->model("customer_courses_model","obj_customer_courses");
        $this->load->library('culqi');
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //get customer id
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        $obj_category_videos = $this->nav_category();
        //get courses by customer
        $obj_courses_by_customer = $this->courses_by_customer($customer_id);
        //GET CUSTOMER ID
        $customer_id = $_SESSION['customer']['customer_id'];
        
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
            //GET DATA CURSOS COMPRADOS
            
        $url = 'backoffice';
        $this->tmp_backoffice->set("obj_courses_by_customer",$obj_courses_by_customer);    
        $this->tmp_backoffice->set("url",$url);    
        $this->tmp_backoffice->set("category_name",$category_name);
        $this->tmp_backoffice->set("obj_pagination",$obj_pagination);
        $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
        $this->tmp_backoffice->set("obj_courses",$obj_courses);
        $this->tmp_backoffice->render("backoffice/b_home");
    }
    
    public function category($slug)
	{
            $this->get_session();
            //get customer id
            $customer_id = $_SESSION['customer']['customer_id'];
            //GET NAV CURSOS
            $obj_category_videos = $this->nav_category();
            //get courses by customer
            $obj_courses_by_customer = $this->courses_by_customer($customer_id);
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
            $this->tmp_backoffice->set("obj_courses_by_customer",$obj_courses_by_customer);    
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
            //get customer id
            $customer_id = $_SESSION['customer']['customer_id'];
            $obj_courses_by_customer = $this->courses_by_customer($customer_id);
             //get data video
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
                            "join" => array('category, courses.category_id = category.category_id'),
                            "where" => "courses.slug = '$slug_2' and category.slug = '$slug'");
            $obj_courses = $this->obj_courses->get_search_row($params);
            $course_id = $obj_courses->course_id;
            //obtener modulos por cursos
            $params = array(
                            "select" =>"module_id,
                                        name",
                            "where" => "course_id = $course_id");
            $obj_modules = $this->obj_modules->search($params);
            $total_modules = count($obj_modules);    
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
                                        videos.slug,
                                        videos.time",
                            "where" => "videos.module_id in ($array_data) and videos.active = 1",
                            "order" => "videos.video_id ASC");
            $obj_videos = $this->obj_videos->search($params);
            //obtener el total de los vídeos
            $total_videos = count($obj_videos);
            //cursos relacionados            
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
                            "join" => array( 'category, courses.category_id = category.category_id'),
                            "where" => "category.slug = '$slug' and courses.course_id <> $course_id",
                            "order" => "RAND()"
                );
            $obj_courses_related = $this->obj_courses->search($params);
            
            //SEND DATA
            $this->tmp_backoffice->set("obj_courses_by_customer",$obj_courses_by_customer);
            $this->tmp_backoffice->set("obj_modules",$obj_modules);
            $this->tmp_backoffice->set("obj_videos",$obj_videos);
            $this->tmp_backoffice->set("obj_courses_related",$obj_courses_related);
            $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
            $this->tmp_backoffice->set("obj_courses",$obj_courses);
            $this->tmp_backoffice->render("backoffice/b_detail");
	}
        
    public function order()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get nav ctalogo
        $obj_category_videos = $this->nav_category();
        //get courses by customer
        $obj_courses_by_customer = $this->courses_by_customer($customer_id);
        //GET DATA INVOICES BY CUSTOMER
        $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    invoices.active,
                                    customer.name,
                                    courses.name as course_name",
                        "where" => "invoices.customer_id = $customer_id",
                        "join" => array('customer, customer.customer_id = invoices.customer_id',
                                        'courses, courses.course_id = invoices.course_id'),
                        );

        $obj_invoices = $this->obj_invoices->search($params);
        $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
        $this->tmp_backoffice->set("obj_courses_by_customer",$obj_courses_by_customer);
        $this->tmp_backoffice->set("obj_invoices",$obj_invoices);
        $this->tmp_backoffice->render("backoffice/b_order");
    }    
        
    public function add_cart() {
        if($this->input->is_ajax_request()){   
                //GET CUSTOMER_ID
                $price = $this->input->post('price');
                $course_id = $this->input->post('course_id');
                $quantity = 1;
                $name = $this->input->post('name');
                $name_cart = convert_slug_cart($name);
                //ADD CART
                if($quantity > 0){
                    $data = array(
                        'id'      => $course_id,
                        'qty'     => $quantity,
                        'price'   => $price,
                        'name'    => "$name_cart",
                    );
                    $cart_id = $this->cart->insert($data);
                    if($cart_id != ""){
                        $data['status'] = "true";
                    }else{
                        $data['status'] = "false";
                    }
                }else{
                    $data['status'] = "false";
                }
               echo json_encode($data); 
        }
    }
    
    public function pay_order()
    {
        //GET SESION ACTUALY
        $this->get_session_pay_order();
        //get customer id
        $customer_id = $_SESSION['customer']['customer_id'];
        //get nav ctalogo
        $obj_category_videos = $this->nav_category();
        //get cursos comprados
        $obj_courses_by_customer = $this->courses_by_customer($customer_id);
        //SEND DATA
        $this->tmp_backoffice->set("obj_courses_by_customer",$obj_courses_by_customer);
        $this->tmp_backoffice->set("obj_category_videos",$obj_category_videos);
        $this->tmp_backoffice->render("backoffice/b_pay_order");
    }
    
    public function active_course(){
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
                        "select" =>"name",
                "where" => "customer_id = $customer_id",
                );
            //GET DATA COMMENTS
             $obj_customer = $this->obj_customer->get_search_row($params_customer);
             
               $price_cart =  $this->cart->format_number($this->cart->total());
               $price =  $this->input->post('price');
               $token = $this->input->post('token');
               $email = $this->input->post('email');
               //make charged
               $charge = $this->culqi->charge($token,$price,$email,$obj_customer->name);
               
               $price_cart = explode(".", $price_cart);
               $price = $price_cart[0];
               $price= quitar_coma_number($price); 
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
                    //CREATE CUSTOMER COURSE
                    $data = array(
                        'customer_id' => $customer_id,
                        'course_id' => $items['id'],
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
    
    public function delete_cart() {
        
        if($this->input->is_ajax_request()){   
               //GET SESION ACTUALY
                $this->get_session();
                //GET CUSTOMER_ID
                
                $id = $this->input->post('id');
               //UPDATE CART
                $data = array(
                        'rowid' => "$id",
                        'qty'   => 0
                );

                $this->cart->update($data);
                
               $data['status'] = "true";
               echo json_encode($data); 
        }
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
    
    public function courses_by_customer($customer_id){
        $params_customer_courses = array(
                                    "select" =>"courses.course_id,
                                                courses.name,
                                                courses.category_id,
                                                courses.slug as course_slug,
                                                customer.customer_id,
                                                category.slug as category_slug",
                                    "join" => array('customer, customer_courses.customer_id = customer.customer_id',
                                                    'courses, customer_courses.course_id = courses.course_id',
                                                    'category, courses.category_id = category.category_id'),
                                    "where" => "customer.customer_id = $customer_id",
                                    "order" => "courses.course_id DESC",
                                ); 
        return $obj_customer_courses = $this->obj_customer_courses->search($params_customer_courses);
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
    
    public function get_session_pay_order(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE"){               
                return true;
            }else{
                redirect(site_url().'login');
            }
        }else{
            redirect(site_url().'login');
        }
    }
}
