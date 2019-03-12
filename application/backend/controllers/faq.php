<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class faq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('faq_model');		
    }

    public function index() {
        $this->list_faq();  	
    }
	public function list_faq(){
		$data["faqdata"]=$this->faq_model->getfaq();
	    $data["master_title"] = "Manage FAQ's";
        $data["master_body"] = "list";   
	    $this->load->theme('mainlayout', $data);  	
	}
    public function add_category(){
		//$data = $this->input->post();
     //  $res = $this->faq_model->add_new_category($data);
		$faqdata=$this->input->post();
	
		if(!empty($faqdata)){
		//	debug($faqdata);die;
		$this->faq_model->add_new_category($faqdata);
	    redirect(BASEURL.'/faq/get_category');			
		}
	    $data["master_title"] = "Add FAQ Category";
        $data["master_body"] = "add_category";   
	    $this->load->theme('mainlayout', $data);  	
	}
	public function get_category()
	{ 
	//$this->load->model('faq_model');
	$data["categorydata"]=$this->faq_model->get_category();
	//	debug($data["categorydata"]);die;
	$data['master_title']="Manage FAQ Category";
	$data['master_body']="list_category";
    $this->load->theme('mainlayout', $data); 
	}
	 public function edit_category($id) {
		$categorydata=$this->input->post();
		if(!empty($categorydata)){
			$response = $this->faq_model->update_category($categorydata);
            if($response){
			  redirect(BASEURL.'/faq/get_category');
			}
		}		
	    $data["category"]=$this->faq_model->edit_category($id);
		//debug($data["category"]);die;
        $data["master_title"] = "Edit FAQ Category";
        $data["master_body"] = "edit_category";   
	    $this->load->theme('mainlayout', $data);  	  	
    }	
		public function delete_category($id=null){	
			
      	$status = $this->faq_model->delete_category($id);
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
        redirect(BASEURL.'/faq/get_category'); 
	}
	 public function add(){
		//$data = $this->input->post();
     //  $res = $this->faq_model->add_new_category($data);
		$faqdata=$this->input->post();
		if(!empty($faqdata)){
		$result=$this->faq_model->add($faqdata);
		}
		// deubg($result);die;
		 $data["select"]=$this->faq_model->get_category();
	    $data["master_title"] = "Add FAQ Category";
        $data["master_body"] = "add";   
	    $this->load->theme('mainlayout', $data);  	
	}
	
	public function delete_faq($id=null){	
			
      	$status = $this->faq_model->delete_faq($id);
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
        redirect(BASEURL.'/faq/list'); 
	}
	public function edit($id) {
		$faqdata=$this->input->post();
		if(!empty($faqdata)){
			//debug($faqdata);die;
			$response = $this->faq_model->update_faq($faqdata);
            if($response){
			  redirect(BASEURL.'/faq/list');
			}
		}	 $data["select"]=$this->faq_model->get_category();	
	    $data["faq"]=$this->faq_model->edit_faq($id);
		//debug($data["category"]);die;
        $data["master_title"] = "Edit FAQ Category";
        $data["master_body"] = "edit";   
	    $this->load->theme('mainlayout', $data);  	  	
    }	
}
