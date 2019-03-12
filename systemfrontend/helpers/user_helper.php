<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	function get_same_bank($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('advance_request_form_model');
	  return $same_bank= $ci->advance_request_form_model->get_same_bank($data);
	}
	        function get_user_image($userid=null){
          $ci=& get_instance();
	      $ci->load->model('profile_model');
          return $ci->profile_model->get_user_image($userid);
        }
	function curl_data($data){
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"http://localhost/pfaapp/add_tickets.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 
			http_build_query($data));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec ($ch);
			$status = curl_getinfo($ch);
			curl_close ($ch);
			//~ echo json_decode($status);
		//~ var_dump($status);
		return $server_output;
	}
?>
