<?php
ob_start();
	if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	class account extends CI_Controller {
		public function __construct() {        
			parent::__construct();
			check_session_and_exit();
			//check_user();
			check_guest();
			$this->load->model('user_model');
			$this->load->model('map_model');			
		}
		public function index() {
			$this->dashboard();
		}
		public function dashboard() {
			
			
			$data['userdata']=$this->session->userdata('userdata');
			$data['user_id']=$data['userdata']['id'];
			$this->load->model('pricing_model');
			$this->load->model('payment_stripe_model');
			$data['pricing_data'] = $this->pricing_model->get_pricing_data($data);
			$pack_id = $this->payment_stripe_model->get_pack_id($data);
			$pack_id = $pack_id['package_id'];
			$data['map_no_detail'] = $this->payment_stripe_model->get_map_no($pack_id);
			$data['map_no_detail'] = $data['map_no_detail']['no_of_maps'];
			$data['map_detail_users'] = $this->payment_stripe_model->get_map_details_user($data);
	
		 	$this->load->library('pagination');
			$config=array();
			$config["base_url"] = base_url()."/account/dashboard/?";	
			$config["total_rows"] = $this->map_model->count_get_maps($data['userdata']['id']);	
			
			$config["per_page"] = 8;	
			$config['use_page_numbers'] = FALSE;
			$config['query_string_segment'] = 'offset';	
			$config['num_links'] = "5";
			$config['full_tag_open'] = '<ul class="pagination">';   
			$config['full_tag_close'] = '</ul>';	
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = ' Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';	
			$config['cur_tag_open'] = '<li class="active"><a href="">';	
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';	
			$config['num_tag_close'] = '</li>';	
			$this->pagination->initialize($config);
			$offset = $this->input->get('offset');
			$offset =!empty($offset)?$offset:0;
	
			$data["maps"]=$this->map_model->get_maps($data['userdata']['id'],$config["per_page"],$offset);
			
	         $str_links = $this->pagination->create_links(); 
			
			$data["links"] = explode('&nbsp;',$str_links);
		
			$data["master_title"] = "My Dashboard";
			$data["master_body"] = "dashboard";
			$this->load->layout('account', $data);
		}
		
		/*public function get_all_maps() {
			$data=$this->input->post();
			$data['userdata']=$this->session->userdata('userdata');
			$data["total_rows"] = $this->map_model->count_get_maps($data);	
			$data["per_page"] = !empty($data['per_page'])?$data['per_page']:10;	
			$data['offset'] =!empty($data['curr_page'])?($data['curr_page']):0;
			$data["maps"]=$this->map_model->get_maps($data);
			
			$this->load->view("account/fetch_map_data",$data);
		}*/	
		public function change_password() {
			
	    $data["master_title"] = "Change Password";
        $data["master_body"] = "change_password";
        $this->load->layout('account', $data);
	    }
		
		
		
		public function profile() {
	    $this->load->model('profile_model');
	    $this->load->model('package_model');
	    $userdata = $this->session->userdata("userdata");	
	    $data['user_profile_data'] = $this->profile_model->get_profile_data($userdata);
	    $data['user_pack_data'] = $this->package_model->get_Packags_id($userdata);
	    
		foreach($data['user_pack_data'] as $key=>$val){
			
		$data['user_pack_detail'][$key] = $this->package_model->get_Packags_data_by_id($val['package_id']);
		$data['user_pack_detail'][$key]['expired_on']=$val['expired_on'];
		}
 
		$data["master_title"] = "Your Profile";
        $data["master_body"] = "profile";
        $this->load->layout('account', $data);		
    	}
			public function edit_profile(){	
	    $this->load->model('profile_model');
	    $userdata = $this->session->userdata("userdata");	
	    $data['user_profile_data'] = $this->profile_model->get_profile_data($userdata);
				
		$survey_edit_data=$this->input->post();
		if(!empty($survey_edit_data)){
		   $survey_edit_data['user_id']=$userdata['id']; 
		   $this->user_survey_model->edit_client_survey($survey_edit_data);	
           $data['edit_result'] = 'edit_success';
		   echo json_encode($data);
           die;		   
		}else{
	    $data["master_title"] = "Edit Profile";
        $data["master_body"] = "edit_profile";
        $this->load->layout('account', $data);
		}
	}
		public function transaction(){	
		$userdata = $this->session->userdata("userdata");
		$this->load->model('payment_stripe_model');	
		if(!empty($userdata)){	
		$data['transaction_data'] = $this->payment_stripe_model->get_transaction($userdata);	
		}
		$data["master_title"] = "Transactions";
        $data["master_body"] = "transaction_details";
        $this->load->layout('account', $data);	
		
		}
		
		public function cancel_subscription(){
			
		$id = $this->input->get();
		$transaction_id	=$id['id'];
		$userdata = $this->session->userdata("userdata");
		$this->load->model('payment_stripe_model');	
		$this->load->model("template_model");	

		$sec = get_stripe_key_id($transaction_id,'secret_key');
		$secret_key = $sec['value'];
			
		$sub = get_stripe_key_id($transaction_id,'subscription_id');
		$subscription_id = $sub['value'];
			

		require_once('stripe/init.php');				
		require_once('stripe/lib/Stripe.php');	
		try	{
		\Stripe\Stripe::setApiKey($secret_key);

		$subscription = \Stripe\Subscription::retrieve($subscription_id);
			
		if ($subscription->cancel(array('at_period_end' => true))){
			$this->session->set_flashdata('success_msg','Subscription cancel successfully');
			$this->load->model("email_model");
			$email_data  = $this->template_model->get_template('4');
			$email_subject = $email_data['subject'];
			$email_message = $email_data['description'];

			$email_message = str_replace('#product#',$subscription->plan->name,$email_message);
			$email_message = str_replace('#user#',$userdata['fname'].' '.$userdata['lname'],$email_message);
			$email_message = str_replace('#email#',$userdata['email'],$email_message);
			$email_message = str_replace('#date#',date('d/m/Y'),$email_message);
			$email_message = str_replace('#amount#','$'.$subscription->plan->amount/100,$email_message);
			$email_message = str_replace('#sitename#',SITE_NAME,$email_message);
			$email_message = str_replace(array('\n','<br>'),'',$email_message);


			$emailarray['message'] = $email_message;
			$emailarray['subject'] = $email_subject;
			$emailarray['to'] = $userdata['email'];

			$this->email_model->sendIndividualEmail($emailarray);	
			
		$this->payment_stripe_model->update_transaction_status($transaction_id);
		redirect(BASEURL.'/account/transaction');
		}}
		
		catch(Exception $e) 
		{
			$data['message'] = 'There is some error to cancel subscription on stripe. please try again';
		}
			
		}	
		
		
		public function renew_subscription(){
			
		$id = $this->input->get();
		$transaction_id	=$id['id'];
		$userdata = $this->session->userdata("userdata");
		$this->load->model('payment_stripe_model');	
		$this->load->model("template_model");	

		$sec = get_stripe_key_id($transaction_id,'secret_key');
		$secret_key = $sec['value'];
			
		$sub = get_stripe_key_id($transaction_id,'subscription_id');
		$subscription_id = $sub['value'];
			

		require_once('stripe/init.php');				
		require_once('stripe/lib/Stripe.php');	
		try	{
		\Stripe\Stripe::setApiKey($secret_key);

		$subscription = \Stripe\Subscription::retrieve($subscription_id);
			
		$subscription->plan = $subscription->plan->id;
		
		if($subscription->save())
		{
			$this->session->set_flashdata('success_msg','Subscription renew successfully');

			$this->load->model("email_model");
			$email_data  = $this->template_model->get_template('5');
			$email_subject = $email_data['subject'];
			$email_message = $email_data['description'];

			$email_message = str_replace('#product#',$subscription->plan->name,$email_message);
			$email_message = str_replace('#user#',$userdata['fname'].' '.$userdata['lname'],$email_message);
			$email_message = str_replace('#email#',$userdata['email'],$email_message);
			$email_message = str_replace('#date#',date('d/m/Y'),$email_message);
			$email_message = str_replace('#amount#','$'.$subscription->plan->amount/100,$email_message);
			$email_message = str_replace('#sitename#',SITE_NAME,$email_message);
			$email_message = str_replace(array('\n','<br>'),'',$email_message);


			$emailarray['message'] = $email_message;
			$emailarray['subject'] = $email_subject;
			$emailarray['to'] = $userdata['email'];

			$this->email_model->sendIndividualEmail($emailarray);	
		
		$this->payment_stripe_model->update_renew_transaction_status($transaction_id);
		redirect(BASEURL.'/account/transaction');
		}
		}
		
		catch(Exception $e) 
		{
			$data['message'] = 'There is some error to renew subscription on stripe. please try again';
		}
			
		}	
		
		
		
		
		/*public function map(){	
		$data["master_title"] = "Map's";
        $data["master_body"] = "map";
        $this->load->layout('map_layout', $data);	
		
		}*/
		
		public function update_profile_image(){
	    $this->load->model("profile_model");
		$userdata=$this->session->userdata("userdata");      
	    $config['upload_path'] ='./assets/profile_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $newFileName = $_FILES['userfile']['name'];
        $fileExt = array_pop(explode(".", $newFileName));		
        $config['file_name'] =  md5(time()).".".$fileExt;

  	  //$this->load->library('upload', $config);
       $this->upload->initialize($config);
			
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
            die;
        } else{
            $data = array('upload_data' => $this->upload->data());
			
            $userinfo = array();
            $userinfo['image'] = BASEURL.substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];
		    $userinfo['id'] = $userdata['id'];
            $userinfo['database_image'] = substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];			
            $this->profile_model->upload_admin_image($userinfo);
            echo json_encode($userinfo);
            die;	
	       }

     }
		
		
		public function account_info() {
			$data['userdata']=$this->session->userdata('userdata');
			$data['honorifics']=$this->config->item('honorifics');
			$data['user_info'] = $this->user_model->get_user_info($data['userdata']['id']);	
			$post_user_info = $this->input->post();
			if(!empty($post_user_info)){
				$response = $this->user_model->update_user_info($post_user_info,$data['userdata']['id']);
				if($response){
					$data['result'] = 'success';
					$data['message'] = 'Account information updated successfully';
					echo json_encode($data);
					die;				
				}else{
					$data['result'] = 'error';
					$data['message'] = 'There was some error updating your account information , Please try again !';
					echo json_encode($data);
					die;				
				}	
			}
			$data["master_title"] = "Account Information";
			$data["master_body"] = "account_info";
			$this->load->layout('account', $data);
		}
	
		public function delete_map()
		{
			$data['id'] =  base64_decode($this->input->get('id'));
			$userdata = $this->session->userdata('userdata');
			$data['user_id'] = $userdata['id'];
			if(!empty($data)){
			$res = $this->map_model->delete_user_map($data);
			}	
			if($res)
			{
			$this->session->set_flashdata('success_msg','Map Delete successfully');	
			redirect(BASEURL."/account");
			}
		}

	}		
