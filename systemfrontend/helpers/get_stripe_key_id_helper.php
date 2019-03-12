<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	function get_stripe_key_id($transaction_id,$key){
			$ci=& get_instance();
			$ci->load->model('payment_stripe_model');
			$data['userdata']=$ci->session->userdata('userdata'); 

			if (!empty($transaction_id) && !empty($key)){
			return $ci->payment_stripe_model->get_subsciption_detail($transaction_id,$key);

			}
	}


?>