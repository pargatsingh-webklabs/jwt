<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $this->load->model('user_model');		
		$data["total_users"] = $this->user_model->get_Users();
		$data['active_users'] = $this->user_model->get_active_users();
		$data['inactive_users'] = $this->user_model->get_inactive_users();		
        $data["master_title"] = "Dashboard";  
        $data["master_body"] = "dashboard";   
        $data['userdata'] = $this->session->userdata('userdata');
        $this->load->theme('mainlayout', $data);  	
    }
	
    public function logout() {

        $this->session->unset_userdata('userdata');
        $this->session->unset_userdata('verify_password');
        delete_cookie('user_cookie');
        redirect(BASEURL . '/login');
    }

}
