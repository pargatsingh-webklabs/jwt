<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function get_page_data($data=array()){
	  $ci=& get_instance();
	  $ci->load->model('cms_model');
	  return $same_bank= $ci->cms_model->get_page_data($data);
	}
?>