<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class payment_gateway extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {	
        $this->load->model('payment_gateway_model');
        $data["payment_gatewaydata"]=$this->payment_gateway_model->get_all_payment_gateways();
        $data["master_title"] = "Manage Payment Gateway";
        $data["master_body"] = "index";   
	$this->load->theme('mainlayout', $data);    	
    }

    public function add_payment_gateway($id=null){		
	    $this->load->model('payment_gateway_model');
		$payment_gateway_data =  $this->input->post();
		if(!empty($payment_gateway_data)){
		  $payment_gateway_data['id'] = $id;
		  $this->payment_gateway_model->update_payment_gateway($payment_gateway_data);
		  $result['result'] = 'success';
		  echo json_encode($result);
                  die;
		}
        $data["payment_gatewaydata"]=$this->payment_gateway_model->payment_gatewayDetails($id);	    
        $data["master_title"] = "Edit Payment Gateway";   // Please enter the title of page......
        $data["master_body"] = "edit_payment_gateway";   // Please enter the body of page......
        $this->load->theme('mainlayout', $data);  // Loading theme         
	}
	public function deletepayment_gateway($id=null){		
	    $this->load->model('payment_gateway_model');
      	$status = $this->payment_gateway_model->delete_payment_gateway($id);
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
        redirect(BASEURL.'/payment_gateway/'); 
   }

   public function changeStatus($status=0,$id=0){
        $this->load->model('payment_gateway_model');
        $updatearray["status"]=$status;
        $statusstring=($status==0)?"Deactivated":"Activated";
        $response=$this->payment_gateway_model->updatepayment_gatewayStatus($updatearray,$id);
        if($response){
            $this->session->set_flashdata('success_msg','User '.$statusstring.' successfully');
        }else{
            $this->session->set_flashdata('error_msg','There is some error '.$statusstring.' the user');
        }
        redirect(BASEURL.'/payment_gateway/');
    }


	
}
