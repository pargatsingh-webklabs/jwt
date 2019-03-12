<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class errors extends CI_Controller {

    public function __construct() {
        parent::__construct();
		get_plan();
    }

    public function index() {
        $data["master_title"] = "Oops something not found";
        $data["master_body"] = "404";
        $this->load->layout('error', $data);
    }
}
