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
    	$this->load->layout('mainlayout', $data);
		
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
				require	(FCPATH . "lib/vendor/autoload.php");
				$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
				$lob = new \Lob\Lob($LOB_API_KEY);
				$lobresponse = $lob->postcards()->delete($res['lob_letter_id']);
				if($lobresponse['deleted']){
					$update = $this->postcard_model->update_status($id);
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
		$data["listGroups"] = $this->addressbook_model->listGroups();
		$data["listAddress"] = $this->addressbook_model->listAddress();
		$data["master_title"] = "create post";
        $data["master_body"] = "create_post";
    	$this->load->layout('mainlayout', $data);
		
    }
	function CalculateThisCharge($size){
				/**************** get config charge settings ******************/
				$POSTCARD_4x6_SIZE_CHARGE = getConfigSettingVariable('POSTCARD_4x6_SIZE_CHARGE');
				$POSTCARD_6x9_SIZE_CHARGE = getConfigSettingVariable('POSTCARD_6x9_SIZE_CHARGE');
				$POSTCARD_6x11_SIZE_CHARGE = getConfigSettingVariable('POSTCARD_6x11_SIZE_CHARGE');
				if(!$POSTCARD_4x6_SIZE_CHARGE)$POSTCARD_4x6_SIZE_CHARGE='0.00';
				if(!$POSTCARD_6x9_SIZE_CHARGE)$POSTCARD_6x9_SIZE_CHARGE='0.00';
				if(!$POSTCARD_6x11_SIZE_CHARGE)$POSTCARD_6x11_SIZE_CHARGE='0.00';
				/**************** get config charge settings ******************/
				/**************** calculate charge ******************/
				$charge = '0.00';
				if($size=="4x6"){
					//~ $charge = '0.50';
					$charge = $POSTCARD_4x6_SIZE_CHARGE;
				}else if($size=="6x9"){
					//~ $charge = '0.70';
					$charge = $POSTCARD_6x9_SIZE_CHARGE;
				}else if($size=="6x11"){
					//~ $charge = '0.80';
					$charge = $POSTCARD_6x11_SIZE_CHARGE;
				}else{
					$charge = '0.01';
				}
				$userdata=$this->session->userdata("userdata");
				if($userdata["lob_api_mode"]==="live"){
					$charge=number_format($charge,"2");
				}else{
					$charge = '0.00';
				}
				/**************** calculate charge ******************/
				return $charge;
	}
    function createLobMailAddress($postData,$lob){
		try{
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
		return $To_address_id = $To_address["id"];
		}catch(Exception $e){
			foreach($postData as $postKey => $postVal){
				$this->session->set_flashdata($postKey, $postVal);
			}
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(BASEURL.'/postcard/create_post');
		}
	}
    function save(){
		$postData = $this->input->post();
		$To_group_id = $this->input->post('To_group_id');
		if($To_group_id){
			if($To_group_id=='all'){
				$To_listAddress = $this->addressbook_model->getAllAddressByGroup();
			}else{
				$To_listAddress = $this->addressbook_model->getAllAddressByGroup($To_group_id);
			}
			/************** Upload File *****************/
			$lobData = array();
			if(!empty($_FILES["front_file_name"])){
				$front_file_name = str_replace(' ', '-',$_FILES["front_file_name"]["name"]);
				$front_file_name = preg_replace('/[^A-Za-z0-9\-.]/', '',$front_file_name);
				$ext = pathinfo($front_file_name, PATHINFO_EXTENSION);
				$fname_arr = explode(".".$ext,$front_file_name);
				$front_file_name = $fname_arr[0]."_".time().".".$ext;
				move_uploaded_file($_FILES["front_file_name"]["tmp_name"],FCPATH.'uploads/PostcardsFile/'.$front_file_name);
				$postData["front_file_name"] = $front_file_name;
				$lobData["front"] = '@'.realpath(FCPATH.'uploads/PostcardsFile/'.$front_file_name); 
				//~ $lobArray['front'] = '@'.realpath(FCPATH.'uploads/PostcardsFile/'.$front_file_name); 
				//~ $lobArray['front'] = '<html style="padding: 1in; font-size: 50;">Front HTML for gurvinder</html>'; 
			}
			if(!empty($_FILES["back_file_name"])){
				$back_file_name = str_replace(' ', '-',$_FILES["back_file_name"]["name"]);
				$back_file_name = preg_replace('/[^A-Za-z0-9\-.]/', '',$back_file_name);
				$ext = pathinfo($back_file_name, PATHINFO_EXTENSION);
				$fname_arr1 = explode(".".$ext,$back_file_name);
				$back_file_name = $fname_arr1[0]."_".time().".".$ext;
				move_uploaded_file($_FILES["back_file_name"]["tmp_name"],FCPATH.'uploads/PostcardsFile/'.$back_file_name);
				$postData["back_file_name"] = $back_file_name;
				$lobData["back"] = '@'.realpath(FCPATH.'uploads/PostcardsFile/'.$back_file_name); 
				//~ $lobArray['back'] = '@'.realpath(FCPATH.'uploads/PostcardsFile/'.$back_file_name); 
				
			}
			$ThisCharge = $this->CalculateThisCharge($postData['size']);
			$lobData["charge"] = $ThisCharge;
			$lob=null;
			try{
			require	(FCPATH . "lib/vendor/autoload.php");
			$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
			$lob = new \Lob\Lob($LOB_API_KEY);
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
			$lobData["From_address_id"] = $From_address_id;
			}catch(Exception $e){
				foreach($postData as $postKey => $postVal){
					$this->session->set_flashdata($postKey, $postVal);
				}
				$this->session->set_flashdata('error', "Creating From address,".$e->getMessage());
				redirect(BASEURL.'/postcard/create_post');
			}
			$sentsCnt = 0;
			unset($postData['To_group_id']);
			foreach($To_listAddress as $To_list):
				$postData['To_comapany'] = $To_list["comapany"];
				$postData['To_name'] = $To_list["name"];
				$postData['To_addressline1'] = $To_list["addressline1"];
				$postData['To_addressline2'] = $To_list["addressline2"];
				$postData['To_city'] = $To_list["city"];
				$postData['To_zip'] = $To_list["zip"];
				$postData['To_state'] = $To_list["state"];
				$postData['To_country'] = $To_list["country"];
				$To_address_id = $this->createLobMailAddress($postData,$lob);
				$lobData["To_address_id"] = $To_address_id;
				$this->createLettersOfGroup($postData,$lob,$lobData);
				$sentsCnt++;
			endforeach;
			$userdata=$this->session->userdata("userdata");
			$this->session->set_flashdata('success', $sentsCnt.' Postcards were added to the '.ucfirst($userdata["lob_api_mode"]).' Queue.');
			redirect(BASEURL.'/postcard/create_post');
			/************** Upload File *****************/
		}
		//~ debug($postData);
		//~ debug($_FILES);
		//~ die;
		$id = $this->input->post('id');
		if(!empty($postData)){
			$To_address_id = '';
			$From_address_id = '';
			try{
				require	(FCPATH . "lib/vendor/autoload.php");
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
				foreach($postData as $postKey => $postVal){
					$this->session->set_flashdata($postKey, $postVal);
				}
				$this->session->set_flashdata('error', $e->getMessage());
				redirect(BASEURL.'/postcard/create_post');
			}
			$lobArray = array(
			  'description'   => $postData['description'],
			  'to'            => $To_address_id,
			  'from'          => $From_address_id,
			  'size'          => $postData['size'],
			  //~ 'front'         => '@'.realpath('/path/to/your/front.pdf'),
			  //~ 'back'          => '@'.realpath('/path/to/your/back.pdf'),
			);
			//~ if(empty($_FILES["front_file_name"]) && !empty($postData['url_front_file_name'])){
				//~ $lobArray['front'] = $postData['url_front_file_name'];
			//~ }
			//~ if(empty($_FILES["back_file_name"]) && !empty($postData['url_back_file_name'])){
				//~ $lobArray['back'] = $postData['url_back_file_name'];
			//~ }
			if(!empty($_FILES["front_file_name"])){
				$front_file_name = str_replace(' ', '-',$_FILES["front_file_name"]["name"]);
				$front_file_name = preg_replace('/[^A-Za-z0-9\-.]/', '',$front_file_name);
				$ext = pathinfo($front_file_name, PATHINFO_EXTENSION);
				$fname_arr = explode(".".$ext,$front_file_name);
				$front_file_name = $fname_arr[0]."_".time().".".$ext;
				move_uploaded_file($_FILES["front_file_name"]["tmp_name"],FCPATH.'uploads/PostcardsFile/'.$front_file_name);
				$postData["front_file_name"] = $front_file_name;
				$lobArray['front'] = '@'.realpath(FCPATH.'uploads/PostcardsFile/'.$front_file_name); 
				//~ $lobArray['front'] = '<html style="padding: 1in; font-size: 50;">Front HTML for gurvinder</html>'; 
			}
			//~ $lobArray['front'] = '<html style="padding: 1in; font-size: 50;">Front HTML for gurvinder</html>'; 
			if(!empty($_FILES["back_file_name"])){
				$back_file_name = str_replace(' ', '-',$_FILES["back_file_name"]["name"]);
				$back_file_name = preg_replace('/[^A-Za-z0-9\-.]/', '',$back_file_name);
				$ext = pathinfo($back_file_name, PATHINFO_EXTENSION);
				$fname_arr1 = explode(".".$ext,$back_file_name);
				$back_file_name = $fname_arr1[0]."_".time().".".$ext;
				move_uploaded_file($_FILES["back_file_name"]["tmp_name"],FCPATH.'uploads/PostcardsFile/'.$back_file_name);
				$postData["back_file_name"] = $back_file_name;
				$lobArray['back'] = '@'.realpath(FCPATH.'uploads/PostcardsFile/'.$back_file_name); 
				
			}else{
				//~ $lobArray['back'] = '<html style="padding: 1in; font-size: 20;">'.SITE_NAME.'</html>'; 
			}
			
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
				
				/**************** get config charge settings ******************/
				$POSTCARD_4x6_SIZE_CHARGE = getConfigSettingVariable('POSTCARD_4x6_SIZE_CHARGE');
				$POSTCARD_6x9_SIZE_CHARGE = getConfigSettingVariable('POSTCARD_6x9_SIZE_CHARGE');
				$POSTCARD_6x11_SIZE_CHARGE = getConfigSettingVariable('POSTCARD_6x11_SIZE_CHARGE');
				if(!$POSTCARD_4x6_SIZE_CHARGE)$POSTCARD_4x6_SIZE_CHARGE='0.00';
				if(!$POSTCARD_6x9_SIZE_CHARGE)$POSTCARD_6x9_SIZE_CHARGE='0.00';
				if(!$POSTCARD_6x11_SIZE_CHARGE)$POSTCARD_6x11_SIZE_CHARGE='0.00';
				/**************** get config charge settings ******************/
				/**************** calculate charge ******************/
				$charge = '0.00';
				if($lobresponse['size']=="4x6"){
					//~ $charge = '0.50';
					$charge = $POSTCARD_4x6_SIZE_CHARGE;
				}else if($lobresponse['size']=="6x9"){
					//~ $charge = '0.70';
					$charge = $POSTCARD_6x9_SIZE_CHARGE;
				}else if($lobresponse['size']=="6x11"){
					//~ $charge = '0.80';
					$charge = $POSTCARD_6x11_SIZE_CHARGE;
				}else{
					$charge = '0.01';
				}
				$userdata=$this->session->userdata("userdata");
				if($userdata["lob_api_mode"]==="live"){
					$charge=number_format($charge,"2");
					$sent_status=1;
				}else{
					$charge = '0.00';
					$sent_status = 2;
				}
				/**************** calculate charge ******************/
				
				$savelobresponse['charges'] = $charge;
				$savelobresponse['sent_status'] = $sent_status;

				//~ $delete = $lob->letters()->delete($lob_mail_id);
				//~ $data = $lob->letters()->get($lob_mail_id);
				//~ echo "<pre>";print_r($lobresponse);print_r($savelobresponse);
			}catch(Exception $e){
				foreach($postData as $postKey => $postVal){
					$this->session->set_flashdata($postKey, $postVal);
				}
				$this->session->set_flashdata('error', $e->getMessage());
				redirect(BASEURL.'/postcard/create_post');
			}
			$userdata=$this->session->userdata("userdata");
			$postData["user_id"] = $userdata["id"];
			unset($postData["To_selectContact"]); 
			unset($postData["From_selectContact"]); 
			$res = $this->postcard_model->savePostcards($postData);
			if($res){
				$savelobresponse['letter_id'] = $res;
				$savelobresponse['user_id'] = $userdata["id"];
				//~ echo "<pre>";print_r($savelobresponse);
				$this->billing_model->saveBillings($savelobresponse);
				$userdata=$this->session->userdata("userdata");
										
				$this->session->set_flashdata('success', 'Postcard Added To '.ucfirst($userdata["lob_api_mode"]).' Queue.');
			}else{
				$this->session->set_flashdata('error', 'Error while updating Postcard.');
			}
		}
		//~ if($id)
		//~ redirect(BASEURL.'/postcard/create_post/'.$id);
		//~ redirect(BASEURL.'/postcard');
		redirect(BASEURL.'/postcard/create_post');
	}
	function createLettersOfGroup($postData,$lob,$lobData){
		if(!empty($postData)){
			$lobArray = array(
			  'description'   => $postData['description'],
			  'to'            => $lobData["To_address_id"],
			  'from'          => $lobData["From_address_id"],
			  'size'          => $postData['size'],
			  'front'         => $lobData["front"],
			  'back'          => $lobData['back'],
			);
				
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
				$savelobresponse['charges'] = $lobData["charge"];
				//~ $delete = $lob->letters()->delete($lob_mail_id);
				//~ $data = $lob->letters()->get($lob_mail_id);
				//~ echo "<pre>";print_r($lobresponse);print_r($savelobresponse);
			}catch(Exception $e){
					foreach($postData as $postKey => $postVal){
						$this->session->set_flashdata($postKey, $postVal);
					}
					$this->session->set_flashdata('error',  "Error postcard to ".$postData['To_name'].", ".$e->getMessage());
					redirect(BASEURL.'/postcard/create_post');
					//~ continue;
			}
			$userdata=$this->session->userdata("userdata");
			$postData["user_id"] = $userdata["id"];
			unset($postData["To_selectContact"]); 
			unset($postData["From_selectContact"]); 
			$res = $this->postcard_model->savePostcards($postData);
			if($res){
				if($userdata["lob_api_mode"]==="live"){
					$sent_status = 1;
				}else{
					$sent_status = 2;
				}
				$savelobresponse['sent_status'] = $sent_status;
				$savelobresponse['letter_id'] = $res;
				$savelobresponse['user_id'] = $userdata["id"];
				//~ echo "<pre>";print_r($savelobresponse);
				$this->billing_model->saveBillings($savelobresponse);
				//~ $userdata=$this->session->userdata("userdata");
				//~ $this->session->set_flashdata('success', 'Postcard Added To '.ucfirst($userdata["lob_api_mode"]).' Queue.');
			}else{
				$this->session->set_flashdata('error', 'Error while saving Postcard of '.$postData['To_name'].", ");
				redirect(BASEURL.'/postcard/create_post');
			}
		}

	}

}
