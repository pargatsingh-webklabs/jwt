<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home_video extends CI_Controller {

    public function __construct() {
        parent::__construct();
		 //$this->load->model('video_model');
	  
    }
	 public function index(){
		  $this->load->model('video_model'); 
		$packagedata=$this->input->post();
		if(!empty($packagedata)){
			$this->video_model->add($packagedata);
			
			redirect(BASEURL); 
		}
		
      // $data['video']=	$this->video_model->fetch();
        $data["master_title"] = "Manage Video";
        $data["master_body"] = "index";   

	    $this->load->theme('mainlayout', $data);  
    }
}