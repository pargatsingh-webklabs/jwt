<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function get_previlege_data($id){
		//debug($id);die;
	  $ci=& get_instance();
	  $ci->load->model('manageadmin_model');
	  return $admin_previlege= $ci->manageadmin_model->get_previlege($id);
	}
?>