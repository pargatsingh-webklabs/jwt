<?php

/*
 * Settings.php
 * Created by : Prashant Soam
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle Admin profile related information
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cms extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->load->model('cms_model');
        $data["master_title"] = "Manage Content page";   // Please enter the title of page......
        $data["master_body"] = "index";   // Please enter the body of page......
        $data["cmsdata"]=$this->cms_model->getCMSPages();
	    $this->load->theme('mainlayout', $data);  // Loading theme       	
    }


	public function manage_cms_pages($id=null){
	    $this->load->model('cms_model');
		$cms_data =  $this->input->post();
		if(!empty($cms_data)){
		  $cms_data['id'] = $id;
		  $this->cms_model->manage_CMSPages($cms_data);
		  $result['result'] = 'success';
		  echo json_encode($result);
          die;
		}
        $data["cmsdata"]=$this->cms_model->pageDetails($id);	    
        $data["master_title"] = "Edit frontend page";   // Please enter the title of page......
        $data["master_body"] = "edit_frontend_content";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme         
	}
    public function slider_content() {
		$this->load->model('cms_model');
		$slider_text_data =  $this->input->post();
		if(!empty($slider_text_data)){
		  $this->cms_model->manage_slider_text($slider_text_data);
		  $result['result'] = 'success';
		  echo json_encode($result);
          die;
		}
		$data['slider_text'] = $this->cms_model->get_slider_text();
        $data["master_title"] = "Manage Banner Text";   // Please enter the title of page......
        $data["master_body"] = "slider_text";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme       		
    }

    public function singup_content($id) {

		$this->load->model('cms_model');
		$singup_content =  $this->input->post();
		if(!empty($singup_content)){
		  $this->cms_model->manage_singup_content($singup_content);
		  $result['result'] = 'success';
		  echo json_encode($result);
          die;
		}
		$data['singup_content'] = $this->cms_model->get_singup_content();
        $data["master_title"] = "Manage Singup Content";   // Please enter the title of page......
        $data["master_body"] = "singup_content";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme       		
    }

	
    public function edit($id=null){
        $this->load->model('cms_model');
        $cmsdata=$this->input->post();
        if(!empty($cmsdata)){
            if(empty($cmsdata['subject'])){
                $data['errormsg']='Subject can not be empty';
            }else if(empty($cmsdata['body'])){
                $data['errormsg']='Body can not be empty';
            }else{
                if($this->cms_model->updateContent($cmsdata,$cmsdata['id'])){
                    $data['successmsg']='Content updated successfully';
                }else{
                    $data['errormsg']='There is some error updating the page.Please try again';
                }
            }
        }
        $data["master_title"] = "Manage Content page";   // Please enter the title of page......
        $data["master_body"] = "edit";   // Please enter the body of page......
        $data["cmsdata"]=$this->cms_model->pageDetails($id);
        $this->load->theme('mainlayout', $data);  // Loading theme       
    }


	public function update_profile_image(){
	    $this->load->model("profile_model");
		$userdata=$this->session->userdata("userdata");       
	    $config['upload_path'] ='./assets/profile_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $newFileName = $_FILES['userfile']['name'];
        $fileExt = array_pop(explode(".", $newFileName));		
        $config['file_name'] =  md5(time()).".".$fileExt;
  	  //$this->load->library('upload', $config);
       $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
            die;
        } else{
            $data = array('upload_data' => $this->upload->data());
            $userinfo = array();
            $userinfo['image'] = BASEURL.substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];
		  //  $userinfo['id'] = $userdata['id'];
           // $this->profile_model->upload_admin_image($userinfo);
            echo json_encode($userinfo);
            die;	
	       }

     }	   
    public function changeStatus($status=0,$id=0){
        $this->load->model('cms_model');
        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
        $response=$this->cms_model->update_TestimonialStatus($updatearray,$id);
        if($response){
            $this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
        }else{
            $this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
        }
        redirect(BASEURL.'/cms/testimonials');
    }	

	
	
}
