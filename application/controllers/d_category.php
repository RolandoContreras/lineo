<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_category extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("category_model","obj_category");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            $params = array(
                        "select" =>"category_id,
                                    name,
                                    slug,
                                    date,
                                    active",
            );
            //GET DATA COMMENTS
            $obj_category= $this->obj_category->search($params);
            /// VISTA
            $this->tmp_mastercms->set("obj_category",$obj_category);
            $this->tmp_mastercms->render("dashboard/categorias/category_list");
    }
    
    public function load($category_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($category_id != ""){
            /// PARAM FOR SELECT 
            $where = "category_id = $category_id";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_category  = $this->obj_category->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_category",$obj_category);
          }
         $this->tmp_mastercms->render("dashboard/categorias/category_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $category_id = $this->input->post("category_id");
        
        if($category_id != ""){
            //PARAM DATA
            $data = array(
               'name' => $this->input->post('name'),
               'slug' => convert_slug($this->input->post('name')),
               'date' => date("Y-m-d H:i:s"),
               'active' => $this->input->post('active'),
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_category->update($category_id, $data);
        }else{
            //PARAM DATA SAVE
            $data = array(
               'name' => $this->input->post('name'),
               'slug' => convert_slug($this->input->post('name')),
               'active' => $this->input->post('active'),
               'date' => date("Y-m-d H:i:s")
                );          
            //SAVE DATA IN TABLE    
            $this->obj_category->insert($data);
        }
        redirect(site_url()."dashboard/categorias");
    }
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             //OBETENER MARCA_ID
             $category_id = $this->input->post("category_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($category_id != ""){
                $this->obj_category->delete($category_id);
            }
            $data['status'] = true;
            echo json_encode($data);
        }       
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
?>