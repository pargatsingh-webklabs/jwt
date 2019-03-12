<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class postcard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('postcard_model');
        $this->load->model('addressbook_model');
        $this->load->model('billing_model');
        check_session_and_exit();
    }

    public function index() {
		$data["listLetters"] = $this->postcard_model->listPostcard();
		$data["master_title"] = "listpost";
        $data["master_body"] = "list_post";
    	$this->load->theme('mainlayout', $data);
		
    }
     public function deletePostcard($id=false){
		if(!empty($id)){
			$res = $this->postcard_model->deletePostcard($id);
			if($res)
				$this->session->set_flashdata('success', 'Postcard deleted Successfully');
			else
				$this->session->set_flashdata('error', 'Error while deleting Postcard.');
		}
		redirect(BASEURL.'/postcard');
	}
	public function cancelPostcard($id=false){
		if(!empty($id)){
			$res = $this->billing_model->getlobletterid($id,"postcard");
			try{
				require	(FCPATH . "../lib/vendor/autoload.php");
				$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
				$lob = new \Lob\Lob($LOB_API_KEY);
				$lobresponse = $lob->postcards()->delete($res['lob_letter_id']);
				if($lobresponse['deleted']){
					$update = $this->postcard_model->update_status($id);
					$CancelBilling = $this->billing_model->CancelBilling($res['id']);
				}
			}catch(Exception $e){
				$this->session->set_flashdata('error',  $e->getMessage());
				redirect(BASEURL.'/postcard');
			}
			
			if($update)
				$this->session->set_flashdata('success', 'Postcard Cancelled Successfully');
			else
				$this->session->set_flashdata('error', 'Error while cancelling Postcard.');
		}
		redirect(BASEURL.'/postcard');
	}
    public function create_post() {
		$data["listAddress"] = $this->addressbook_model->listAddress();
		$data["master_title"] = "create post";
        $data["master_body"] = "create_post";
    	$this->load->theme('mainlayout', $data);
		
    }

    function save(){
		$postData = $this->input->post();
		$id = $this->input->post('id');
		if(!empty($postData)){
			$To_address_id = '';
			$From_address_id = '';
			try{
				require	(FCPATH . "../lib/vendor/autoload.php");
				$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
				$lob = new \Lob\Lob($LOB_API_KEY);
				$To_address = $lob->addresses()->create(array(
					  //~ 'description'       => 'Harry - Office',
					  'name'              => $postData['To_name'],
					  'company'           => $postData['To_comapany'],
					  'address_line1'     => $postData['To_addressline1'],
					  'address_line2'     => $postData['To_addressline2'],
					  'address_city'      => $postData['To_city'],
					  'address_state'     => $postData['To_state'],
					  'address_country'   => $postData['To_country'],
					  'address_zip'       => $postData['To_zip']
					  //~ 'email'             => 'harry@lob.com',
					  //~ 'phone'             => '5555555555'
					));
				$To_address_id = $To_address["id"];
				$From_address = $lob->addresses()->create(array(
					  //~ 'description'       => 'Harry - Office',
					  'name'              => $postData['From_name'],
					  'company'           => $postData['From_comapany'],
					  'address_line1'     => $postData['From_addressline1'],
					  'address_line2'     => $postData['From_addressline2'],
					  'address_city'      => $postData['From_city'],
					  'address_state'     => $postData['From_state'],
					  'address_country'   => $postData['To_country'],
					  'address_zip'       => $postData['From_zip'],
					  //~ 'email'             => 'harry@lob.com',
					  //~ 'phone'             => '5555555555'
					));
				$From_address_id = $From_address["id"];
				
			}catch(Exception $e){
				$this->session->set_flashdata('error', $e->getMessage());
				redirect(BASEURL.'/postcard');
			}
			$lobArray = array(
			  'description'   => $postData['description'],
			  'to'            => $To_address_id,
			  'from'          => $From_address_id,
			  //~ 'front'         => '@'.realpath('/path/to/your/front.pdf'),
			  //~ 'back'          => '@'.realpath('/path/to/your/back.pdf'),
			);
			if(!empty($_FILES["front_file_name"])){
				$front_file_name = str_replace(' ', '-',$_FILES["front_file_name"]["name"]);
				$front_file_name = preg_replace('/[^A-Za-z0-9\-.]/', '',$front_file_name);
				move_uploaded_file($_FILES["front_file_name"]["tmp_name"],FCPATH.'../uploads/PostcardsFile/'.$front_file_name);
				$postData["front_file_name"] = $front_file_name;
				$lobArray['front'] = '@'.realpath(FCPATH.'../uploads/PostcardsFile/'.$front_file_name); 
				//~ $lobArray['front'] = '<html style="padding: 1in; font-size: 50;">Front HTML for gurvinder</html>'; 
			}
			//~ $lobArray['front'] = '<html style="padding: 1in; font-size: 50;">Front HTML for gurvinder</html>'; 
			if(!empty($_FILES["back_file_name"])){
				$back_file_name = str_replace(' ', '-',$_FILES["back_file_name"]["name"]);
				$back_file_name = preg_replace('/[^A-Za-z0-9\-.]/', '',$back_file_name);
				move_uploaded_file($_FILES["back_file_name"]["tmp_name"],FCPATH.'../uploads/PostcardsFile/'.$back_file_name);
				$postData["back_file_name"] = $back_file_name;
				$lobArray['back'] = '@'.realpath(FCPATH.'../uploads/PostcardsFile/'.$back_file_name); 
				//~ $lobArray['back'] = '<html style="padding: 1in; font-size: 20;">Back HTML for Pritpal</html>'; 
				
			}
			//~ $lobArray['back'] = '<html style="padding: 1in; font-size: 20;">Back HTML for Pritpal</html>';
			
			try{
				
				$lobresponse = $lob->postcards()->create($lobArray);
				$savelobresponse = array();
				$savelobresponse['lob_letter_id'] = $lobresponse['id'];
				$savelobresponse['description'] = $lobresponse['description'];
				$savelobresponse['To_addr_id '] = $lobresponse['to']['id'];
				$savelobresponse['From_addr_id '] = $lobresponse['from']['id'];
				$savelobresponse['url'] = $lobresponse['url'];
				$savelobresponse['send_date'] = $lobresponse['send_date'];
				$savelobresponse['expected_delivery_date'] = $lobresponse['expected_delivery_date'];
				$savelobresponse['mail_type'] = $lobresponse['object'];
				$savelobresponse['pages'] = 0;
				/**************** calculate charge ******************/
				$charge = '0.00';
				if($lobresponse['size']=="4x6"){
					$charge = '0.50';
				}else if($lobresponse['size']=="6x9"){
					$charge = '0.70';
				}else if($lobresponse['size']=="6x11"){
					$charge = '0.80';
				}else{
					$charge = '0.01';
				}
				$charge=number_format($charge,"2");
				/**************** calculate charge ******************/
				
				$savelobresponse['charges'] = $charge;
				//~ $delete = $lob->letters()->delete($lob_mail_id);
				//~ $data = $lob->letters()->get($lob_mail_id);
				//~ echo "<pre>";print_r($lobresponse);print_r($savelobresponse);
			}catch(Exception $e){
				$this->session->set_flashdata('error', $e->getMessage());
				redirect(BASEURL.'/postcard');
			}
			
			$res = $this->postcard_model->savePostcards($postData);
			if($res){
				$savelobresponse['letter_id'] = $res;
				//~ echo "<pre>";print_r($savelobresponse);
				$this->billing_model->saveBillings($savelobresponse);
				$this->session->set_flashdata('success', 'Postcard Updated Successfully');
			}else{
				$this->session->set_flashdata('error', 'Error while updating Postcard.');
			}
		}
		if($id)
		redirect(BASEURL.'/postcard/create_post/'.$id);
		redirect(BASEURL.'/postcard');
	}


}
