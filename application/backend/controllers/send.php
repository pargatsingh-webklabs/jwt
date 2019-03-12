<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class send extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('send_model');
    }
	
    public function index(){
		$data['getall']=$this->send_model->get_Users();
		$data['getall_pack']=$this->send_model->get_package();
		$plan = $this->input->get("id");
		if(!empty($plan))
		{
			$pack_data = $this->send_model->get_user_id($plan);	
		} 
		foreach($pack_data as $key=>$val){
			$user_ids[$i++]=$val['user_id'];
		}
		$data['user_ids']=$user_ids;
		$data['selected_plan']=$plan;
		$data["master_title"] = "Send Email to Users";  
        $data["master_body"] = "index";
        $this->load->theme('mainlayout', $data);
	}
	 public function send_email(){
		 $data = $this->input->post();
		 $to = $data['to'];
		// debug($to);die;
		if(!empty($data))
		{
			
                $subject = $data['subject'];
                $message = $data['message'];
				$emailarray['message'] = $message;
                $emailarray['subject'] = $subject;
				$email_to =implode(',',$to);
                $emailarray['to'] = $email_to;
				
				//debug($emailarray);die;
                $this->load->model("email_model");
                $this->email_model->sendIndividualEmail($emailarray);
				redirect(BASEURL."/send");
		
		}
		 
	 }

}