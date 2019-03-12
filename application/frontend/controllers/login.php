<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
      //  only_without_session_page();
	$this->load->model('admin_model');      
	
    }

    //~ public function index() {
		//~ $seesion_id = $this->session->all_userdata();
		//~ if($seesion_id['id']){
			//~ redirect(BASEURL); 
		//~ }else{
			//~ $Username = $_REQUEST['Username'];
			//~ $Password = $_REQUEST['Password'];
			//~ $data["master_title"] = "Login";
			//~ $data["master_body"] = "login";
			//~ $this->load->layout('login', $data);
		//~ }
    //~ }
    public function index() {
		$seesion_id = $this->session->all_userdata();
		if($seesion_id['id']){
			redirect(BASEURL); 
		}else{
			$data["master_title"] = "Login";
			$data["master_body"] = "login";
			$this->load->layout('mainlayout', $data);
		}
    }
    
    public function check_login() {
        $get_users = $this->admin_model->verify_admin($_REQUEST);
        if(!empty($get_users)){
			$id = $get_users['id'];
			$this->load->library('session');
			$this->session->set_userdata(array('id'=>$id));
		}
    }
    
    public function unset_session_data() { 
         //loading session library
         $this->load->library('session');
         //removing session data 
         $this->session->unset_userdata('id'); 
         //~ $this->load->view(''); 
		 $data["master_title"] = "Login";
		 $data["master_body"] = "login";
         $this->load->layout('login', $data);
    } 
}
