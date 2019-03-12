<?php

/*
 * User_model.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to manage database related queries for the models
 * */

// It is good practice to use buffered output

ob_start();

class profile_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
    function get_profile_data($userdata){  
       return  $userData = $this->db->select("*")->from("users")->where(array("id" =>$userdata['id'], 'status' => 1))->get()->row_array();
     }
	 
	function get_admin_info($id=null){  
       return  $admin_info = $this->db->select("*")->from("admins")->where(array("id" =>$id, 'status' => 1))->get()->row_array();
     } 
	function upload_admin_image($data=null){  

           $request_data=array('image' => $data['database_image']);
		   $this->db->where(array('id' => $data['id']));
		   $this->db->update('admins',$request_data);
     } 
	function update_admin($data=null){  
        $update_data = array('first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'display_name'=>$data['display_name'],'email'=>$data['email'],'about_myself'=>$data['about_myself'],'verify_password'=>md5($data['verify_password']),'last_login'=>time());
		$this->db->where('id',$data['id']);
		return $this->db->update('admins',$update_data);
     } 	 
    
	public function get_user_image($id){
		$user_image = $this->db->select('image')->from('admins')->where(array('id'=>$id))->get()->row_array();
		return  $user_image['image'];   
	}	
}
