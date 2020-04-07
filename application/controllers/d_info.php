<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_info extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("info_model","obj_info");
        $this->load->library("export_excel");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            $params = array(
                        "select" =>"info_id,
                                    name,
                                    last_name,
                                    email,
                                    phone,
                                    course,
                                    date,
                                    status_value"
            );
            //GET DATA COMMENTS
            $obj_info = $this->obj_info->search($params);
            /// VISTA
            $this->tmp_mastercms->set("obj_info",$obj_info);
            $this->tmp_mastercms->render("dashboard/info/info_list");
    }
    
    public function contestado(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
              $info_id = $this->input->post("info_id");
                if(isset($info_id) != ""){
                    $data = array(
                        'status_value' => 0,
                    ); 
                    $this->obj_info->update($info_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function no_contestado(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $info_id = $this->input->post("info_id");
                if(isset($info_id) != ""){
                    $data = array(
                        'status_value' => 1,
                    ); 
                    $this->obj_info->update($info_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function export(){  
            //GET SESSION
        
            $this->get_session();
            //send data
            $params = array(
                        "select" =>"info_id,
                                    name,
                                    last_name,
                                    email,
                                    phone,
                                    course,
                                    date",
                          "order" => "info_id DESC"          
            );
            //GET DATA COMMENTS
            $obj_info = $this->obj_info->search($params);
            //export excel
            $this->export_excel->to_excel($obj_info, "REPORTE DE SOLICITUD DE INFORMACIÓN");
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE"){               
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