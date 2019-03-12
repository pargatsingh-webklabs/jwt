<?php

/*
 * Settings.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle Admin profile related information
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
     }

   
    public function index() {
        $data["master_title"] = "Setting panel";   // Please enter the title of page......
        $data["master_body"] = "index";   // Please enter the body of page......
        $data['userdata'] = $this->session->userdata('userdata');
        $this->load->theme('mainlayout', $data);  // Loading theme		
    }
   
    public function listsettings() {
		$getAllSettings = $this->settings_model->getAllSettings();
		echo json_encode($getAllSettings);
		die;
   }
    public function save_settings() {
        $postdata = $this->input->post();
        if (isset($postdata["key"]) && !empty($postdata["key"])) {
			$this->db->empty_table('config');
			foreach($postdata["key"] as $key=>$setting_name):
				$saveSetting =array();
				$saveSetting["key"] = $setting_name;
				$saveSetting["value"] = isset($postdata["value"][$key])?$postdata["value"][$key]:"";
				//~ $saveSetting["api"] = $setting_name;
				$this->db->insert("config",$saveSetting);
			endforeach;
		}else{
			$this->db->empty_table('config');
		}
      redirect(BASEURL.'/settings');	
    }
    public function profile() {
        $postdata = $this->input->post();
        if (isset($postdata) && !empty($postdata)) {
            $usersessiondata = $this->session->userdata('userdata');
            $userdata['first_name'] = $this->input->post('first_name');
            $userdata['last_name'] = $this->input->post('last_name');
            $userdata['email'] = $this->input->post('email');
            $userdata['id'] = $usersessiondata['id'];
            $this->db->where('id', $usersessiondata['id']);
            if ($this->db->update('admins', $userdata)) {
                $this->session->set_userdata('userdata', $userdata);
                $data['update'] = 'successful';
            }
        }
        $data["master_title"] = "Profile panel";   // Please enter the title of page......
        $data["master_body"] = "profile";   // Please enter the body of page......
        $data['userdata'] = $this->session->userdata('userdata');
        $this->load->theme('mainlayout', $data);  // Loading theme		
    }

    /*
     * Settings.php
     * Function :Change Password
     * Created by : Prashant Soam
     * Created on: 9 Feb,2015
     * Purpose: Function server the change password functionality for admin
     * */

    public function changepassword() {
        $postdata = $this->input->post();
        if (isset($postdata) && !empty($postdata)) {
            $usersessiondata = $this->session->userdata('userdata');
            $password = $this->db->select('*')->from('admins')->where(array('id' => $usersessiondata['id']))->get()->result();
            $password = $password[0]->password;
            if ($password == md5($this->input->post('old_password'))) {
                $userdata['password'] = md5($this->input->post('new_password'));
                $userdata['id'] = $usersessiondata['id'];
                $this->db->where('id', $usersessiondata['id']);
                if ($this->db->update('admins', $userdata)) {
                    $data['update'] = 'successful';
                }
            } else {
                $data['update'] = 'wrong_old_pass';
            }
        }
        $data["master_title"] = "Change password";   // Please enter the title of page......
        $data["master_body"] = "changepassword";   // Please enter the body of page......
        $data['userdata'] = $this->session->userdata('userdata');
        $this->load->theme('mainlayout', $data);  // Loading theme 
    }

}
