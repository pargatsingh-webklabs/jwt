<?php

/*
 * User_model.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to manage database related queries for the models
 * */

// It is good practice to use buffered output

ob_start();

class limit_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_active_transaction($data=array()){	   
	   $data_transaction=array();
	   
	   $advance_data = $this->db->select("total_repayment")->from("advance_request_form")->where(array("user_id"=>$data['id']))->get()->result_array();
	   
	   $replacement_data = $this->db->select("total_repayment")->from("replacement_request_form")->where(array("user_id"=>$data['id']))->get()->result_array();

	 
	   $total_advance_transaction="";
	   foreach($advance_data as $key => $value){
		   $total_advance_transaction = $total_advance_transaction +  $value['total_repayment'];   
	   }
	 
	   $total_replacement_transaction="";
	   foreach($replacement_data as $key => $val){
		   $total_replacement_transaction = $total_replacement_transaction +  $val['total_repayment'];   
	   }

       $data_transaction = $total_advance_transaction + $total_replacement_transaction;

	   return $data_transaction ; 	   
	 }	 
 

   
}
