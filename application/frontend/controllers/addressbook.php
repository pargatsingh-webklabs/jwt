<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class addressbook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library("session");
		$this->load->model('addressbook_model');
        check_session_and_exit();
    }
	public function deleteAddress($id=false){
		if(!empty($id)){
			$res = $this->addressbook_model->deleteAddress($id);
			if($res)
				$this->session->set_flashdata('success', 'Address deleted Successfully');
			else
				$this->session->set_flashdata('error', 'Error while deleting address.');
		}
		redirect(BASEURL.'/addressbook');
	}
    //~ public function index() {
		//~ $data["listAddress"] = $this->addressbook_model->listAddress();
		//~ $data["master_title"] = "Home";
        //~ $data["master_body"] = "index";
        //~ $this->load->layout('indexlayout', $data);
		
    //~ }
    public function index() {
		$userdata=$this->session->userdata("userdata");
		$user_id = $userdata["id"];
		$data["listAddress"] = $this->addressbook_model->listAddress($user_id);
		//~ $data["default"] = $this->addressbook_model->defaultAddress($user_id);
		$data["master_title"] = "Home";
        $data["master_body"] = "list";
        $this->load->layout('mainlayout', $data);
		
    }
    
    public function address_book_user_details($id=false) {
		$data["addressbook"] = $this->addressbook_model->getAddress($id);
		$data["master_title"] = "User Details";
        $data["master_body"] = "address_book_user_details";
        $this->load->layout('mainlayout', $data);
		
    }
    public function getaddress($id=false) {
		$id = $this->input->post('id');
		$data["addressbook"] = $this->addressbook_model->getAddress($id);
		if(!empty($data["addressbook"])){
			echo json_encode($data["addressbook"]);
		}else{
			echo json_encode(array("result"=>false));
		}
		die;
		
    }
    
     public function create_new($id=false) {
		$data["addressbook"] = $this->addressbook_model->getAddress($id);
		$data["master_title"] = "Create New";
        $data["master_body"] = "create";
        $this->load->layout('mainlayout', $data);
		
    }

    function save(){
		$postData = $this->input->post();
		$id = $this->input->post('id');
		if(!empty($postData)){
			$userdata=$this->session->userdata("userdata");
			$postData["user_id"] = $userdata["id"];
			$res = $this->addressbook_model->saveaddress($postData);
			if($res){
				$id = $res;
				$this->session->set_flashdata('success', 'Contact Created Successfully.');
			}else{
				$this->session->set_flashdata('error', 'Error while updating address.');
			}
		}
		if($id)
		redirect(BASEURL.'/addressbook/create_new/'.$id);
		redirect(BASEURL.'/addressbook');
	}
	
    public function add_ticket() {
		$this->load->model('home_model');		
		if($_FILES['BugFile']['name']){
			$extension = pathinfo($_FILES['BugFile']['name'], PATHINFO_EXTENSION);
			$filename = explode('.'.$extension,$_FILES['BugFile']['name']);
			$_REQUEST['BugFile'] = $filename[0].'_'.$_REQUEST['hospital'].'_'.time().'.'.$extension;
		}
		unset($_REQUEST['home/add_ticket']);
		$_REQUEST['created'] = time();	
		$data = $this->home_model->inser_ticket($_REQUEST);
		 if(count($_FILES['file']['name']) > 0){
			for($i=0; $i<count($_FILES['file']['name']); $i++) {
				$tmpFilePath = $_FILES['file']['tmp_name'][$i];
				if($tmpFilePath != ""){
					$shortname = $_FILES['file']['name'][$i];
					$filePath = DIR_FS_SITE."attachments/".time().'_'.$_FILES['file']['name'][$i];
					if(move_uploaded_file($tmpFilePath, $filePath)) { 
						exec("sudo chmod 777 -R" .DIR_FS_SITE.'attachments');
						$imagename = time().'_'.$shortname;
						$this->home_model->insert_ticket_images($data,$imagename);
					}
				}
			 }
		 }
		if($data){
			$users = $this->config->item('users');
			$users_email = $this->config->item('users_email');
			$notifydata['email'] = $users_email[1];
			$notifydata['title'] = 'Secure Ticket #'.$data.' has been Added';
			$notifydata['content'] = $users[1].' has added New Ticket';
			sendnotification(NOTIFICATION_URL,$notifydata);
			$this->session->set_flashdata('success', 'Ticket added Successfully');
			redirect(BASEURL.'/home/list_tickets');
		}else{
			$this->session->set_flashdata('error', 'Error while adding ticket');
			redirect(BASEURL.'/home/list_tickets');
		}
		
		//~ $this->load->layout('mainlayout');
			//~ $_REQUEST['BugFile'] = $_FILES['BugFile'];
		//~ if($_REQUEST['ticket']==2){
			//~ $ch = curl_init();
			//~ curl_setopt($ch, CURLOPT_URL,"http://localhost/pfaapp/add_tickets.php");
			//~ curl_setopt($ch, CURLOPT_POST, 1);
			//~ curl_setopt($ch, CURLOPT_POSTFIELDS, 
			//~ http_build_query($_REQUEST));
			//~ curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			//~ $server_output = curl_exec ($ch);
			//~ $status = curl_getinfo($ch);
			//~ curl_close ($ch);
			
			//~ $return_call = json_decode($server_output);
			//~ if($return_call->data==0){
				//~ $this->session->set_flashdata('message', '<div class="alert alert-success success_result"><span><b> Success - </b> Successfully added HIPPA Ticket</span></div>');
				//~ redirect(BASEURL);
			//~ }else{
				//~ $this->session->set_flashdata('message', '<div class="alert alert-danger"><span><b> Error - </b> You are not connected to VPN, Please connect it with.</span></div>');
				//~ redirect(BASEURL);
			//~ }
		//~ }else{
			//~ $this->session->set_flashdata('message', '<div class="alert alert-success success_result"><span><b> Success - </b> Successfully added Normal Ticket</span></div>');
			//~ redirect(BASEURL);
		//~ }	
			
    }
    
    public function get_tickets() {
		//~ if($_REQUEST['action']=='viewed'){
			$this->load->model('home_model');
			$data = $this->home_model->get_tickets();
			if(!empty($data)){
				$result = json_encode(array("result"=>"success","data"=>$data));
			 }else{
				$result = json_encode(array("result"=>"Empty","message"=>"There is No Data Available"));
			}
		 echo $result;
		//~ }
	}

    //~ function _remap($method)
	//~ {
		//~ $param_offset = 1;
		//~ // Default to index
		//~ if ( ! method_exists($this, $method))
		//~ {
			//~ // We need one more param
			//~ $param_offset = 1;
			//~ $method = 'list_tickets';
		//~ }
		//~ // Since all we get is $method, load up everything else in the URI
		//~ $params = array_slice($this->uri->rsegment_array(), $param_offset);
		//~ print_r($params); echo '<br>';
		//~ print_r($this.' - '.$method);die;
		//~ // Call the determined method with all params
		//~ call_user_func_array(array($this, $method), $params);
	//~ } 
	
	public function list_tickets(){
		$this->load->model('home_model');
		$data["master_title"] = "Tickets";
        $data["master_body"] = "tickets";
        $data['list_tickets'] = $this->home_model->list_tickets();
        $data['status'] = $this->home_model->get_status();
        //~ debug($data['status']);die;
		$this->load->layout('mainlayout', $data);
	}
	
	public function update_ticket_status(){
		$this->load->model('home_model');
		$data = $this->home_model->update_status();
		
	}
	
	public function edit(){
		$id = end($this->uri->segment_array());
		$this->load->model('home_model');
		$data["master_title"] = "Edit";
        $data["master_body"] = "edit";
        $data['list_tickets'] = $this->home_model->get_specific_tickets($id);
        $data['status'] = $this->home_model->get_status();
		$this->load->layout('mainlayout', $data);
		
	}
	
	public function update_ticket(){
		$id = end($this->uri->segment_array());
		unset($_REQUEST['home/update_ticket/'.$id]);
		$_REQUEST['ticket_id'] = $id;
		$_REQUEST['created'] = time();
		$this->load->model('home_model');
		$data["master_title"] = "Edit";
        $data["master_body"] = "edit";
        $status = $this->home_model->update_status($id,$_REQUEST['status']);
        if($status){
			$ticketcomment_id = $this->home_model->add_comment($_REQUEST);
		}
		if(count($_FILES['file']['name']) > 0){
			$tmpFilePath = $_FILES['file']['tmp_name'];
			$shortname = $_FILES['file']['name'];
		    $filePath = DIR_FS_SITE."attachments/".time().'_'.$_FILES['file']['name'];
			if(move_uploaded_file($tmpFilePath, $filePath)) { 
				exec("sudo chmod 777 -R" .DIR_FS_SITE.'attachments');
				 $imagename = time().'_'.$shortname;
				 $this->home_model->add_comment_image($ticketcomment_id,$imagename);
			}
		}
		if($ticketcomment_id){
			$users = $this->config->item('users');
			$users_email = $this->config->item('users_email');
			$notifydata['email'] = $users_email[1];
			$notifydata['title'] = 'Secure Ticket #'.$id.' has been updated';
			$notifydata['content'] = $users[1].' has added comment on it ';
			sendnotification(NOTIFICATION_URL,$notifydata);
			redirect(BASEURL.'/home/list_tickets');
		}
		$this->load->layout('mainlayout', $data);
		
	}
	
	public function delete(){
		$id = end($this->uri->segment_array());
		$this->load->model('home_model');
		$result = $this->home_model->delete_ticket($id);
		if($result){
			redirect(BASEURL.'/home/list_tickets');
		}
	}
	
    


}
