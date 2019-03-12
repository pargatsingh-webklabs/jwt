<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categories_model');	
        $this->load->helper('sub_category_parent');	
    }

    public function index() {

        $data["categoriesdata"]=$this->categories_model->get_all_categories();
        $data["master_title"] = "Manage Categories";
        $data["master_body"] = "index";   
	    $this->load->theme('mainlayout', $data);    	
    }
	public function sub_categories() {

        $data = $this->input->post();
		if(!empty($data)){
        $response = $this->categories_model->add_sub_categories($data);
		redirect(BASEURL.'/categories/sub_cate_list');	
		}
		$data["categoriesdata"]=$this->categories_model->get_all_categories();
		$data["colours"]=$this->categories_model->get_all_colours();
		$data["master_title"] = "Manage Sub Categories";
        $data["master_body"] = "sub_categories";   
	    $this->load->theme('mainlayout', $data);    	
    }
	public function sub_cate_list() {

        $data["categoriesdata"]=$this->categories_model->get_all_sub_categories();
        $data["master_title"] = "Manage Sub Categories";
        $data["master_body"] = "sub_cate_list";  
		
	    $this->load->theme('mainlayout', $data);    	
    }
	public function edit_sub_cate($id) {
 		$data["categoriesdata"]=$this->categories_model->get_all_sub_categories_by_id($id);
		$data["categorydata"]=$this->categories_model->get_all_categories();
		$post = $this->input->post();	
		if(!empty($post))
		{
       	$response = $this->categories_model->edit_sub_categories($post);
		redirect(BASEURL.'/categories/sub_cate_list');
		}
        $data["master_title"] = "Manage Sub Categories";
        $data["master_body"] = "edit_sub_categories";   
	    $this->load->theme('mainlayout', $data);    	
    }
	public function delete_sub_category($id=null){		
      	$status = $this->categories_model->delete_sub_category($id);
        if($status){
         
        redirect(BASEURL.'/categories/sub_cate_list'); 
		}
	}

	public function update_category(){
       $post = $this->input->post();
       $response = $this->categories_model->update_category_position($post);
	   if($response && $response!="row_found"){
	     $result['result'] = "success";
		 echo json_encode($result); 
		 die;
	   }else if($response=="row_found"){
	     $result['result'] = "row_found";
		 echo json_encode($result); 
		 die;	   
	   }else{
	     $result['result'] = "error";
		 echo json_encode($result); 
		 die;	   
	   }	
    }	

	
	public function manage($id=null){		
		$categories_data =  $this->input->post();

		if(!empty($categories_data)){

		  $categories_data['id'] = $id;
		 $category_id = $this->categories_model->update_categories($categories_data);
			if($category_id){
				if(@$id){
					$this->session->set_flashdata('successmsg', 'Category data updated successfully');
				}else{
					$this->session->set_flashdata('successmsg', 'Category data inserted successfully');
				}				
				redirect(BASEURL.'/categories');				
			}else{
				if(@$id){
				    $this->session->set_flashdata('errormsg', 'Error updating your requested data , please try again');
				}else{
			    	$this->session->set_flashdata('errormsg', 'Error inserting your requested data , please try again');
				}								

				redirect(BASEURL.'/categories');			
			}
		}
        $data["categoriesdata"]=$this->categories_model->categoriesDetails($id);
		if(@$id){
           $data["master_title"] = "Edit Category";   // Please enter the title of page......		
		}else{
           $data["master_title"] = "Add Category";   // Please enter the title of page......		
		}

        $data["master_body"] = "edit_categories";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme         
	}
	public function deletecategory($id=null){		
      	$status = $this->categories_model->delete_category($id);
        if($status){
              $this->session->set_flashdata('successmsg', 'Category deleted successfully');
		}else{
            $this->session->set_flashdata('errormsg','There is some error deleting this category , action failed !'); 	
		}
        redirect(BASEURL.'/categories/'); 
	}
	public function changeStatus($status=0,$id=0){

        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
        $response=$this->categories_model->updatecategoriesStatus($updatearray,$id);
        if($response){
            $this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
        }else{
            $this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
        }
        redirect(BASEURL.'/categories/');
    }
	

	
	
	
	
	
}
