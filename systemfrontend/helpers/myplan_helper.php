<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	function get_user_plan($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('myplan_model');
	  return $user_plan_Data= $ci->myplan_model->get_user_plan($data);
	}


?>