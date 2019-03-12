<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	function get_sub_cate_parent($parent=null)
	{
		$ci=& get_instance();
		$ci->load->model('categories_model');
		if(!empty($parent))
		{	
		 $res = $ci->categories_model->get_category_by_parent($parent);
		}
		return $res["name"];
	} 