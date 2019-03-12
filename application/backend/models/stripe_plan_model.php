<?php

/*
 * User_model.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to manage database related queries for the models
 * */
class stripe_plan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	public function get_stripe_plan($data)
	{

		return $this->db->select("*")->from("user_package")->where(array('user_id'=>$data['userdata']['id'],'expired_on >'=>time()))->get()->row_array();
	}	
	
}	
	