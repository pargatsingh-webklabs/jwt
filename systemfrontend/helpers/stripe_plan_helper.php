<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	function get_stripe_plan(){
			$ci=& get_instance();
			$ci->load->model('stripe_plan_model');
			$data['userdata']=$ci->session->userdata('userdata'); 

			if (!empty($data)){
			$res = $ci->stripe_plan_model->get_stripe_plan($data);
			return count($res);
			}
	}


?>