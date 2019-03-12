<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function get_previlege($id){
		echo $id.'<br/>';
		$ci=& get_instance();
	  $ci->load->model('manageadmin_model');
	  return $admin_previlege= $ci->manageadmin_model->get_all_previlege($id);
	}
?>