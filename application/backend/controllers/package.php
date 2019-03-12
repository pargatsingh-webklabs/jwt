<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class package extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('package_model');		
    }

    public function index() {
        $this->list_pack();  	
    }
	public function list_pack(){
		$this->load->model('package_model');
		$data["packdata"]=$this->package_model->getPackages();
	    $data["master_title"] = "Manage Package";
        $data["master_body"] = "list";   
	    $this->load->theme('mainlayout', $data);  	
	}
    public function add() {
		$packagedata=$this->input->post();
		if(!empty($packagedata)){
			$this->package_model->add_new_package($packagedata);
			$last=$this->db->insert_id();
			$packagedata['package_id'] = $last;
			$this->package_model->add_package_features($packagedata);
			redirect(BASEURL.'/package/list_pack'); 
		
		}
        $data["master_title"] = "Add Package";
        $data["master_body"] = "add";   
	    $this->load->theme('mainlayout', $data);  	  	
    }
    public function edit($id) {
		$packagedata=$this->input->post();
		if(!empty($packagedata)){
			$response = $this->package_model->update_packages($packagedata);
            if($response){
			  redirect(BASEURL.'/package');
			}
		}		
	    $data["packdata"]=$this->package_model->edit_package($id);
		//debug($data["packdata"]);die;
        $data["master_title"] = "Add Package";
        $data["master_body"] = "edit";   
	    $this->load->theme('mainlayout', $data);  	  	
    }	
	public function delete_package($id=null){	
			
      	$status = $this->package_model->delete_package($id);
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
        redirect(BASEURL.'/package'); 
	}
	public function delete_feature($id=null){	
		$package_id = $this->input->get('package_id');	
      	$status = $this->package_model->delete_feature($id);
			//debug($status);die;
        if($status=="true"){
		   $this->session->set_flashdata('success_msg','category deleted successfully');
		   $result['result'] = 'success';
		   // echo json_encode($result);
			redirect(BASEURL.'/package/edit/'.$package_id);
		     // die;
		}else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
			 
	}
}
