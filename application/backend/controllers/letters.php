<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class letters extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('letters_model');
        $this->load->model('addressbook_model');
        $this->load->model('billing_model');
        check_session_and_exit();
    }

	function Gurvinder(){
		echo FCPATH;die;
		$userdata = $this->session->userdata('userdata');
		debug($userdata);//die;
		try{
			require FCPATH.APPPATH.'libraries/Stripe/init.php';
			\Stripe\Stripe::setApiKey("sk_test_EgwjzSAZLxnWApfydpzAANe1");
			$Customers = \Stripe\Customer::all();
			$CustomerExist = 0;
			$CustomerId ="";
			echo "<pre>";print_r($Customers->data);
			if(!empty($Customers->data)){
				foreach(@$Customers->data as $CustomersData){
					if($CustomersData["email"]==$userdata["email"]){
						$CustomerId =$CustomersData["id"];
						$CustomerExist =1;
					}
				}
			}
			if(!$CustomerExist){
				
			}
				
		}catch(Exception $e){
			$res["error"] = $e->getMessage();
			echo "<pre>";print_r($res);
		}


	}
    public function index() {
		$data["listLetters"] = $this->letters_model->listLetters();
		$data["master_title"] = "List letters";
        $data["master_body"] = "list_letters";
    	$this->load->theme('mainlayout', $data);
		
    }
    public function deleteLetter($id=false){
		if(!empty($id)){
			$res = $this->letters_model->deleteLetter($id);
			if($res)
				$this->session->set_flashdata('success', 'Letter deleted Successfully');
			else
				$this->session->set_flashdata('error', 'Error while deleting Letter.');
		}
		redirect(BASEURL.'/letters');
	}
	
    public function cancelletter($id=false){
		if(!empty($id)){
			$res = $this->billing_model->getlobletterid($id,"letter");
			try{
				require	(FCPATH . "../lib/vendor/autoload.php");
				$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
				$lob = new \Lob\Lob($LOB_API_KEY);
				$lobresponse = $lob->letters()->delete($res['lob_letter_id']);
				if($lobresponse['deleted']){
					$update = $this->letters_model->update_status($id);
					$CancelBilling = $this->billing_model->CancelBilling($res['id']);
				}
			}catch(Exception $e){
				$this->session->set_flashdata('error',  $e->getMessage());
				redirect(BASEURL.'/letters');
			}
			
			if($update)
				$this->session->set_flashdata('success', 'Letter Cancelled Successfully');
			else
				$this->session->set_flashdata('error', 'Error while cancelling Letter.');
		}
		redirect(BASEURL.'/letters');
	}
	
    public function create_letters() {
		$data["listAddress"] = $this->addressbook_model->listAddress();
		$data["master_title"] = "Create Letters";
        $data["master_body"] = "create_letters";
    	$this->load->theme('mainlayout', $data);
		
    }
	function save(){
		$postData = $this->input->post();
		$id = $this->input->post('id');
		if(!empty($postData)){
			$lobArray = array(
				  'description'           => $postData['description'],
				  'to[company]'           => $postData['To_comapany'],
				  'to[name]'              => $postData['To_name'],
				  //~ 'to[email]'              => $postData['To_name'],
				  //~ 'to[phone]'              => $postData['To_name'],
				  'to[address_line1]'     => $postData['To_addressline1'],
				  'to[address_line2]'     => $postData['To_addressline2'],
				  'to[address_city]'      => $postData['To_city'],
				  'to[address_zip]'       => $postData['To_zip'],
				  'to[address_state]'     => $postData['To_state'],
				  'to[address_country]'   => $postData['To_country'],
				  'from[name]'            => $postData['From_name'],
				  'from[company]'         => $postData['From_comapany'],
				  'from[address_line1]'   => $postData['From_addressline1'],
				  'from[address_line2]'   => $postData['From_addressline2'],
				  'from[address_city]'    => $postData['From_city'],
				  'from[address_zip]'     => $postData['From_zip'],
				  'from[address_state]'   => $postData['From_state'],
				  'from[address_country]' => $postData['From_country'],
				  //~ 'file'                  => '@'.realpath(FCPATH.'uploads/lettersFile/johnsmith.png'),
				  'color'                 => true,
				  'address_placement'=>"insert_blank_page",
				  'return_envelope' => true,
				  'perforated_page' => 1
				);
			if(!empty($_FILES)){
				$fname = str_replace(' ', '-',$_FILES["file"]["name"]);
				$fname = preg_replace('/[^A-Za-z0-9\-.]/', '',$fname);
				//~ move_uploaded_file($_FILES["file"]["tmp_name"],FCPATH.'uploads/lettersFile/'.$fname);
				$postData["file_name"] = $fname;
				$lobArray['file'] = '@'.realpath(FCPATH.'../uploads/lettersFile/'.$fname); 
				//~ $lobArray['file'] = '<html style="padding: 1in; font-size: 20;">Back HTML for Pritpal</html>'; 
			}
				
				
			try{
				require	(FCPATH . "../lib/vendor/autoload.php");
				$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
				$lob = new \Lob\Lob($LOB_API_KEY);
				$lobresponse = $lob->letters()->create($lobArray);
				$savelobresponse = array();
				$savelobresponse['lob_letter_id'] = $lobresponse['id'];
				$savelobresponse['description'] = $lobresponse['description'];
				$savelobresponse['To_addr_id '] = $lobresponse['to']['id'];
				$savelobresponse['From_addr_id '] = $lobresponse['from']['id'];
				$savelobresponse['url'] = $lobresponse['url'];
				$savelobresponse['send_date'] = $lobresponse['send_date'];
				$savelobresponse['expected_delivery_date'] = $lobresponse['expected_delivery_date'];
				$savelobresponse['mail_type'] = $lobresponse['object'];
				$savelobresponse['pages'] = $lobresponse['perforated_page'];
				/**************** calculate charge ******************/
				$charge = '0.00';
				$per_page_charge	  = '0.90';
				$multiple_page_charge = '0.15';
				if($lobresponse['perforated_page']==1){
					$charge=$per_page_charge;
				}else if($lobresponse['perforated_page']>1){
					$charge=$per_page_charge;
					for($i=1;$i<$lobresponse['perforated_page'];$i++){
						$charge+=$multiple_page_charge;
					}
				}
				$charge=number_format($charge,"2");
				/**************** calculate charge ******************/
				
				$savelobresponse['charges'] = $charge;
				//~ $delete = $lob->letters()->delete($lob_mail_id);
				//~ $data = $lob->letters()->get($lob_mail_id);
				//~ echo "<pre>";print_r($lobresponse);print_r($savelobresponse);
			}catch(Exception $e){
					$this->session->set_flashdata('error',  $e->getMessage());
					if($id)
					redirect(BASEURL.'/letters/create_letters/'.$id);
					redirect(BASEURL.'/letters');
			}
			$res = $this->letters_model->saveletters($postData);	
			if($res){
				$savelobresponse['letter_id'] = $res;
				$this->billing_model->saveBillings($savelobresponse);
				$this->session->set_flashdata('success', 'Letter Updated Successfully');
			}else{
				$this->session->set_flashdata('error', 'Error while updating Letter.');
			}
		}
		
		if($id)
		redirect(BASEURL.'/letters/create_letters/'.$id);
		redirect(BASEURL.'/letters');
	}
	

}
