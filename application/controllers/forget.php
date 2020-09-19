<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forget extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("category_model", "obj_category");
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("courses_model", "obj_courses");
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
        $data['obj_category'] = $this->nav_category();
        //get courses
        $data['obj_courses_nav'] = $this->nav_courses();
        //send meta title
        $data['title'] = "Recuperar Contraseña";
        //enviar datos
        $this->load->view('forget', $data);
    }

    public function recuperar() {
        //ENVIAR MENSAJE DE CORREO
        if ($_POST['google-response-token']) {
            $googleToken = $_POST['google-response-token'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcXCc4ZAAAAAEM44Vk4uTY7IiHmIyYZrzi-UEwe&response={$googleToken}");
            $response = json_decode($response);
            $response = (array) $response;
            if ($response['success'] && ($response['score'] && $response['score'] > 0.5)) {
                $email = $this->input->post("email");
                //verificar email y nombre del cliente
                $params = array(
                    "select" => "customer_id,
                                    name,
                                    password",
                    "where" => "email = '$email'");
                //GET DATA FROM INVOICES
                $obj_customer = $this->obj_customer->get_search_row($params);
                if ($obj_customer != null) {
                    //enviar mensaje con contraseña
                    $this->message($obj_customer->name, $email, $obj_customer->password);
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            } else {
                $data['status'] = "false2";
            }
        }

        echo json_encode($data);
        exit();
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

    public function message($name, $email, $password) {
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
                          Bienvenido a U-LINEX nos da gusto que seas parte de nuestra comunidad, Te dejamos la contraseña con la cual te registraste, si deseas cambiarla puedes hacerlo desde tu oficina virtual en el siguiente enlace  <a href='https://u-linex.com/login' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://u-linex.com/iniciar-sesion&amp;source=gmail&amp;ust=1575431368630000&amp;usg=AFQjCNE2bxZM6aRU9Ckhj6hvz9ZXHzwzyA'>u-linex.com/iniciar-sesion</a> <br/>Encuentra aquí tus credenciales de ingreso. </p>
                          <p style='margin:0 0 24px;padding:16px;border-radius:5px;padding-bottom:20px;background:#f7f7f7;color:#333333;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                          <span style='display:block;padding-bottom:8px'><span style='width:101px;display:inline-block'>Contraseña Actual: </span><strong>$password</strong></span>
                          </p> 
                          <a href='https://u-linex.com/iniciar-sesion' style='background:#2d6ced;color:#ffffff;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px;display:inline-block;padding:12px 17px;text-decoration:none;border-radius:5px'
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
        $titulo = "Recuperar Contraseña - [U-LINEX]";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: U-LINEX <contacto@u-linex.com>\r\n";
        $bool = mail("$email", $titulo, $mensaje, $headers);
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
