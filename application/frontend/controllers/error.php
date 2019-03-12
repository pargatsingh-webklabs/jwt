<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class error extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data["master_title"] = "Oops something not found";
        $data["master_body"] = "404";
        $this->load->layout('error', $data);
    }
}
