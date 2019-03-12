<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Date Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Get "now" time
 *
 * Returns time() or its GMT equivalent based on the config file preference
 *
 * @access	public
 * @return	integer
 */
if ( ! function_exists('fetch_cms_data'))
{
	function getSiteSetting()
	{
            $CI =& get_instance();
            $CI->load->model('settings_model');
            $data=$CI->settings_model->get_site_setting();
            return $data;
	}
	
	function getSitetemplate()
	{
            $CI =& get_instance();
            $CI->load->model('settings_model');
            $data=$CI->settings_model->get_site_setting();
            return $data;
	}
	function fetch_cms_data($page_content_type=null)
	{
            $CI =& get_instance();
            $data=$CI->db->select("*")->from("cms_pages")->where(array("content-type"=>$page_content_type))->get()->row_array();
            return $data;
	}
        
        function get_visibility($visibility_id=null)
	{
            $namearray=array('1'=>'Visible','0'=>'Hidden');
            return $namearray[$visibility_id];
	}
        
        function update_user_session($user_id=null){
            $CI =& get_instance();
            $data=$CI->db->select("*")->from("users")->where(array("id"=>$user_id))->get()->row_array();
            $CI->session->set_userdata('userdata',$data);
        }
        
        function menu_headers(){
            $CI =& get_instance();
            $data=$CI->db->select("*")->from("manage_page_types")->where(array("active"=>"1"))->get()->result_array();
            return $data;
        }
        
        function get_companyprofile($user_id=null){
            $CI =& get_instance();
			return  $data=$CI->db->select("*")->from("companyprofile")->get()->row_array();
          
        }
        
        function check_session_and_exit(){
            $CI =& get_instance();
            $userdata=$CI->session->userdata("userdata");
            if(empty($userdata)){
                $CI->session->set_flashdata("success_msg",INVALID_MSG);
                redirect(BASEURL.'/users/login');die;
            } 		
        }
		function check_guest(){
            $CI =& get_instance();
            $userdata=$CI->session->userdata("userdata");
             if(!empty($userdata) && $userdata['type']=="guest"){
				$controller =  $CI->router->fetch_class();
				$function = $CI->router->fetch_method();
				if($controller!="account" && $function!="dashboard"){
                   redirect(BASEURL.$controller.'/'.$function);die;
                }else{ 
				   redirect(BASEURL);die;
				} 
			}  			
        }
        function check_cart_exist(){
            $CI =& get_instance();
            $cart_session=$CI->cart->contents();
            if(empty($cart_session)){
               redirect(BASEURL.'/cart/cart_detail');die;
            }            
        }        
        function check_session_and_exit_admin(){
            $CI =& get_instance();
            $userdata=$CI->session->userdata("userdata");
            if(empty($userdata)){
                $CI->session->set_flashdata("success_msg",INVALID_MSG);
                redirect(BASEURL.'/admin/login');die;
            }            
        }
        
        function only_without_session_page(){
            $CI =& get_instance();
            $userdata=$CI->session->userdata("userdata");
            if(!empty($userdata) && $userdata['type']!="guest"){
                redirect(BASEURL.'/addressbook');die;
            }    
        }
        function get_plan(){

              return;
	    }
		function build_profile_to_execute(){
			  $ci=& get_instance();	  
			  $ci->load->model('user_survey_model');
			  $userdata = $ci->session->userdata("userdata");
			  $survey_data = $ci->user_survey_model->get_client_survey($userdata);
              if(empty($survey_data)){

				 redirect(BASEURL.'/users/profile_builder');  
			  }
	    }
   
		function getRecipientName($letter_id=false,$mail_type=false){
			  $ci=& get_instance();	  
			  $ci->load->model('letters_model');
			  $ci->load->model('postcard_model');
			  if(!empty($letter_id) && $mail_type && $mail_type=='letter'){
			    $RecipientName = $ci->letters_model->getRecipientName($letter_id);
			  }elseif(!empty($letter_id) && $mail_type && $mail_type=='postcard'){
				$RecipientName = $ci->postcard_model->getRecipientName($letter_id);
			  }
              if(!empty($RecipientName)){
				return $RecipientName["To_name"];
			  }
	    }
		function getConfigSettingVariable($setting_name=false){
			  $ci=& get_instance();	  
			  $ci->load->model('settings_model');
			 if($setting_name){
			    $RecipientName = $ci->settings_model->getConfigSettingVariable($setting_name);
			  }
              if(!empty($RecipientName)){
				return $RecipientName["value"];
			  }
			  return false;
	    }
   

		function getSavedCardsOfUser($uid=false){
			$ci=& get_instance();	 
			$userdata = $ci->session->userdata('userdata');
			$user_id = $userdata["id"];
			$ci->load->model('billing_model');
			$listCards = $ci->billing_model->listCards($user_id);
			return $listCards;
			  
	    }


   function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
       
        $right_links    = $current_page + 3;
        $previous       = $current_page - 3; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
       
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="paginate_button page-item first"><a class="page-link" href="'.$page_url.'?page=1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li class="paginate_button page-item"><a class="page-link" href="'.$page_url.'?page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li class="paginate_button page-item"><a class="page-link" href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
                    }
                }  
            $first_link = false; //set first link to false
        }
       
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="paginate_button page-item first active"><span class="page-link">'.$current_page.'</span></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="paginate_button page-item last active"><span class="page-link">'.$current_page.'</span></li>';
        }else{ //regular current link
            $pagination .= '<li class="paginate_button page-item active"><span class="page-link">'.$current_page.'</span></li>';
        }
               
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li class="paginate_button page-item"><a class="page-link" href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li class="paginate_button page-item"><a class="page-link" href="'.$page_url.'?page='.$next_link.'" >&gt;</a></li>'; //next link
                $pagination .= '<li class="paginate_button page-item last"><a class="page-link" href="'.$page_url.'?page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
       
        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}

function getServicesList(){
	$ci=& get_instance();	 
	$ci->load->model('services_model');
	$listServices = $ci->services_model->getAllservices();
	return $listServices;
}


function getFooter(){
	$ci=& get_instance();	 
	$ci->load->model('settings_model');
	$listServices = $ci->settings_model->getFooter();
	return $listServices;
}

function getNewFooter(){
	$ci=& get_instance();	 
	$ci->load->model('settings_model');
	$listServices = $ci->settings_model->getNewFooter();
	return $listServices;
}

function getContact(){
	$ci=& get_instance();	 
	$ci->load->model('settings_model');
	$listServices = $ci->settings_model->getContact();
	return $listServices;
}

   
}
/* End of file data_helper.php */
/* Location: ./system/helpers/date_helper.php */
