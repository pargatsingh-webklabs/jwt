<?php

/*
 * Settings.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle Admin profile related information
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Users.php
     * Function :bulkaction
     * Created by : Prashant Soam
     * Created on: 9 Feb,2015
     * Purpose: Function server the edit profile functionality of the admin
     * */
    
    public function bulkaction(){
        $data=$this->input->post();
       
        $this->load->model('user_model');
        if(!empty($data)){
            if($data['action']=='deactivate'){
                foreach($data['check_user'] as $key=>$val){
                    $updatearray['status']=0;
                    $this->user_model->updateUserStatus($updatearray,$val);
                    $this->session->set_flashdata('success_msg','User Deactivated successfully');
                }
            }
            if($data['action']=='activate'){
                foreach($data['check_user'] as $key=>$val){
                    $updatearray['status']=1;
                    $this->user_model->updateUserStatus($updatearray,$val);
                    $this->session->set_flashdata('success_msg','User Activated successfully');
                }
            }
            if($data['action']=='delete'){
                foreach($data['check_user'] as $key=>$val){
                    $updatearray['isDeleted']=1;
                    $this->user_model->updateUserStatus($updatearray,$val);
                    $this->session->set_flashdata('success_msg','User Deleted successfully');
                }
            }
        }
        
        redirect(BASEURL."/users");
    }

    public function index($status=null) {
        $this->load->model('user_model');
        $data["master_title"] = "Manage Users";   // Please enter the title of page......
        $data["master_body"] = "index";   // Please enter the body of page......
        if(isset($status))
        $data["user_data"]=$this->user_model->get_user_by_status($status);
        else
        $data["user_data"]=$this->user_model->get_Users();
        $this->load->theme('mainlayout', $data);  // Loading theme       		
    }
    public function view_profile($id=NULL){
		$this->load->model('user_model');
		//~ $data["accountinfo"]=$this->user_model->get_accountinfo($id);
		//$data['packname']=$this->user_model->getpackname($id);
		
		//debug($data["accountinfo"]);die;
		$data["user_details"]=$this->user_model->get_userdata($id);
		//debug($data["user_details"]);die;
        $data["master_title"] = "User Profile Information";   // Please enter the title of page......
        $data["master_body"] = "view_profile";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme  
	//	$data["user_form_details"]=$this->user_model->get_Users_form_details($id);
       
	   // header("location:". BASEURL ."/admin_users/view_user_profile/". $id);
    }	

    public function loginAsUser($id=NULL){
		$this->load->model('user_model');
		$data=$this->user_model->get_userdata($id);
		debug($this->session);die;
		$userdata = $this->db->select("*")->from("users")->where(array("email" => $data['email'], "password" => $data["password"], "isDeleted" => "0"))->get()->row_array();
        if (count($userdata) >= 1) {
			$userdata["lob_api_mode"] = "live";
			$this->session->set_userdata('userdata', $userdata);
			//~ $userdata['result'] = 'success';
		}
		redirect(FRONT_BASE_URL."/users/login");
        //~ $data["master_title"] = "User Profile Information";   // Please enter the title of page......
        //~ $data["master_body"] = "view_profile";   // Please enter the body of page......
        //~ $this->load->theme('mainlayout', $data);  // Loading theme  
	}	



    
    public function profile($id=null){
        if(empty($id)){
            echo "Invalid Id";die;
        }
        $this->load->model('user_model');
		$this->load->helper('insurance_helper');
        $data["master_title"] = "User Detail";   // Please enter the title of page......
        $data["master_body"] = "profile";   // Please enter the body of page......
        $data["userdata"]=$this->user_model->getUserDetail($id);
        //$data['relation_data']=$this->user_model->getUserRelationData($id);
		$data['relation_data']=$this->user_model->getuserdata($id);
        $this->load->theme('mainlayout', $data);  // Loading theme
    }
    
    public function changeStatus($status=0,$id=0){
        $this->load->model('user_model');
        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
        $response=$this->user_model->updateUserStatus($updatearray,$id);
        if($response){
            $this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
        }else{
            $this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
        }
        redirect(BASEURL.'/users/');
    }
    
    public function deleteUser($id=0){
        $this->load->model('user_model');
      	$status = $this->user_model->delete_user($id);
        if($status=="true"){
		   $this->session->set_flashdata('success_msg','Package deleted successfully');
		   /* $result['result'] = 'success';
		      echo json_encode($result);
		      die;*/
		}else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
        redirect(BASEURL.'/users/');
    }

    public function change_Status($status=0,$id=0,$ID=NULL){
       $this->load->model('user_model');
        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
       $response=$this->user_model->update_advance_Status($updatearray,$id);
        if($response){
            $this->session->set_flashdata('success_msg','The action is performed successfully');
        }else{
            $this->session->set_flashdata('error_msg','Something went wrong . Please try again !');
        }
        redirect(BASEURL.'/users/view_advance_form/'.$ID);
    }
  
    public function get_user($status=NULL) {
         $this->load->model('user_model');
		 $data["user_data"]=$this->user_model->get_user_by_status($status);
		 $data["master_title"] = "Users List"; 
		 $data["master_body"] = "user_list";       
		 $this->load->theme('mainlayout', $data);  

     		
    }
    public function get_all_user() {
			 $this->load->model('user_model');
			 $data["user_data"]=$this->user_model->get_Users();
			 $data["master_title"] = "Users List"; 
			 $data["master_body"] = "user_list";       
			 $this->load->theme('mainlayout', $data);    		
    }	
    public function changePassword() {
			$this->load->model('user_model');
			$postData = $this->input->post();
			if(!empty($postData)){
				$new_password = $this->input->post("new_password");
				$userdata = $this->session->userdata("userdata");
				$this->db->where('id', $userdata['id']);
				if ($this->db->update('admins', array("password" => md5($new_password)))) 
					$this->session->set_flashdata('success', 'Your payment was successful');
				else
					$this->session->set_flashdata('error', 'Error while catching payment.');
				redirect(BASEURL."/users/changePassword");
			}

			$data["master_title"] = "Change Password"; 
			$data["master_body"] = "changePassword";       
			$this->load->theme('mainlayout', $data);    		
    }	
	
	
	
}
