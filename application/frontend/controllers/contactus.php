<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class contactus extends CI_Controller {
	
	    public function __construct() {
			parent::__construct();
			 $this->load->model('user_model');
			 $this->load->library('email');
		}

    public function index() {		
		$data["master_title"] = "Contact Us";
        $data["master_body"] = "contactus";
    	$this->load->layout('indexlayout', $data);
		
    }   
    
    public function insert_contactus() {
		if(!is_dir(FCPATH.'uploads/contactusFile')){
			mkdir(FCPATH.'uploads/contactusFile');
			chmod(FCPATH.'uploads/contactusFile',0755);
		}
		if(isset($_POST['name'])){
			/************** Upload File *****************/
			
			if(!empty($_FILES["attachment"]["name"]) && $_FILES["attachment"]["size"]>0 && $_FILES["attachment"]["error"]==0){
				//~ debug($_FILES);die;
				$fname = str_replace(' ', '-',$_FILES["attachment"]["name"]);
				$fname = preg_replace('/[^A-Za-z0-9\-.]/', '',$fname);
				$ext = pathinfo($fname, PATHINFO_EXTENSION);
				$fname_arr = explode(".".$ext,$fname);
				$fname = $fname_arr[0]."_".time().".".$ext;
				if(!move_uploaded_file($_FILES["attachment"]["tmp_name"],FCPATH.'uploads/contactusFile/'.$fname)){
					$this->session->set_flashdata('error',"Error on uploading File");
					redirect(BASEURL.'/contactus');
				}
				$emailarray["attachment"] = FCPATH.'uploads/contactusFile/'.$fname;
			}
			//~ debug($_FILES);die;
			/************** Upload File *****************/
		$inquiry = $_REQUEST['inquiry'];
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$comments = $_REQUEST['comments'];
		$this->load->model("template_model");
		$email_data  = $this->template_model->get_template('16');
		$subject = $email_data['subject'];
		
		$subject = str_replace("#inquiry#", $inquiry , $subject);
		$message = $email_data['description'];
		$message = str_replace("#fullname#", $name, $message);
		$message = str_replace("#email#", $email , $message);
		$message = str_replace("#inquiry#", $inquiry , $message);
		$message = str_replace("#comments#", $comments , $message);
		$message = str_replace(array('\n','<br>'),'',$message);
		
		$emailarray['message'] = $message;
		$emailarray['subject'] = $subject; 
		$emailarray['reply_to'] = $email;
		$emailarray['reply_name'] = $name;
		$emailarray['to'] = $this->config->item('adminemail').','.$email;
		//~ $emailarray['to'] = 'pritpal@webklabs.com';
		$this->load->model("email_model");
		//~ debug($emailarray);die; 
		$mail_output = $this->email_model->sendIndividualEmail($emailarray);
		//~ ob_clean();
		$data = array("success"=>true);
		if($inquiry=='General Inquiry'){
			$data["message"] = getConfigSettingVariable('GENERAL_ENQUIRY');
		}else if($inquiry=='Technical Support'){
			$data["message"] = getConfigSettingVariable('TECHNICAL_ENQUIRY');
		}
		
		$this->session->set_flashdata('success', $data["message"]);
			
	
	  }else{
			$this->session->set_flashdata('error',"fields cant be empty.");
		  }
	  redirect(BASEURL.'/contactus');
	  //~ echo $msg = json_encode($data);die;
		//~ $data["master_title"] = "Contact Us";
        //~ $data["master_body"] = "contactus";
    	//~ $this->load->layout('indexlayout', $data);
    }   
    
    
    
    
    
}
