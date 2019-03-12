<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_realpath'))
{
	function plan_package($id)
	{
		$ci =& get_instance();
		$ci->load->model('pricing_model');
		if (!empty($id))
		{
		return $ci->pricing_model->get_pricing_feature($id);
		
		}
	}	
	
	
	
}	