<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class manage_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('manageadmin_model');
		$this->load->helper('previlege_helper');
    }
	
    public function index() {
	    $data['getadmin']=$this->manageadmin_model->getadmins();
        $data["master_title"] = "Manage Your subadmin";   // Please enter the title of page......
        $data["master_body"] = "index";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme       		
    }
	public function add() {
		
		$value=$this->input->post();

	if(!empty($value))
			{ 
				
				$this->manageadmin_model->add($value);
				$last=$this->db->insert_id();
				$value['admin_id']=$last;$data['userdata'] = $this->session->userdata("userdata");
				$value['user_id'] = $data['userdata']['id'];
						//debug($update_data['id']);die;	
				$this->manageadmin_model->add_privilege($value);
							redirect(BASEURL.'/manage_admin');
			}
			
	    $data["master_title"] = "Manage Your subadmin";   // Please enter the title of page......
        $data["master_body"] = "add";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme       	
			}
	public function edit($id) {
		
		$value=$this->input->post();

	if(!empty($value))
			{ 
				$this->manageadmin_model->delete_prev($value['id']);
				$this->manageadmin_model->update($value);
				$data['userdata'] = $this->session->userdata("userdata");
				$value['user_id'] = $data['userdata']['id'];
						//debug($update_data['id']);die;	
				$this->manageadmin_model->update_privilege($value);
							redirect(BASEURL.'/manage_admin');
			}
			$data['admin']=$this->manageadmin_model->getadmin($id);
		//$data['admin_pre']=$this->manageadmin_model->get_previlege($id);
		//debug($data['admin_pre']);die;
	    $data["master_title"] = "Manage Your subadmin";   // Please enter the title of page......
        $data["master_body"] = "edit";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme       	
			}
	
	public function delete($id)
	{
		$status = $this->manageadmin_model->delete_admin($id);
			//debug($status);die;
        if($status=="true"){
			$status_prev = $this->manageadmin_model->delete_admin_prev($id);
			if($status_prev == "true")
			{
		  		 $this->session->set_flashdata('success_msg','category deleted successfully');
		   /* $result['result'] = 'success';
		      echo json_encode($result);
		      die;*/
			}else if($status_prev=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
		}else if($status=="false"){
            $this->session->set_flashdata('error_msg','There is some error deleting the Package'); 
			/* $result['result'] = 'failed';
		      echo json_encode($result);
		      die;	*/		
		}
       redirect(BASEURL.'/manage_admin');
	}
		
		
	
			     	
	
	
	
	  
}