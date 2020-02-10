<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this->load->model("category_model","obj_category");
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
            //set para home
            $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.price,
                                    catalog.description,
                                    catalog.img,
                                    catalog.active,
                                    catalog.date",
                "where" => "catalog.active = 1 and catalog.status_value = 1",
                "order" => "catalog.catalog_id DESC");
            //set meta title
            $data['title'] = "Bienvenido";
            $this->load->view('home', $data);
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
