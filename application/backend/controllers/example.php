<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class example extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('example_model');		
    }

    public function index(){
		 $data['getexamples']=$this->example_model->getall();
        $data["master_title"] = "Manage Home Features";
        $data["master_body"] = "index";   
	    $this->load->theme('mainlayout', $data); 
    }

	 public function add(){
		$value = $this->input->post();
		 if(!empty($value))
		 {
			//debug($value);die;
			 $data=$this->example_model->add($value);
			 redirect(BASEURL.'/example');
		 }
        $data["master_title"] = "Manage Example Video";
        $data["master_body"] = "add";   
	    $this->load->theme('mainlayout', $data); 
    }
			
	public function edit($id){
		$value = $this->input->post();
		 if(!empty($value))
		 {
			$this->example_model->update($value);
		 redirect(BASEURL.'/example');
		 }
		$data["getexample"]=$this->example_model->getexample($id);
		 $data["master_title"] = "Manage Example Video";
        $data["master_body"] = "edit";   
	    $this->load->theme('mainlayout', $data); 
    }
		
	public function delete($id=null){	
	        $this->input->get('id');	
      	$status = $this->example_model->delete($id);
			//debug($status);die;
        if($status=="true"){
		   $this->session->set_flashdata('success_msg','category deleted successfully');
		   $result['result'] = 'success';
		   // echo json_encode($result);
			redirect(BASEURL.'/example');
		     // die;
		}
		else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
			 
	}	
}