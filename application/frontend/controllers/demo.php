<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
      //  only_without_session_page();
	
    }

    public function index() {
  
        $data["master_title"] = "Home";
        $data["master_body"] = "home";
        $this->load->layout('mainlayout', $data);
		
    }
    
    public function gallery() {
        $data["master_title"] = "Gallery";
        $data["master_body"] = "gallery";
        $this->load->layout('mainlayout', $data);
		
    }


}
