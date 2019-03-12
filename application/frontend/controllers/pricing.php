<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pricing extends CI_Controller {

    public function index() {		
		$data["master_title"] = "Pricing";
        $data["master_body"] = "pricing";
    	$this->load->layout('indexlayout', $data);
		
    }   
}