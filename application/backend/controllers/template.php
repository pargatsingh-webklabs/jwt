<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template extends CI_Controller {

    public function __construct() {
        parent::__construct();
		 $this->load->model('template_model');
    }

    public function index() {
        $this->load->model('template_model');
        $data["template_data"]=$this->template_model->get_template_list();	
        $data["master_title"] = "Manage Templates";
        $data["master_body"] = "template"; 
        $this->load->theme('mainlayout', $data);     		
    } 
	
	public function delete($id){
			$status = $this->template_model->delete($id);
			//debug($status);die;
        if($status=="true"){
		   $this->session->set_flashdata('success_msg','category deleted successfully');
		   /* $result['result'] = 'success';
		      echo json_encode($result);
		      die;*/
		}else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
        redirect(BASEURL.'/template'); 
	
	}
	public function add(){
		$templatedata=$this->input->post();
		if(!empty($templatedata)){
			//debug($templatedata);die;
			$data=$this->template_model->add($templatedata);
			 redirect(BASEURL.'/template');
		}
		$data["master_title"] = "Add New Templates";
        $data["master_body"] = "add"; 
        $this->load->theme('mainlayout', $data);     
	}
	public function edit_template($id) {
        $this->load->model('template_model');
        $data["template_data"]=$this->template_model->get_template($id);
		
        $updatetemplate_data = $this->input->post();
		if(!empty($updatetemplate_data)){
            // $updatetemplate_data['description'] = str_replace(array("<br/>"),"",$updatetemplate_data['description']);
            $response = $this->template_model->update_template_data($updatetemplate_data,$id);
            if(!empty($response)){
				$result['result'] = 'success';
				          redirect(BASEURL.'/template'); 			
				}else{
				   $result['result'] = 'error';
				   echo json_encode($result);
				   die;				
				}
		   }
        $data["master_title"] = "Edit Template";
        $data["master_body"] = "edit_template"; 
        $this->load->theme('mainlayout', $data);     		
    }
     public function subscription_template(){
        $this->load->model('template_model');
        $data["template_data"]=$this->template_model->get_subscription_template_list();	
        $data["master_title"] = "Send subscription email to subscriber";   // Please enter the title of page......
        $data["master_body"] = "subscription_template";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme     		
    }
    public function edit_subscription_template($id) {
        $this->load->model('template_model');
        $data["template_data"]=$this->template_model->get_subscription_template($id);
        $updatetemplate_data = $this->input->post();
		if(!empty($updatetemplate_data)){
            $response = $this->template_model->update_subscription_template($updatetemplate_data,$id);
            if(!empty($response)){
				$result['result'] = 'success';
				   echo json_encode($result);
				   die;				
				}else{
				   $result['result'] = 'error';
				   echo json_encode($result);
				   die;				
				}
		   }
        $data["master_title"] = "Edit subscriptio Template";
        $data["master_body"] = "edit_subscription_template"; 
        $this->load->theme('mainlayout', $data);     		
    }
	 public function test() {
       $data= $this->load->model('template_model');
       
        $data["master_title"] = "Edit subscriptio Template";
        $data["master_body"] = "test"; 
        $this->load->theme('mainlayout', $data);     		
    }
}
