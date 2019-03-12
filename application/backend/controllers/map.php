<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class map extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('map_model');
		$this->load->model("email_model");

    }
	
	 public function index() {
		$data['map_data'] = $this->map_model->all_map_details(); 
		$data['list_reasons'] = $this->map_model->list_cancel_reason();
   		$data["master_title"] = "Map's";   
        $data["master_body"] = "view_map";   
        $this->load->theme('mainlayout', $data); 
    }
	 public function cancel_reasons() {
		
   		$data["master_title"] = "Add Cancel Reason's";   
        $data["master_body"] = "cancel_reasons";   
        $this->load->theme('mainlayout', $data); 
    }
		 public function add_reason() {
			$data = $this->input->post();
			 if(!empty($data))
			 {
			 	$res = $this->map_model->add_cancel_reason($data); 
			 
			 }	 
			if($res)
			{
				redirect(BASEURL."/map/list_cancel_reason");
			}	
   		
    }
	public function list_cancel_reason() {
		
		$data['list_reasons'] = $this->map_model->list_cancel_reason();
		$data["master_title"] = "Cancel Reason's";   
        $data["master_body"] = "list_cancel_reason";   
        $this->load->theme('mainlayout', $data);	
   		
    }
	public function delete_cancel_reason($id) {
		if(!empty($id)){
		$res = $this->map_model->delete_cancel_reason($id);
		}
		if($res)
			{
				redirect(BASEURL."/map/list_cancel_reason");
			}
   		
    }
	public function edit_cancel_reason($id) {
		$data = $this->input->post();
		if(!empty($data)){
   		$res = $this->map_model->update_reason_by_id($data);
		}
		if(!empty($id)){
   		$data['reasons_data'] = $this->map_model->cancel_reason_by_id($id);
		}
		if($res)
			{
				redirect(BASEURL."/map/list_cancel_reason");
			}
		
		$data["master_title"] = "Edit Reason's";   
        $data["master_body"] = "edit_cancel_reason";   
        $this->load->theme('mainlayout', $data);
    	
	}	   
	
	 public function enable_map($status,$id) {
		$map_data = $this->map_model->user_map_id($id);
		$data['user_id'] = $map_data['user_id'];
		$all_users = $this->map_model->get_all_users($data);
	
		if(!empty($status) && !empty($id))
		{
		$res = $this->map_model->change_map_status($status,$id);
		}
		if($res)
		{
			$emailarray['message'] = 'Null';
			$emailarray['subject'] = 'Your Map Has Been Enabled By Admin';
			$emailarray['to'] = $all_users['email'];
			$this->email_model->sendIndividualEmail($emailarray);
			$this->session->set_flashdata('success_msg','Map enable successfully');	
			redirect(BASEURL."/map");
		} 

    }
	public function disable_map() {
		$data = $this->input->post();
		$status= 0;
		$id = $data['id'];
		$map_data = $this->map_model->user_map_id($id);
		$data['user_id'] = $map_data['user_id'];
		$all_users = $this->map_model->get_all_users($data);
		
		if(!empty($status) && !empty($id));
		{
		$res = $this->map_model->change_map_status($status,$id);
		}
		if($res)
		{	$emailarray['message'] = $data['reason'];
			$emailarray['subject'] = 'Your Map Has Been Disabled By Admin';
			$emailarray['to'] = $all_users['email'];

			$this->email_model->sendIndividualEmail($emailarray);
			$this->session->set_flashdata('success_msg','Map disable successfully');	
			redirect(BASEURL."/map");
		}	
			
    }
	
	
}	