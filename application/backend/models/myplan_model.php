<?php

/*
 * User_model.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to manage database related queries for the models
 * */

// It is good practice to use buffered output

ob_start();

class myplan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_transactions(){  
	   $data=array();
	   $myplan_Data = $this->db->select("*")->from("user_package")->where(array("status"=>1))->get()->result_array();
       $data['total_transactions'] = count($myplan_Data) ;
	   $price_Data = $this->db->select_sum("price")->from("user_package")->get()->row_array();
       $data['total_amount'] = $price_Data['price'] ;
	   return $data ; 	   
	 }	 
   function get_free_plan(){  
       return  $myplan_Data = $this->db->select("*")->from("packages")->where(array("type"=>"free"))->get()->row_array();
     }
    function get_paid_plan(){  
       return  $myplan_Data = $this->db->select("*")->from("packages")->get()->result_array();
     }	 
    function get_user_plan($data){  
       return  $user_plan_Data = $this->db->select("*")->from("packages")->where(array("id"=>$data["id"]))->get()->row_array();
     }
    function get_plan_validity($data){  
       return  $user_plan_Data = $this->db->select("*")->from("user_package")->where(array("user_id"=>$data["id"]))->get()->row_array();
	 }	 
    function confirm_user_plan($data=null){
     $user_package = $this->db->select("*")->from("packages")->where(array("id"=>$data["package_id"]))->get()->row_array();
     $expired_on = time() + ($user_package['validity']* 24 * 60 * 60);	
     $confirm_plan = array('user_id'=>$data['user_id'],'package_id'=>$data['package_id'],'package_name'=>$user_package['name'],'purchased_on'=>time(),'price'=>$data['price'],'expired_on'=>$expired_on);
	  if($this->db->insert('user_package',$confirm_plan)){	 	 
		$change_package = array('package_type'=>$user_package['type']);
		$this->db->where('id', $data['user_id']);
		 if($this->db->update('users',$change_package)){
		   return $this->db->select('*')->from('users')->where('id', $data['user_id'])->get()->row_array();
		}	 
	  }
    } 
	function get_plan($data=null){
     $user_plan = $this->db->select("*")->from("user_package")->order_by('id','desc')->where(array("user_id"=>$data["id"]))->get()->row_array();	
	 if(!empty($user_plan)){	
	   $valid_time = time() ;
		   if($valid_time >= $user_plan['expired_on']){
			  redirect(BASEURL.'/users/get_plan');
			}else{
                return;
				//redirect(BASEURL.'/account/dashboard');
				}		
	    	   	   
     }elseif(empty($user_plan)){
		 echo "empty";
	    redirect(BASEURL.'/users/get_plan');
     }    
   } 
	/*function check_user($data=null){
     $user_plan = $this->db->select("*")->from("user_package")->where(array("user_id"=>$data["id"]))->get()->result_array();
     $valid_time = time() ;
	 if(!empty($user_plan)){
	   foreach($user_plan as $key=>$val){
	   if($valid_time > $val['expired_on']){
          $plan_status = 0;
		  return $user_data = $this->db->select("*")->from("users")->where(array("id"=>$data["id"]))->get()->row_array();
		}
		else{
  		  $plan_status = 1;
		  $user_info = array("active_package"=>$plan_status); 
		  $this->db->where('id', $data['id']);
		  $this->db->update('users',$user_info); 
		  return $user_data = $this->db->select("*")->from("users")->where(array("id"=>$data["id"]))->get()->row_array();
		}	
	   } 	   
     }else{
		  return $user_data = $this->db->select("*")->from("users")->where(array("id"=>$data["id"]))->get()->row_array();
     }    
   }*/ 



   
}
