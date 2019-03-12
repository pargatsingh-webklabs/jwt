<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home_banners extends CI_Controller {

    public function __construct() {
        parent::__construct();
	$this->load->model('home_banners_model');
    }

    public function index() {
        $this->load->model('home_banners_model');
        $data["home_bannersdata"]=$this->home_banners_model->get_all_home_banners();
        $data["master_title"] = "Manage Home Banners";
        $data["master_body"] = "index";   
	$this->load->theme('mainlayout', $data); 
        die;    	
    }
	public function add($id=null){	
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
							$this->home_banners_model->add($userinfo);
							redirect(BASEURL.'/home_banners/');
				
	}
        $data["home_bannersdata"]=$this->home_banners_model->home_bannersDetails($id);		    
        $data["master_title"] = "Edit Home Banners";   // Please enter the title of page......
        $data["master_body"] = "edit_home_banners";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme 
        die;        
	}
public function delete($id=null){	
		$status = $this->home_banners_model->delete($id);
			//debug($status);die;
        if($status=="true"){
		   $this->session->set_flashdata('success_msg','category deleted successfully');
		   $result['result'] = 'success';
		   // echo json_encode($result);
			redirect(BASEURL.'/home_banners/');
		     // die;
		}else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
			 
	}
	
}
