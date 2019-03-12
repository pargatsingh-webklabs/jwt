<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class api extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('user_model');
		$this->load->model('user_token_model');
		$this->load->library('email');
	}

    public function index() {
        $this->home();
    }
	
	function generate_refresh_token($verifyTokenData=array()){
            $new_pass='';
            if(empty($verifyTokenData)) return $new_pass = $this->randomPassword(24);
            while(true):
                $new_pass = $this->randomPassword(24);
                if (strpos($new_pass, $verifyTokenData) !== false) {
                    continue;
                }
                if (strpos($new_pass, substr($verifyTokenData, -4)) !== false && strlen($verifyTokenData)>3) {
                    continue;
                }
                    break;
            endwhile;
                return $new_pass;
     }
     
	function generate_access_token($verifyTokenData=array()){
            $new_pass='';
           
            if(empty($verifyTokenData)) return $new_pass = $this->randomPassword(24);
            while(true):
                $new_pass = $this->randomPassword(24);
                if (strpos($new_pass, $verifyTokenData) !== false) {
                    continue;
                }
                if (strpos($new_pass, substr($verifyTokenData, -4)) !== false && strlen($verifyTokenData)>3) {
                    continue;
                }
                    break;
            endwhile;
                return $new_pass;
     }
     
             
    function randomPassword($lmt=8) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $lmt; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

	public function login($id=NULL){
		$password = $_REQUEST["password"];
		if(empty($password) || empty($_REQUEST["email"])){
			echo json_encode(array("result"=>"error","data"=>"Email and password cannot be empty"));die;
		}
		$userdata = $this->user_model->get_Users($_REQUEST);
		if(empty($userdata)){
			echo json_encode(array("result"=>"error","data"=>"Wrong credentials"));die;
		}
		$addexpire_at_time = $this->config->item('addexpire_at_time');
		
		$usertoken = $this->user_token_model->get_usertoken($userdata);
		$refresh_token = $this->user_token_model->get_refreshtoken($usertoken['refresh_token']);	
		$access_token = $this->user_token_model->get_accesstoken($usertoken['access_token']);
	
		$refresh_token_data = $this->generate_refresh_token($refresh_token);
		$accestoken_data = $this->generate_access_token($access_token);
		
		/*  if user token is empty insert new tokens */
		
		if(empty($usertoken)){
			$data['user_id'] = $userdata['id'];
            $data['refresh_token'] = $refresh_token_data;
            $data['access_token'] = $accestoken_data;
            $data['expire_at'] = strtotime(date('Y-m-d H:i',strtotime($addexpire_at_time,time())));
            $data['status'] = '1';
            $data['created'] = time();
			if ($this->db->insert('user_token', $data)) { 	
				$usertoken_data = $this->user_token_model->get_tokens_result($userdata);
				echo json_encode(array("result"=>"success","data"=>$usertoken_data));die;
			}
		}
		
		$current_time = time();
		$hourdiff = round(($current_time - $usertoken['expire_at'])/3600, 1);
		
		/*  if expired time diference is less than 6 hours then update expire time - plus 6 hours from current time */
		if(!empty($usertoken) && $hourdiff<6){
			 $data['expire_at'] = strtotime(date('Y-m-d H:i',strtotime($addexpire_at_time,time())));
             $id = $usertoken['id'];
			if ($this->user_token_model->update_user_token($data,$id)) { 	
				$usertoken_data = $this->user_token_model->get_tokens_result($userdata);
				echo json_encode(array("result"=>"success","data"=>$usertoken_data));die;
			}
		}
		/*  if expired time diference is greater than 6 hours then update expire time - plus 6 hours from current time */
		elseif(!empty($usertoken) && $hourdiff>6){
			$data['user_id'] = $userdata['id'];
            $data['refresh_token'] = $refresh_token_data;
            $data['access_token'] = $accestoken_data;
            $data['expire_at'] = strtotime(date('Y-m-d H:i',strtotime($addexpire_at_time,time())));
            $data['status'] = '1';
            $data['created'] = time();
			if ($this->db->insert('user_token', $data)) { 	
				$usertoken_data = $this->user_token_model->get_tokens_result($userdata);
				echo json_encode(array("result"=>"success","data"=>$usertoken_data));die;
			}
			
		}

    }	
    
    public function register(){
		if(empty($_REQUEST["fname"]) || empty($_REQUEST["lname"]) || empty($_REQUEST["email"]) || empty($_REQUEST["password"]) || empty($_REQUEST["dob"])){
			echo json_encode(array("result"=>"error","data"=>"Please fill out all fields"));die;
		}
		$check_user = $this->user_model->check_user($_REQUEST);
		if(!$check_user){
			$userdata = $this->user_model->save_user($_REQUEST);
			if($userdata){
				echo json_encode(array("result"=>"success","data"=>"user created successfully"));die;		
			}else{
				echo json_encode(array("result"=>"error","data"=>"errror while registration"));die;	
			}
		}else{
			echo json_encode(array("result"=>"error","data"=>"User already registered"));die;
		}
	}
  
	public function profile(){
	
			$headers=array();
			foreach (getallheaders() as $name => $value) {
				$headers[$name] = $value;
			}	
			$usertoken_data = $this->user_token_model->get_token_data($headers['access_token'],$_REQUEST);
			if(!empty($usertoken_data)){
				$userdata = $this->user_model->get_user($usertoken_data['user_id']);
				if($userdata){
					echo json_encode(array("result"=>"success","data"=>$userdata));die;		
				}else{
					echo json_encode(array("result"=>"error","data"=>"No user exist"));die;	
				}
			}else{
				echo json_encode(array("result"=>"error","data"=>"Invalid token"));die;
			}
		
	}
	
	public function token(){
	
			$headers=array();
			foreach (getallheaders() as $name => $value) {
				$headers[$name] = $value;
			}	
			
			$addexpire_at_time = $this->config->item('addexpire_at_time');
			$usertoken_data = $this->user_token_model->get_refreshtoken_data($headers['refresh_token']);
			if(!empty($usertoken_data)){
				$id = $usertoken_data['id'];
				$data['access_token'] = $this->generate_access_token($usertoken_data['access_token']);
				$data['expire_at'] = strtotime(date('Y-m-d H:i',strtotime($addexpire_at_time,time())));
				
				$result = $this->user_token_model->update_access_token($data,$id);
				if($result){
					echo json_encode(array("result"=>"success","data"=>"Access token generated successfully"));die;
				}else{
					echo json_encode(array("result"=>"error","data"=>"error while generating access token"));die;
				}
			}else{
				echo json_encode(array("result"=>"error","data"=>"Invalid token"));die;
			}
			
		
	}
   
   

}

