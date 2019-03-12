<?php

/*
 * User_model.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to manage database related queries for the models
 * */

// It is good practice to use buffered output

ob_start();

class like_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
    function hit_like($data){ 
		$dataarray["entity_id"]=$data['id'];
		$dataarray["user_id"]=$data['user_id'];
		$dataarray["like_type"]=$data['like_type'];
		$dataarray["created"]=time();
		return $this->db->insert("likes",$dataarray);
     }
	 
	 function remove_like($data){
		$dataarray["entity_id"]=$data['id'];
		$dataarray["user_id"]=$data['user_id'];
		$dataarray["like_type"]=$data['like_type'];
		return $this->db->delete("likes",$dataarray);
     }
	 
    
		
}
