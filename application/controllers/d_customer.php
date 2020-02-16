<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_customer extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("paises_model","obj_paises");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"customer.customer_id,
                                    customer.name,
                                    customer.phone,
                                    customer.email,
                                    customer.date,
                                    paises.nombre as pais,
                                    customer.active",
                        "join" => array('paises, paises.id = customer.country'),
                        "where" => "paises.id_idioma = 7"
               
               );
           //GET DATA FROM CUSTOMER
           $obj_customer= $this->obj_customer->search($params);
            /// VISTA
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->render("dashboard/customer/customer_list");
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $customer_id = $this->input->post("customer_id");
        $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'country' => $this->input->post('pais'),
                'date' => $this->input->post("date"),  
                'active' => $this->input->post('active'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_customer->update($customer_id, $data);
        redirect(site_url()."dashboard/clientes");
    }
    
    public function load($obj_customer=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        if ($obj_customer != ""){
            /// PARAMETROS PARA EL SELECT 
            $where = "customer.customer_id = $obj_customer";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_customer  = $this->obj_customer->get_search_row($params); 
            
            //RENDER
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
          }
          
          //SELECT PAISES
            $params = array("select" => "",
                            "where" => "id_idioma = 7");
            $obj_paises  = $this->obj_paises->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_paises",$obj_paises);
            $this->tmp_mastercms->render("dashboard/customer/customer_form");    
    }
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             //OBETENER customer_id
             $ccustomer_id = $this->input->post("customer_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($ccustomer_id != ""){
                $this->obj_customer->delete($ccustomer_id);
            }
            $data['status'] = true;
            echo json_encode($data);
        }       
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