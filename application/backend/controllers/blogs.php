<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class blogs extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		
        $this->load->model('blogs_model');
       
        $data["blogsdata"]=$this->blogs_model->get_all_blogs();
        //echo "<pre>";print_r($data["blogsdata"]);echo "</pre>";
        $data["master_title"] = "Manage Blogs";
        $data["master_body"] = "index";   

	    $this->load->theme('mainlayout', $data);    	
    }
	public function add_blogs($id=null){		
	    $this->load->model('blogs_model');
		//echo "hello0";die;
		$blogs_data =  $this->input->post();
		if(!empty($blogs_data)){
			//debug($blogs_data);debug($_FILES['blog_image']);die;
			if(!empty($_FILES['blog_image']['name'])){
			
						$_FILES['userfile']['name']= $_FILES['blog_image']['name'];
						$_FILES['userfile']['type']= $_FILES['blog_image']['type'];
						$_FILES['userfile']['tmp_name']= $_FILES['blog_image']['tmp_name'];
						$_FILES['userfile']['error']= $_FILES['blog_image']['error'];
						$_FILES['userfile']['size']= $_FILES['blog_image']['size'];
						$config['upload_path'] ='../assets/blog_img/';
						$config['allowed_types'] = 'gif|jpg|png';
						$newFileName =  $_FILES['userfile']['name'];
						$fileExt = array_pop(explode(".", $newFileName));  
						$config['file_name'] =  md5(time()).".".$fileExt;
						$this->upload->initialize($config);
						if (!$this->upload->do_upload()) {
							$error = array('error' => $this->upload->display_errors());
							echo json_encode($error);
							die;
						} else{
							$data = array('upload_data' => $this->upload->data());
						   // $config['upload_path'] = substr($config['upload_path']);
							$userinfo = array();
							$userinfo['blog_image'] = substr($config['upload_path'],1,strlen($config['upload_path'])).$data['upload_data']['file_name'];   
										}
				}	
							$userinfo['id'] = $id;   
							$userinfo['blog_title'] = $blogs_data['blog_title'];
							$userinfo['blog_content'] = $blogs_data['blog_content'];   
							$userinfo['blog_added_by'] = $blogs_data['blog_added_by'];   
							$this->blogs_model->update_blogs($userinfo);
							redirect(BASEURL.'/blogs/');
				
	}
        $data["blogsdata"]=$this->blogs_model->blogsDetails($id);	    
        $data["master_title"] = "Edit Blog";   // Please enter the title of page......
        $data["master_body"] = "edit_blogs";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme         
	}
	
	public function deleteblogs($id=null){		
	    $this->load->model('blogs_model');
      	$status = $this->blogs_model->delete_blogs($id);
        if($status=="true"){
		   $this->session->set_flashdata('success_msg','Package deleted successfully');
		   /* $result['result'] = 'success';
		      echo json_encode($result);
		      die;*/
		}else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
        redirect(BASEURL.'/blogs/'); 
	}
	public function changeStatus($status=0,$id=0){
        $this->load->model('blogs_model');
        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
        $response=$this->blogs_model->updateblogsStatus($updatearray,$id);
        if($response){
            $this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
        }else{
            $this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
        }
        redirect(BASEURL.'/blogs/');
    }
	
}
