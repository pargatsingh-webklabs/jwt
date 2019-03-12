<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class homefeatures extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('homefeatures_model');		
    }

    public function index() {
		$data["features"]=$this->homefeatures_model->getallfeatures();
		//debug($data["features"]);die;
        $data["master_title"] = "Manage Home Features";
        $data["master_body"] = "index";   
	    $this->load->theme('mainlayout', $data); 
    }
	public function edit($id) {
      $value =  $this->input->post();
		if(!empty($value))
		{ 
			//debug($value['image']);die;
			if(!empty($_FILES['image'])){
				//debug($_FILES['image']);die
			     		$_FILES['userfile']['name']= $_FILES['image']['name'];
						$_FILES['userfile']['type']= $_FILES['image']['type'];
						$_FILES['userfile']['tmp_name']= $_FILES['image']['tmp_name'];
						$_FILES['userfile']['error']= $_FILES['image']['error'];
						$_FILES['userfile']['size']= $_FILES['image']['size'];
						$config['upload_path'] ='../assets/home_features/';
						$config['allowed_types'] = 'gif|jpg|png';
						$newFileName =  $_FILES['userfile']['name'];
						$fileExt = array_pop(explode(".", $newFileName));  
						$config['file_name'] =  md5(time()).".".$fileExt;
						$this->upload->initialize($config);
						if (!$this->upload->do_upload()) {
							$error = array('error' => $this->upload->display_errors());
							echo json_encode($error);
							die;
						} else{
							$data = array('upload_data' => $this->upload->data());
						   // $config['upload_path'] = substr($config['upload_path']);
							$userinfo = array();
							$userinfo['image'] = substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];   //debug($userinfo['image']);die;
										}
				}	
							$userinfo['id'] = $id;   
							$userinfo['heading'] = $value['heading'];
							$userinfo['description'] = $value['description'];   
							$this->homefeatures_model->update_features($userinfo);
							redirect(BASEURL.'/homefeatures/');
				
	}
		$data["getfeatures"]=$this->homefeatures_model->getfeatures($id);
		//debug($data["getfeatures"]);die
	    $data["master_title"] = "Manage Home Features";
        $data["master_body"] = "edit";   
	    $this->load->theme('mainlayout', $data); 
    }	
			
		
		
}