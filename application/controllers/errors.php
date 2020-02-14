<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
/**
 * Description of errors
 *
 * @author Ing. Marcel M. Piña Parma
 * @name errors
 * @version 1.0
 * @date 04 Jul 2013
 *
 * 
 * Description:
 * Clase para poder customizar el error 404 y asi colocarle CSS
 * 
 * */

class Errors extends CI_Controller
{
    
 private $data = array();

 function __construct()
 
 {
 parent::__construct();
 $this->load->helper('html');
 $this->load->model("category_model","obj_category");
 }

 function error_404()
 {
 //llamamos a la vista que muestra el error 404 personalizado
 $data['obj_category'] = $this->nav_category();   
 //set meta title
 $data['title'] = "Bienvenido";
 $this->load->view('errors/404',$data);
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
}
/* End of file errors.php */
/* Location: ./application/controllers/errors.php */