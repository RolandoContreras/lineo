<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("category_model", "obj_category");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("videos_model", "obj_videos");
        $this->load->model("paises_model", "obj_paises");
        $this->load->model("boletin_model", "obj_boletin");
        $this->load->model("reclamacion_model", "obj_reclamacion");
        $this->load->model("foro_model", "obj_foro");
        $this->load->library('culqi');
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
        //set para home
        $params_course = array(
            "select" => "courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.time,
                                                courses.img,
                                                courses.free,
                                                courses.popular,
                                                courses.price,
                                                courses.price_del,
                                                courses.description,
                                                category.name as category_name,
                                                category.slug as category_slug",
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => "courses.active = 1",
            "order" => "courses.course_id ASC",
        );
        $data['obj_courses'] = $this->obj_courses->search($params_course);
        //get all data
        $params = array("select" => "count(*) as total_customer,
                                        (select count(*) from courses where active = 1) as total_courses",
        );
        $data['obj_total'] = $this->obj_customer->get_search_row($params);
        //set meta title
        $data['title'] = "U-Linex | Bienvenido";
        $this->load->view('home', $data);
    }

    public function mensaje() {
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
            $info_id = $this->obj_info->insert($param);
            //enviar respuesta
            if ($info_id != null) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function term_condition() {
        //get category
        $data['obj_category'] = $this->nav_category();
        $data['title'] = "U-Linex | Terminos y Condiciones";
        $this->load->view('terminos', $data);
    }

    public function policy() {
        //get category
        $data['obj_category'] = $this->nav_category();
        $data['title'] = "U-Linex | Política de privacidad y cookies";
        $this->load->view('policy', $data);
    }

    public function reclamaciones() {
        //get category
        $data['obj_category'] = $this->nav_category();
        $data['title'] = "U-Linex | Libro de Reclamaciones";
        $this->load->view('reclamaciones', $data);
    }

    public function send_reclamacion() {
        if ($this->input->is_ajax_request()) {
            //obtener datos por post
            $name = $this->input->post("name");
            $last_name = $this->input->post("last_name");
            $dni = $this->input->post("dni");
            $message = $this->input->post("message");
            //insertar en tabla info
            $param = array(
                'name' => $name,
                'last_name' => $last_name,
                'dni' => $dni,
                'message' => $message,
                'date' => date("Y-m-d H:i:s"),
            );
            $reclamacion_id = $this->obj_reclamacion->insert($param);
            //enviar respuesta
            if ($reclamacion_id != null) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function boletin() {
        //ENVIAR MENSAJE DE CORREO
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post("email");
            $param = array(
                'email' => $email,
                'active' => 1,
                'date' => date("Y-m-d H:i:s")
            );
            //SAVE DATA IN TABLE    
            $result = $this->obj_boletin->insert($param);
            if ($result != null) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        }
    }

    public function pagar() {
        //get category
        $data['obj_category'] = $this->nav_category();
        //Select params
        $data['obj_paises'] = $this->list_pais();
        $data['title'] = "Finalizar Compra";
        if ($this->cart->contents() != null) {
            $this->load->view('login_pay', $data);
        } else {
            redirect(site_url());
        }
    }

    public function sitemap() {
        //obtener categorias
        $obj_category = $this->nav_category();
        //obtener cursos
        $params_course = array(
            "select" => "courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.slug,
                                                courses.date,
                                                category.name as category_name,
                                                category.slug as category_slug",
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => "courses.active = 1",
            "order" => "courses.course_id DESC",
        );
        $obj_courses = $this->obj_courses->search($params_course);
        //obtener foro
        $params_foro = array(
            "select" => "foro.foro_id,
                        foro.slug,
                        foro.date,
                        courses.slug as course_slug",
            "join" => array('courses, foro.course_id = courses.course_id'),
            "where" => "courses.active = 1",
            "order" => "foro.foro_id DESC",
        );
        $obj_foro = $this->obj_foro->search($params_foro);
        //crear código
        $codigo = '<?xml version="1.0" encoding="UTF-8"?>
      <urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        foreach ($obj_category as $value) {
            $explode_data = explode(" ", $value->date);
            $date = "$explode_data[0]" . 'T' . $explode_data[1] . "+00:00";
            $codigo .='<url>
                <loc>' . site_url() . "cursos/" . $value->slug;
            $codigo .='</loc>
                <lastmod>' . $date . '</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.80</priority>
                </url>';
        }
        foreach ($obj_courses as $value) {
            $explode_data = explode(" ", $value->date);
            $date = "$explode_data[0]" . 'T' . $explode_data[1] . "+00:00";
            $codigo .='<url>
                <loc>' . site_url() . "cursos/" . $value->category_slug . "/" . $value->slug;
            $codigo .='</loc>
                <lastmod>' . $date . '</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.80</priority>
                </url>';
        }
        foreach ($obj_foro as $value) {
            $explode_data = explode(" ", $value->date);
            $date = "$explode_data[0]" . 'T' . $explode_data[1] . "+00:00";
            $codigo .='<url>
                <loc>' . site_url() . "foro/" . $value->course_slug . "/" . $value->slug;
            $codigo .='</loc>
                <lastmod>' . $date . '</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.80</priority>
                </url>';
        }
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>1.00</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'home' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>1.00</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'cursos' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'foro' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'contacto' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'iniciar-sesion' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'registro' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'terminos-condiciones' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
        $codigo .='</url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'politica-privacidad' . '</loc>';
        $codigo .='<lastmod>2020-07-28T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
                       <priority>0.80</priority>';
        $codigo .='</url>';
        $codigo .='</urlset>';
        $path = "sitemap.xml";
        $modo = "w+";

        if ($fp = fopen($path, $modo)) {
            fwrite($fp, $codigo);
            echo "Se realizo con Exito";
        } else {
            echo "Error";
        }
    }

    public function list_pais() {
        //Select params
        $params = array(
            "select" => "id, nombre",
            "where" => "id_idioma = 7");
        $obj_paises = $this->obj_paises->search($params);
        return $obj_paises;
    }

    public function delete_cart() {
        if ($this->input->is_ajax_request()) {
            //obtener id de cart
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
        $bool = mail("$email", $titulo, $mensaje, $headers);
    }

    public function nav_category() {
        $params_category = array(
            "select" => "category_id,
                                    slug,
                                    name,
                                    date",
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
