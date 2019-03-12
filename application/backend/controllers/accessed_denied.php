<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class accessed_denied extends CI_Controller {

    public function __construct() {
        parent::__construct();
		 $this->load->model('accessdenied_model');
    }
	  public function index() {
		             
        $data["master_title"] = "Unauthorised Grant";
        $data["master_body"] = "index";   

	    $this->load->theme('login', $data);    	
    }
}