<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_preguntas extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("video_message_model","obj_video_message");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            $params = array(
                        "select" =>"video_message.video_message_id,
                                    video_message.date,
                                    video_message.message,
                                    video_message.respose,
                                    video_message.active,
                                    customer.name,
                                    videos.name as video_name,
                                    courses.name as course_name",
                "join" => array('customer, video_message.customer_id = customer.customer_id',
                                'videos, video_message.video_id = videos.video_id',
                                'courses, videos.course_id = courses.course_id',),
            );
            //GET DATA video_message
            $obj_video_message = $this->obj_video_message->search($params);
            /// VISTA
            $this->tmp_mastercms->set("obj_video_message",$obj_video_message);
            $this->tmp_mastercms->render("dashboard/preguntas/preguntas_list");
    }
    
    public function save(){
      if($this->input->is_ajax_request()){  
                //SELECT CUSTOMER_ID
                $video_message_id = $this->input->post("video_message_id");
                $respose = $this->input->post("respose");
                
                    //CREATE INVOICE
                    $data_invoice = array(
                        
                        'respose' => $respose,
                        'active' => 0,
                    );
                    $this->obj_video_message->update($video_message_id, $data_invoice);
                    $data['status'] = "true";
                }
                echo json_encode($data); 
                exit();
    }
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             //OBETENER MARCA_ID
             $video_message_id = $this->input->post("video_message_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($video_message_id != ""){
                $this->obj_video_message->delete($video_message_id);
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