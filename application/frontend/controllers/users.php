<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class users extends CI_Controller {

    public function __construct() {
        parent::__construct();
	 $this->load->model('user_model');
	 $this->load->library('email');
}

    public function index() {
        $this->home();
    }

    public function dashboard() {
        $data["master_title"] = "Dashboard";
        $data["master_body"] = "dashboard";
		$this->load->layout('mainlayout', $data);
    }
    public function settings() {
		check_session_and_exit();
		//~ $this->load->model('user_model');
		//~ $userdata = $this->session->userdata('userdata');
		//~ $data['userInfo']=$this->user_model->get_userdata(($userdata["id"]));
		//~ debug($data);die;
		$postData = $this->input->post();
		$userdata = $this->session->userdata("userdata");
		$id =  $userdata['id'];
		if(!empty($postData)){
			$res = $this->user_model->update_user_info($postData,$id);
			if($res)
				$this->session->set_flashdata('success', 'Your Settings updated successful');
			else
				$this->session->set_flashdata('error', 'Error while updating Setting.');
			redirect(BASEURL."/users/settings");
		}
		$data["userInfo"] = $this->user_model->get_userdata($id);
		
        $data["master_title"] = "Settings";
        $data["master_body"] = "settings";
		$this->load->layout('mainlayout', $data);
    }

	public function upload_file(){
		$userdata = $this->session->userdata("userdata");
		$id =  $userdata['id'];
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$newFileName = $_FILES['userfile']['name'];
		//~ debug($_FILES);
		//~ die;
        $fileExt = array_pop(explode(".", $newFileName));		
        $config['file_name'] =  md5(time()).".".$fileExt;
		$this->load->library('upload', $config);
	 	$this->upload->initialize($config);
		if ($this->upload->do_upload() && $id)
		{
			$upload_data=$this->upload->data();
			//~ debug($upload_data);
			$postData =array();
			$postData["image"] = $upload_data['file_name'];
			$res = $this->user_model->update_user_info($postData,$id);
			$this->session->set_flashdata('success', 'Your profile photo has been updated successful');
		}else{
			$error=$this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
		}
		//~ die;
			redirect(BASEURL."/users/settings");
     }	
	 
    public function changeLobMode() {
        $data = $this->input->post();
		if(!empty($data["mode"])){
			$userdata = $this->session->userdata('userdata');
			$userdata["lob_api_mode"] = $data["mode"];
			$this->session->set_userdata('userdata', $userdata);
		}
    }
	public function loginAsUser($id=NULL){
		$this->load->model('user_model');
		$data=$this->user_model->get_userdata(($id));
		$userdata = $this->db->select("*")->from("users")->where(array("email" => $data['email'], "password" => $data["password"], "isDeleted" => "0"))->get()->row_array();
        if (count($userdata) >= 1) {
			$userdata["lob_api_mode"] = "live";
			$this->session->set_userdata('userdata', $userdata);
		}
		redirect(BASEURL."/users/login");
    }	
    public function login() {
		//~ print_r($_SESSION);die;
		only_without_session_page();
        $data = $this->input->post();
        
		if(!empty($data["loginWithAdmin"])){
			$data['email'] = base64_decode($data['email']);
			$data['password'] = base64_decode($data['password']);
			$password = $data['password'];
		}else{
			$password = md5($data['password']);	
		}
        
        if ($this->input->is_ajax_request()) {		    
            $userdata = $this->db->select("*")->from("users")->where(array("email" => $data['email'], "password" => $password, "isDeleted" => "0"))->get()->row_array();
            if(@$userdata['company_logo'])
			$userdata['company_logo'] = BASEURL.$userdata['company_logo']; 

            if(empty($userdata)){
				$userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Invalid Login Details</b>");
                echo json_encode($userdata);
                die;
			}
			else if ($userdata['status'] == 0 && !empty($userdata['password_reset_token'])) {
                $userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Check your email. This account is not verified yet.</b>");
                echo json_encode($userdata);
                die;
            } else if ($userdata['status'] == 0) {
                $userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Your account is currently disabled by Administrator</b>");
                echo json_encode($userdata);
                die;
            } else if (count($userdata) >= 1) {
				$userdata["lob_api_mode"] = "live";
                $this->session->set_userdata('userdata', $userdata);
                
                $userdata['result'] = 'success';
                echo json_encode($userdata);
                die;
            } else {
                $userdata = array("result" => "error", "message" => "<b style='color:red;font-size:15px;'>Something unusual went wrong</b>");
                echo json_encode($userdata);
                die;
            }
        }
        $data["master_title"] = "Login";
        $data["master_body"] = "login";
        //~ $this->load->layout('login', $data);
		$this->load->layout('mainlayout', $data);
    }

    public function forgetpassword() {	
		only_without_session_page();
        $data = $this->input->post();		
        if ($this->input->is_ajax_request()) {
            $userdata = $this->db->select("*")->from("users")->where(array("email" => $data['email'], "isDeleted" => "0"))->get()->row_array();
            if (count($userdata) >= 1) {
                if ($userdata['status'] == 0 && !empty($userdata['password_reset_token'])) {
                    $userdata = array("result" => "error", "message" => "Check your email. This account is not verified yet.");
                    echo json_encode($userdata);
                    die;
                } else if ($userdata['status'] == 1) {
                    $updateuserdata['password_reset_token'] = md5(time() + $userdata['id']);
                    $updateuserdata['expired_time'] = time() + (FORGET_PASSWORD_EXPIRY_HOURS * 60 * 60);
                    $this->db->where("id", $userdata['id']);
                    $this->db->update("users", $updateuserdata);
					$this->load->model("template_model");
                    $email_data  = $this->template_model->get_template('1');

                    $subject = $email_data['subject'];
                    $message = $email_data['description'];
                    $message = str_replace("#link#", BASEURL . "/users/resetpassword/" . $updateuserdata['password_reset_token'], $message);
                    $message = str_replace("#user#", $userdata['fname'] . ' ' . $userdata['lname'], $message);
                    $message = str_replace(array('\n','<br>'),'',$message);
                    $message = str_replace('#sitename#',SITE_NAME,$message);
					
					$emailarray['message'] = $message;
                    $emailarray['subject'] = $subject;
                    $emailarray['to'] = $userdata['email'];
                    $this->load->model("email_model");
                    $this->email_model->sendIndividualEmail($emailarray);
                    $userdata = array("result" => "success", "message" => "Check your email.  Click link in message from ".SITE_NAME." to reset password");
                    echo json_encode($userdata);
                    die;
                } else {
                    $userdata = array("result" => "error", "message" => "Your account is currently disabled by Administrator");
                    echo json_encode($userdata);
                    die;
                }
            } else {
                $userdata = array("result" => "error", "message" => "The email you have entered is not registered");
                echo json_encode($userdata);
                die;
            }
        }
        $data["master_title"] = "Forget password";
        $data["master_body"] = "forgetpassword";
        $this->load->layout('mainlayout', $data);

        
    }

    public function resetpassword($passwordtoken = null) {
		only_without_session_page();
        $data = $this->input->post();
         if ($this->input->is_ajax_request() && !empty($data)) {
            $updatepassword['password'] = md5($data['password']);
            $updatepassword['expired_time'] = 0;
            $passwordtoken = $data['password_reset_token'];
            $this->db->where("password_reset_token", $passwordtoken);
            if ($this->db->update("users", $updatepassword)) {
                $userdata['result'] = 'success';
                $userdata['message'] = "You have updated your password. Please <a href='" . BASEURL . "/users/login'>Sign In.</a>";
            } else {
                $userdata['result'] = 'error';
                $userdata['message'] = 'There is some error updating the password.Please try again';
            }

            echo json_encode($userdata);
            die;
        }
        $userdatafromtoken = $this->db->select("*")->from("users")->where(array("password_reset_token" => $passwordtoken, 'isDeleted' => 0))->get()->row_array();
         if (count($userdatafromtoken) == 0) {
            echo "Invalid Link";
            die;
        } else if ($userdatafromtoken['expired_time'] <= time()) {
            echo "Expired Link";
            die;
        } else {
            $data["master_title"] = "Update your password";
            $data["master_body"] = "resetpassword";
            $data["passwordtoken"] = $passwordtoken;
            $this->load->layout('mainlayout', $data);
        } 
		            
   }

  
    public function register() {

        only_without_session_page();
        $data = $this->input->post();
        //~ debug($data);die("Gurvinder"); 
       if ($this->input->is_ajax_request() && !empty($data)) {
		   //~ $secret="6Ler73EUAAAAAD9fJyQSUwl_gRwItIS6uqu4Lx3y";
		   //~ $response=$_POST["g-recaptcha-response"];
		   //~ $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
		   //~ $captcha_success=json_decode($verify);
		   //~ if ($captcha_success->success===false) {
			    //~ $userarray['result'] = 'error';
                //~ $userarray['message'] = '<span style="color:red;">This user was not verified by recaptcha.</span>';
           //~ }else if ($captcha_success->success===true) {
			 
			$userdata['fname'] = $data['fname'];
            $userdata['lname'] = $data['lname'];
            $userdata['email'] = $data['email'];
            $userdata['password'] = md5($data['password']);
            $userdata['status'] = 0;
            $random_number = md5(time());
            $userdata['password_reset_token'] = $random_number;
            $userdata['created'] = time();			
            if ($this->db->insert('users', $userdata)) { 			
                $link = BASEURL . "/users/verifyemail/" . $random_number;
               	$this->load->model("template_model");
				$email_data  = $this->template_model->get_template('2');
				$subject = $email_data['subject'];
				$message = $email_data['description'];
				
                $message = str_replace("#link#", $link, $message);
                $message = str_replace("#user#", $userdata['fname'] . ' ' . $userdata['lname'], $message);
				$message = str_replace('#sitename#',SITE_NAME,$message);
				$message = str_replace(array('\n','<br>'),'',$message);

				$emailarray['message'] = $message;
                $emailarray['subject'] = $subject;
                $emailarray['to'] = $userdata['email'];
                
                $this->load->model("email_model");
                $this->email_model->sendIndividualEmail($emailarray);
                $userarray['result'] = 'success';
                $userarray['message'] = 'Thanks for signing up. Please check your email in order to activate your account';
				$this->session->set_flashdata('success', 'Please click the confirmation link in the email that was sent to you. ');
            } else {
                $userarray['result'] = 'error';
                $userarray['message'] = 'There is some error registering your account. Please try again or contact administrator';
            }
            //~ }else{
				//~ $userarray['result'] = 'error';
                //~ $userarray['message'] = '<span style="color:red;">Error while verification recaptcha.</span>';
            //~ }
            echo json_encode($userarray);
            die;
        }
		$data['honorifics']=$this->config->item('honorifics');		
        $data["master_title"] = "Register new account";
        $data["master_body"] = "register";
        $this->load->layout('mainlayout', $data);

    }

    public function verifyemail($verification_code = null) {
        only_without_session_page();
        $user = $this->db->select("*")->from("users")->where(array("password_reset_token" => $verification_code))->get()->row_array();
        if (count($user) > 0){
            $this->db->where("id", $user['id']);
            $this->db->update("users", array("status" => 1, "password_reset_token" => ''));
			//$this->session->set_userdata('userdata', $user);
			//$this->session->set_flashdata('msg', 'Thank you for registering with Smooth Maps Co.');
			//redirect(BASEURL . "/myplan");
			$data["master_title"] = "Email verified";
			$data["master_body"] = "verifyemail";
			$this->load->layout('mainlayout', $data);       
		} else {
            echo "Invalid Link";
            die;
        }
		
		
		
    }
	 public function fill_broker() {
		    $data['msg'] = $this->session->flashdata('thanks_msg');
			$data["master_title"] = "Fill broker form";
			$data["master_body"] = "fill_broker";
			$this->load->layout('login', $data);  
	 }

	
	public function broker() {
		$userdata=$this->session->userdata('userdata');
		$post = $this->input->post();
		if($post){
		   $this->load->model('broker_model');
		   $post['id'] = $userdata['id'];
		   $this->broker_model->insert_broker_info($post);
		   $data['result'] = 'success';
           echo json_encode($data);
           die;
			
		}
		
    }
    public function get_plan() {
		$this->load->model('myplan_model');
		//$data['free_plan']= $this->myplan_model->get_free_plan();
		$data['paid_plan']= $this->myplan_model->get_paid_plan();
	    $data["master_title"] = "Get Your Plan";
        $data["master_body"] = "myplan";
        $this->load->layout('login', $data);
    }
	public function upgrade_plan() {
		$this->load->helper('myplan');
 		$userdata=$this->session->userdata('userdata');
		$data['user_id'] = $userdata['id'];
	    $data['package_id'] = base64_decode($this->input->get("p_id"));
	    $data["master_title"] = "Upgrade My Plan";
        $data["master_body"] = "upgrade_plan";
        $this->load->layout('login', $data);
    }
    public function credit_detail() {		
		  $data = $this->input->post();
		  $data["master_title"] = "Credit Detail";
          $data["master_body"] = "credit_detail";
          $this->load->layout('login', $data);

    }
    public function thank_you() {
	
		$this->load->model('myplan_model');	
		$plan_confirm = $this->input->post();
	
		if(!empty($plan_confirm)){
		  $this->myplan_model->confirm_user_plan($plan_confirm);
		  $data["master_title"] = "Thank You";
          $data["master_body"] = "thank_you";
          $this->load->layout('login', $data);
		}
    }	
    public function checknicknamevalidity() {
        $valid = true;
        $nick_name = $this->input->post('nick_name');
        if (!empty($nick_name)) {
            $user = $this->db->select("*")->from("users")->where(array("nick_name" => $nick_name, "isDeleted" => 0))->get()->row_array();
            if (count($user) == 0) {
                $user = $this->db->select("*")->from("user_relations")->where(array("nick_name" => $nick_name, "isDeleted" => 0,"type"=>"user"))->get()->row_array();
                if (count($user) == 0) {
                    $valid = true;
                } else {
                    $valid = false;
                }
            } else {
                $valid = false;
            }
        }

        echo json_encode(array(
            'valid' => $valid,
        ));
        die;
    }

  
    public function checkemailvalidity() {
        $valid = 'true';
        $email = $this->input->post('email');
        $userdata = $this->session->userdata('userdata');
        if ($userdata['email'] != $email) {
            if (!empty($email)) {
                $user = $this->db->select("*")->from("users")->where(array("email" => $email, "isDeleted" => 0))->get()->row_array();
                if (count($user) == 0) {
                    $valid = 'true';
                } else {
                    $valid = 'false';
                }
            }
        }
 echo $valid;
        //~ echo json_encode(array(
            //~ 'valid' => $valid,
        //~ ));
        die;
    }

    public function profile() {
		$postData = $this->input->post();
		$userdata = $this->session->userdata("userdata");
		$id =  $userdata['id'];
		if(!empty($postData)){
			$res = $this->user_model->update_user_info($postData,$id);
			if($res)
				$this->session->set_flashdata('success', 'Your Profile updated successful');
			else
				$this->session->set_flashdata('error', 'Error while updating profile.');
			redirect(BASEURL."/users/profile");
		}
		$data["UserProfile"] = $this->user_model->get_userdata($id);
		$data["master_title"] = "My Profile";
        $data["master_body"] = "profile";
    	$this->load->layout('mainlayout', $data);
	}
    public function updateUserInfo() {
        $userdata = $this->session->userdata("userdata");
        $this->db->where("id", $userdata['id']);
		$data=$this->input->post();  
		$company_logo = substr($data['file_upload'],32);
  $setdata=array('fname'=>$data['fname'],'company_name'=>$data['my_company_name'],'lname'=>$data['lname'],'email'=>$data['email'],'agent_phone'=>$data['agent_phone'],'company_logo'=>$company_logo);	
        if ($this->db->update('users', $setdata)) {
            update_user_session($userdata['id']);
            $data['result'] = 'success';
            $data['message'] = 'Updated successfully';
        } else {
            $data['result'] = 'error';
            $data['message'] = 'There is some error updating the data. Please try again';
        }
        echo json_encode($data);
        die;
    }

    public function logout() {
	//	$this->session->sess_destroy();
        $this->session->unset_userdata('userdata');
        $this->session->unset_userdata('eligible_advance');
		$this->session->unset_userdata('step1_data');
		$this->session->unset_userdata('step2data');
		$this->session->unset_userdata('three_step_data');
		$this->session->unset_userdata('steplast_data');
		$this->session->unset_userdata('advance_form_data');
		$this->session->unset_userdata('eligible_advance');
        redirect(BASEURL."/users/login");
    }
 
 
	
 
    public function changePassword(){
		$data["master_title"] = "Change Password";
        $data["master_body"] = "changePassword";
        $this->load->view('users/changePassword', $data);
        die;
	}
    public function updatepassword(){
        $new_password = $this->input->post("new_password");
        $userdata = $this->session->userdata("userdata");
        $this->db->where('id', $userdata['id']);
        if ($this->db->update('users', array("password" => md5($new_password)))) {
            $this->session->set_flashdata('success', 'Password updated successfully');
        } else {
			$this->session->set_flashdata('error', 'There is some error updating the password.Please try again later');
        }
			redirect(BASEURL."/users/settings");
    }

    public function checkOldPassword() {
        $valid = 'false';
        $current_password = $this->input->post('old_password');
        $userdata = $this->session->userdata('userdata');
        $oldpassword = $this->db->select("password")->from("users")->where(array("id" => $userdata['id']))->get()->row_array();
        $oldpassword = $oldpassword['password'];
        if (md5($current_password) == $oldpassword) {
            $valid = 'true';
        }
        echo json_encode(array(
            'valid' => $valid,
        ));
        die;
    }

    public function updateUserPrivacy() {
        $privacydata = $this->input->post();
        $userdata = $this->session->userdata('userdata');
        foreach ($privacydata['privacy'] as $key => $val) {
            $this->db->where(array("user_id" => $userdata['id'], "privacy_id" => $key));
            if ($this->db->update('user_privacy', array('privacy_status' => $val))) {

                $status = 'success';
                $message = 'Privacy updated successfully';
            } else {
                $status = 'error';
                $message = 'There is some error updating the privacy,please try again later';
            }
        }
        echo json_encode(array("result" => $status, "message" => $message));
        die;
    }

      public function changeStatus($status=0,$id){
        $this->load->model('user_model');
        $updatearray["status"]=$status;
      	if (!empty($updatearray) && !empty($id) ){
        $response=$this->user_model->update_transaction_Status($updatearray,$id);
		}	
    }

	/**for cron job cancel subscription update**/
	    public function stripe_expire_plan(){
			only_without_session_page();
			require_once('stripe/init.php');				
			require_once('stripe/lib/Stripe.php');	
			$this->load->model('payment_stripe_model');
			$this->load->model("email_model");
			$response = $this->payment_stripe_model->cancel_stripe_plan('stripe');
			
			foreach($response as $key=>$val)
			{
				$sec = get_stripe_key_id($val['id'],'secret_key');
				$secret_key = $sec['value'];
				$sub = get_stripe_key_id($val['id'],'subscription_id');
				$subscription_id = $sub['value'];
				$user_id = $val['user_id'];
				
			try	{
				\Stripe\Stripe::setApiKey($secret_key);

				$subscription = \Stripe\Subscription::retrieve($subscription_id);	
				//debug($subscription);
				$current_status = $subscription->status;
				$cancel_period = $subscription->cancel_at_period_end;
				if($current_status =='active'){
					if($cancel_persendIndividualEmailiod == 1){
					$this->payment_stripe_model->update_status_from_stripe($val['id'],2);
					}else{
					$this->payment_stripe_model->update_status_from_stripe($val['id'],1);
					}

				}else{
		
				$this->payment_stripe_model->update_status_from_stripe($val['id'],0);
				$res =$this->payment_stripe_model->get_user_data($user_id);
				$this->load->model("template_model");
                    $email_data  = $this->template_model->get_template('8');
                    $email_subject = $email_data['subject'];
                    $email_message = $email_data['description'];
				
				$email_message = str_replace('#product#',$subscription->plan->name,$email_message);
				$email_message = str_replace('#user#',$res['fname'].' '.$res['lname'],$email_message);
				$email_message = str_replace('#email#',$res['email'],$email_message);
				$email_message = str_replace('#amount#','$'.$subscription->plan->amount/100,$email_message);
				$email_message = str_replace('#sitename#',SITE_NAME,$email_message);


				$emailarray['message'] = $email_message;
				$emailarray['subject'] = $email_subject;
				$emailarray['to'] = $res['email'];
				
				$this->email_model->sendIndividualEmail($emailarray);	
				}
				
				}
			catch(Exception $e) 
				{
				
				}
			}
		}	
		
	
	 public function presentation_mode() {
	   	$map_id = base64_decode($this->input->get('id'));
		$userdata = $this->session->userdata('userdata'); 
		$data['user_id'] = $userdata['id']; 
		$data['map_id'] = $map_id; 
		$response = $this->map_model->get_user_map($data);
		if(empty($data["map_id"]))	
		{
			$this->session->set_flashdata('error_msg','Invalid Url , please try again');
			redirect(BASEURL."/account");
		
		}
		if($response == '0')	
		{
			$this->session->set_flashdata('error_msg','Invalid Map Id , please try again');
			redirect(BASEURL."/account");
		
		}

		$data["locationData"] = $this->map_model->get_mapLocationData($map_id);	
//===================================================================

		if(@$data["locationData"]['map_data_set']){
			$map_data_set = explode(',', $data["locationData"]['map_data_set']);
			$data['prev_map_data_set'] = $map_data_set;			
			$res = $this->map_model->get_cate_location_new($data["locationData"]);	
			//debug($res);
			//die;
			if(!empty($res)){
			$i=0;
			foreach($res as $key=>$location){
				$result[$i]['latitude']=$location['latitude'];
				$result[$i]['longitude']=$location['longitude'];
				$result[$i]['map_id']=$location['location_id'];
				$result[$i]['color_code']=$location['color_code'];
				$result[$i]['store_name']=$location['store_type'];
				$result[$i]['address']=$location['address'];
				$result[$i]['city']=$location['city'];
				$result[$i]['zip_code']=$location['zip_code'];
				$result[$i]['phone_number']=$location['phone_number'];
				$result[$i]['country']=$location['country'];
				$i++;
			}
			$data['saved_locations'] = json_encode($result);			
			}

		}

	
//==============================================================		
	 
		$data['company'] = $this->user_model->get_company_data($userdata['id']);

	    $data["master_title"] = "Presentation Mode";
        $data["master_body"] = "presentation_mode";
        $this->load->layout('view_map_layout', $data);
	    }
	
	 public function full_screen_mode() {
		$data["map_id"] = base64_decode($this->input->get('id'));
		$data["locationData"] = $this->map_model->get_mapLocationData($data["map_id"]); 
		
	//===================================================================
			if(@$data["locationData"]['map_data_set']){
				$map_data_set = explode(',', $data["locationData"]['map_data_set']);
				$data['prev_map_data_set'] = $map_data_set;			
				$res = $this->map_model->get_cate_location_new($data["locationData"]);	
				//debug($res);
				//die;
				if(!empty($res)){
				$i=0;
				foreach($res as $key=>$location){
					$result[$i]['latitude']=$location['latitude'];
					$result[$i]['longitude']=$location['longitude'];
					$result[$i]['map_id']=$location['location_id'];
					$result[$i]['color_code']=$location['color_code'];
					$result[$i]['store_name']=$location['store_type'];
					$result[$i]['address']=$location['address'];
					$result[$i]['city']=$location['city'];
					$result[$i]['zip_code']=$location['zip_code'];
					$result[$i]['phone_number']=$location['phone_number'];
					$result[$i]['country']=$location['country'];
					$i++;
				}
				$data['saved_locations'] = json_encode($result);			
				}

			}

	//==============================================================		 
		 
		$data['locations'] = $this->map_model->get_map_data_sets();
		$data['categories'] = $this->categories_model->get_all_categories();
	    $data["master_title"] = "Full Screen Mode";
        $data["master_body"] = "full_screen_mode";
        $this->load->layout('full_screen_mode_layout', $data);
	    }
			
		function saveUserCard(){
			$this->load->model('billing_model');
			$userdata = $this->session->userdata('userdata');
			$user_id = $userdata["id"];
			$token = $_POST['stripeToken'];
			$redirect_url = $_POST['redirect_url'];
			$api_key = getConfigSettingVariable('stripe_sk_key');
			try{
				require FCPATH.APPPATH.'libraries/Stripe/init.php';
				//\Stripe\Stripe::setApiKey("sk_test_EgwjzSAZLxnWApfydpzAANe1");
				 \Stripe\Stripe::setApiKey($api_key);
				$saved_customers = \Stripe\Customer::create(array(
					"email" => $userdata["email"],
					"source" => $token // obtained with Stripe.js
				));
				$saveCustomers = array();
				$saveCustomers["user_id"] =$user_id;
				$saveCustomers["customer_id"] =$saved_customers->id;
				$saveCustomers["last4"] =@$saved_customers->sources->data[0]->last4;
				$saveCustomersres = $this->billing_model->saveCustomers($saveCustomers);
				$userdata = $this->session->userdata('userdata');
				$userdata["lob_api_mode"] = "live";
				$this->session->set_userdata('userdata', $userdata);
				$this->session->set_flashdata('success', 'Your card was saved.  You can now add to the '.ucfirst($userdata["lob_api_mode"]).' Queue!');
				redirect(BASEURL."/$redirect_url");
			}catch(Exception $e){
				$this->session->set_flashdata('error', $e->getMessage());
				redirect(BASEURL."/$redirect_url");
			}
			redirect(BASEURL."/addressbook");
		}



}

