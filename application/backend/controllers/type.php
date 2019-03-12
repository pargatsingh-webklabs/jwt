<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class type extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		
        $this->load->model('type_model');
       
        $data["typedata"]=$this->type_model->get_all_types();
        //echo "<pre>";print_r($data["typedata"]);echo "</pre>";
        $data["master_title"] = "Manage Types";
        $data["master_body"] = "index";   

	    $this->load->theme('mainlayout', $data);    	
    }
	public function add_type($id=null){		
	    $this->load->model('type_model');
		//echo "hello0";die;
		$type_data =  $this->input->post();
		if(!empty($type_data)){
		//echo "hello0";die;
		  $type_data['id'] = $id;
		  $this->type_model->update_type($type_data);
		  $result['result'] = 'success';
		  echo json_encode($result);
          die;
		}
        $data["typedata"]=$this->type_model->typeDetails($id);	    
        $data["master_title"] = "Edit Type";   // Please enter the title of page......
        $data["master_body"] = "edit_type";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme         
	}
	public function deletetype($id=null){		
	    $this->load->model('type_model');
      	$status = $this->type_model->delete_type($id);
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
        redirect(BASEURL.'/type/'); 
	}
	public function changeStatus($status=0,$id=0){
        $this->load->model('type_model');
        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
        $response=$this->type_model->updatetypeStatus($updatearray,$id);
        if($response){
            $this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
        }else{
            $this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
        }
        redirect(BASEURL.'/type/');
    }
	
}
