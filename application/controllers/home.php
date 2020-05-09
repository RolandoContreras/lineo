<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this->load->model("category_model","obj_category");
            $this->load->model("courses_model","obj_courses");
            $this->load->model("customer_model","obj_customer");
            $this->load->model("videos_model","obj_videos");
            $this->load->model("paises_model","obj_paises");
            $this->load->model("invoices_model","obj_invoices");
            $this->load->model("customer_courses_model","obj_customer_courses");
            $this->load->model("info_model","obj_info");
            $this->load->library('culqi');
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
                                );  
            $data['obj_courses'] = $this->obj_courses->search($params_course); 
            
            //set meta title
            $data['title'] = "Bienvenido";
            $this->load->view('home', $data);
	}
        
        public function mensaje()
	{
            if ($this->input->is_ajax_request()) {
                //obtener datos por post
              $name = $this->input->post("name");  
              $last_name = $this->input->post("last_name");  
              $email = $this->input->post("email");  
              $phone = $this->input->post("phone");  
              $course = $this->input->post("course");  
              //insertar en tabla info
              $param = array(
                            'name' => $name,
                            'last_name' => $last_name,
                            'email' => $email,
                            'phone' => $phone,
                            'course' => $course,
                            'status_value' => 1,
                            );                    
              $info_id =  $this->obj_info->insert($param);
              //enviar respuesta
              if($info_id != null){
                  $data['status'] = true;
              }else{
                  $data['status'] = false;
              }
              echo json_encode($data); 
            }
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
            
            if($this->cart->contents() != null){
                $this->load->view('pay_home', $data);
            }else{
                redirect(site_url()."cursos");
            }
	}
        
        public function active_course(){
        //ACTIVE CUSTOMER NORMALY
         try {
           //UPDATED SET TIME ZONE
           date_default_timezone_set('America/Lima');
           //obtener datos del cliente
           $name =  $this->input->post('name');
           $last_name =  $this->input->post('last_name');
           $email2 =  $this->input->post('email2');
           $phone =  $this->input->post('phone');
           $password =  $this->input->post('password');
           $pais =  $this->input->post('pais');
           $price_cart =  $this->cart->format_number($this->cart->total());
           $price =  $this->input->post('price');
           $token = $this->input->post('token');
           $email = $this->input->post('email');
           
           $nombre_completo = $name." ".$last_name;  
            //HACER LA CARGA A CULQI
            $charge = $this->culqi->charge($token,$price,$email,$nombre_completo);
               //crear usuario
               $data = array(
                        'name' => $name,
                        'last_name' => $last_name,
                        'email' => $email2,
                        'password' => $password,
                        'phone' => $phone,
                        'country' => $pais,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                    );
                    $customer_id = $this->obj_customer->insert($data);
                    //enviar mensaje de bievenida
                    $this->message($name, $email2, $password);
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
                    $course_id = $items['id'];
                    $params = array(
                        "select" =>"duration",
                        "where" => "course_id = $course_id",
                        );
                    //GET DATA COMMENTS
                     $obj_courses = $this->obj_courses->get_search_row($params);
                    //CREATE CUSTOMER COURSE
                    $duration = $obj_courses->duration==null?0:$obj_courses->duration;
                    //obtener día de hoy
                    $today = date("Y-m-d");
                    //sumar el tiempo de duración
                    $today_curso =  date("Y-m-d",strtotime($today."+ $duration days"));
                    $data = array(
                        'customer_id' => $customer_id,
                        'course_id' => $items['id'],
                        'date_start' => date("Y-m-d H:i:s"),
                        'duration_time' => $today_curso,
                    );
                    $this->obj_customer_courses->insert($data);
                }   
                 //create session
                    $data_customer_session['customer_id'] = $customer_id;
                    $data_customer_session['name'] = $name;
                    $data_customer_session['email'] = $email;
                    $data_customer_session['img'] = "";
                    $data_customer_session['active'] = 1;
                    $data_customer_session['logged_customer'] = "TRUE";
                    $_SESSION['customer'] = $data_customer_session; 
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
                //obtener id de cart
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
        
        public function message($name, $email, $password){    
                $mensaje = wordwrap("<html>
                    
 <div bgcolor='#E9E9E9' style='background:#fff;margin:0;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
  <table style='background-color:#fff;border-collapse:collapse;margin:0;padding:0' width='100%' height='100%' cellspacing='0' cellpadding='0' border='0'
    align='center'>
    <tbody>
      <tr>
        <td valign='top' align='center'>
          <table style='border-collapse:collapse;margin:0;padding:0;max-width:600px' width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
            <tbody>
              <tr>
                <td style='padding:39px 30px 31px;display:block;background:#fafafa'> 
                <p style='padding:32px 32px 0;color:#333333;background:#fff;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;line-height:14px;margin:0;font-size:14px;border-radius:5px 5px 0 0'
                    align='left'>Hola $name,</p> 
                </td>
              </tr>
              <tr>
                <td style='padding:0 30px;display:block;background:#fafafa'>
                  <table style='width:100%;border-collapse:collapse;padding:0' width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
                    <tbody>
                      <tr>
                        <td style='padding:0;background-color:#fff;border-radius:0 0 5px 5px;padding:32px'>
                          <p style='margin:0;padding-bottom:20px;color:#333333;line-height:22px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                          Bienvenido a U-LINEX nos da gusto que seas parte de nuestra comunidad, accede a tu oficina virtual a través del siguiente enlace  <a href='https://u-linex.com/login' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://u-linex.com/login&amp;source=gmail&amp;ust=1575431368630000&amp;usg=AFQjCNE2bxZM6aRU9Ckhj6hvz9ZXHzwzyA'>u-linex.com/login</a> <br/>Encuentra aquí tus credenciales de ingreso. </p>
                          <p style='margin:0 0 24px;padding:16px;border-radius:5px;padding-bottom:20px;background:#f7f7f7;color:#333333;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                          <span style='display:block;padding-bottom:8px'><span style='width:101px;display:inline-block'>Usuario: </span><strong>$email</strong></span><br/>
                              <span style='display:block;padding-bottom:8px'><span style='width:101px;display:inline-block'>Contraseña: </span><strong>$password</strong></span><br/>
                          </p> 
                          <a href='https://u-linex.com/login' style='background:#2d6ced;color:#ffffff;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px;display:inline-block;padding:12px 17px;text-decoration:none;border-radius:5px'
                            target='_blank'>Iniciar Sesión</a>                          
                          </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style='padding:30px 30px 0;display:block;background:#fafafa'>
                  <table style='width:100%;border-collapse:collapse;padding:0;text-align:center' width='100%' height='100%' cellspacing='0' cellpadding='0'
                    border='0' align='center'>
                    <tbody>
                      <tr>
                        <td style='max-width:290px;display:inline-block;padding:0 19px 30px;box-sizing:border-box;text-align:left'>
                          <p style='margin:0;text-align:center;line-height:20px;color:#888888;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:12px'>
                          Visítanos en  <a href='https://u-linex.com' style='color:#2d6ced;text-decoration:none' target='_blank'>www.u-linex.com</a></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
                            .</html>", 70, "\n", true);
                    $titulo = "Bienvenido - [U-LINEX]";
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: U-LINEX <contacto@u-linex.com>\r\n";
                    $bool = mail("$email",$titulo,$mensaje,$headers);
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
