<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('profile_model');
    }
	
    public function index() {
		$userdata = $this->session->userdata("userdata");
		$id = $userdata['id'];
		$data['admin_info'] = $this->profile_model->get_admin_info($id);

		$data["master_title"] = "Manage Your Profile";   // Please enter the title of page......
		$data["master_body"] = "profile";   // Please enter the body of page......
		$this->load->theme('mainlayout', $data);  // Loading theme       		
    }
	    public function update_profile() {
			$userdata = $this->session->userdata("userdata");
			$this->load->model('profile_model');
	   
			$update_data = $this->input->post();	

			if(!empty($update_data)){

			$update_data['id'] = $userdata['id'];
			$this->profile_model->update_admin($update_data);
			$result['result'] = 'success';
			$data['admin_info'] = $this->profile_model->get_admin_info($id);
			redirect(BASEURL); 
			}
    }

	public function update_profile_image(){
	    $this->load->model("profile_model");
		$userdata=$this->session->userdata("userdata");       
	    $config['upload_path'] ='./assets/profile_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $newFileName = $_FILES['userfile']['name'];
        $fileExt = array_pop(explode(".", $newFileName));		
        $config['file_name'] =  md5(time()).".".$fileExt;
  	  //$this->load->library('upload', $config);
       $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
            die;
        } else{
            $data = array('upload_data' => $this->upload->data());
            $userinfo = array();
            $userinfo['image'] = BASEURL.substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];
		    $userinfo['id'] = $userdata['id'];
            $userinfo['database_image'] = substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];			
            $this->profile_model->upload_admin_image($userinfo);
            echo json_encode($userinfo);
            die;	
	       }

     }










	

}
