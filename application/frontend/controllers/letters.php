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
	function getNumPagesPdf($filepath){
	   $fp = @fopen(preg_replace("/\[(.*?)\]/i", "",$filepath),"r");
	   $max=0;
	   while(!feof($fp)) {
			   $line = fgets($fp,255);
			   if (preg_match('/\/Count [0-9]+/', $line, $matches)){
					   preg_match('/[0-9]+/',$matches[0], $matches2);
					   if ($max<$matches2[0]) $max=$matches2[0];
			   }
	   }
	   fclose($fp);
	   return $max;
	}
	
	function Gurvinder(){
		echo FCPATH.'uploads/lettersFile/';
		var_dump(file_exists(FCPATH.'uploads/lettersFile/TPMSFoldPanelCard625x925inside.pdf'));
		try{
		echo "<br>",$this->getNumPagesPdf(FCPATH.'uploads/lettersFile/Statement-582_1535441663.pdf');
		}catch(Exception $e){
			echo $e->getMessage();
			 
		}
		echo "<br>",$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
		$userdata = $this->session->userdata('userdata');
		$userdata2 = $this->session->userdata;
		debug($userdata);//die;
		debug($userdata2);//die;
		die("hello");
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
    	$this->load->layout('mainlayout', $data);
		
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
				require	(FCPATH . "lib/vendor/autoload.php");
				$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
				$lob = new \Lob\Lob($LOB_API_KEY);
				$lobresponse = $lob->letters()->delete($res['lob_letter_id']);
				if($lobresponse['deleted']){
					$update = $this->letters_model->update_status($id);
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
		$data["listGroups"] = $this->addressbook_model->listGroups();
		$data["listAddress"] = $this->addressbook_model->listAddress();
		$data["master_title"] = "Create Letters";
        $data["master_body"] = "create_letters";
    	$this->load->layout('mainlayout', $data);
		
    }
	function CalculateThisCharge($Pages){
		/**************** calculate charge ******************/
				$charge = '0.00';
				if($postData['color']=="true"){
					$LETTER_PER_PAGE_CHARGE = getConfigSettingVariable('Letter_Per_Page_Color_Charge');
					$LETTER_MULTIPLE_PAGE_CHARGE = getConfigSettingVariable('Letter_Multiple_Page_Color_Charge');
				}else{
					$LETTER_PER_PAGE_CHARGE = getConfigSettingVariable('LETTER_PER_PAGE_CHARGE');
					$LETTER_MULTIPLE_PAGE_CHARGE = getConfigSettingVariable('LETTER_MULTIPLE_PAGE_CHARGE');
				}
				if(!$LETTER_PER_PAGE_CHARGE)$LETTER_PER_PAGE_CHARGE='0.00';
				if(!$LETTER_MULTIPLE_PAGE_CHARGE)$LETTER_MULTIPLE_PAGE_CHARGE='0.00';
				//~ $per_page_charge	  = '0.90';
				//~ $multiple_page_charge = '0.15';
				$per_page_charge	  = $LETTER_PER_PAGE_CHARGE;
				$multiple_page_charge = $LETTER_MULTIPLE_PAGE_CHARGE;
				if($Pages==1){
					$charge=$per_page_charge;
				}else if($Pages>1){
					$charge=$per_page_charge;
					for($i=1;$i<$Pages;$i++){
						$charge+=$multiple_page_charge;
					}
				}
				$userdata=$this->session->userdata("userdata");
				if($userdata["lob_api_mode"]==="live"){
					$charge=number_format($charge,"2");
				}else{
					$charge = '0.00';
				}
				return $charge;
				/**************** calculate charge ******************/
				
	}
	function save(){
		ob_start();
		$postData = $this->input->post();
		$To_group_id = $this->input->post('To_group_id');
		if($To_group_id){
			if($To_group_id=='all'){
				$To_listAddress = $this->addressbook_model->getAllAddressByGroup();
			}else{
				$To_listAddress = $this->addressbook_model->getAllAddressByGroup($To_group_id);
			}
			/************** Upload File *****************/
			
			if(!empty($_FILES)){
				$fname = str_replace(' ', '-',$_FILES["file"]["name"]);
				$fname = preg_replace('/[^A-Za-z0-9\-.]/', '',$fname);
				$ext = pathinfo($fname, PATHINFO_EXTENSION);
				$fname_arr = explode(".".$ext,$fname);
				$fname = $fname_arr[0]."_".time().".".$ext;
				move_uploaded_file($_FILES["file"]["tmp_name"],FCPATH.'uploads/lettersFile/'.$fname);
				$postData["file_name"] = $fname;
				$lobArrayFilePath = '@'.realpath(FCPATH.'uploads/lettersFile/'.$fname); 
				//~ $lobArray['file'] = '<html style="padding: 1in; font-size: 20;">Back HTML for Pritpal</html>'; 
			}
			
			/************** Upload File *****************/
			
			$Pages = $this->getNumPagesPdf(FCPATH.'uploads/lettersFile/'.$fname);
			$ThisCharge = $this->CalculateThisCharge($Pages);
			require	(FCPATH . "lib/vendor/autoload.php");
			$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
			$lob = new \Lob\Lob($LOB_API_KEY);
			unset($postData['To_group_id']);
			$sentsCnt = 0;
			foreach($To_listAddress as $To_list):
				$postData['To_comapany'] = $To_list["comapany"];
				$postData['To_name'] = $To_list["name"];
				$postData['To_addressline1'] = $To_list["addressline1"];
				$postData['To_addressline2'] = $To_list["addressline2"];
				$postData['To_city'] = $To_list["city"];
				$postData['To_zip'] = $To_list["zip"];
				$postData['To_state'] = $To_list["state"];
				$postData['To_country'] = $To_list["country"];
				$this->createLettersOfGroup($postData,$lobArrayFilePath,$Pages,$lob,$ThisCharge);
				$sentsCnt++;
			endforeach;
			$userdata=$this->session->userdata("userdata");
			$this->session->set_flashdata('success', $sentsCnt.' Letters were added to the '.ucfirst($userdata["lob_api_mode"]).' Queue.');
			//~ $this->session->set_flashdata('success', 'Letters  Added To '.ucfirst($userdata["lob_api_mode"]).' Queue.');
			redirect(BASEURL.'/letters/create_letters');
		}
		//~ debug($postData);
		//~ debug($_FILES);
		//~ die;
		
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
				  'color'                 => $postData['color']
				  //~ 'double_sided'                 => (($postData['double_sided'])?true:false),
				  //~ 'address_placement'=>"insert_blank_page",
				  //~ 'return_envelope' => true,
				  //~ 'perforated_page' => 1
				);
			//~ if(isset($postData['address_placement'])){
				$lobArray['address_placement'] = "insert_blank_page";
			//~ }
			//~ if(empty($_FILES) && !empty($postData['direct_url'])){
				//~ $lobArray['file'] = $postData['direct_url'];
			//~ }
			//~ if(!empty($_FILES) && empty($postData['direct_url'])){
			if(!empty($_FILES)){
				$fname = str_replace(' ', '-',$_FILES["file"]["name"]);
				$fname = preg_replace('/[^A-Za-z0-9\-.]/', '',$fname);
				$ext = pathinfo($fname, PATHINFO_EXTENSION);
				$fname_arr = explode(".".$ext,$fname);
				$fname = $fname_arr[0]."_".time().".".$ext;
				move_uploaded_file($_FILES["file"]["tmp_name"],FCPATH.'uploads/lettersFile/'.$fname);
				$postData["file_name"] = $fname;
				$lobArray['file'] = '@'.realpath(FCPATH.'uploads/lettersFile/'.$fname); 
				//~ $lobArray['file'] = '<html style="padding: 1in; font-size: 20;">Back HTML for Pritpal</html>'; 
			}
				
				
			try{
				$Pages = $this->getNumPagesPdf(FCPATH.'uploads/lettersFile/'.$fname);
				require	(FCPATH . "lib/vendor/autoload.php");
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
				$savelobresponse['pages'] = $Pages;
				/**************** calculate charge ******************/
				$charge = '0.00';
				if($postData['color']=="true"){
					$LETTER_PER_PAGE_CHARGE = getConfigSettingVariable('Letter_Per_Page_Color_Charge');
					$LETTER_MULTIPLE_PAGE_CHARGE = getConfigSettingVariable('Letter_Multiple_Page_Color_Charge');
				}else{
					$LETTER_PER_PAGE_CHARGE = getConfigSettingVariable('LETTER_PER_PAGE_CHARGE');
					$LETTER_MULTIPLE_PAGE_CHARGE = getConfigSettingVariable('LETTER_MULTIPLE_PAGE_CHARGE');
				}
				if(!$LETTER_PER_PAGE_CHARGE)$LETTER_PER_PAGE_CHARGE='0.00';
				if(!$LETTER_MULTIPLE_PAGE_CHARGE)$LETTER_MULTIPLE_PAGE_CHARGE='0.00';
				//~ $per_page_charge	  = '0.90';
				//~ $multiple_page_charge = '0.15';
				$per_page_charge	  = $LETTER_PER_PAGE_CHARGE;
				$multiple_page_charge = $LETTER_MULTIPLE_PAGE_CHARGE;
				if($Pages==1){
					$charge=$per_page_charge;
				}else if($Pages>1){
					$charge=$per_page_charge;
					for($i=1;$i<$Pages;$i++){
						$charge+=$multiple_page_charge;
					}
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
					$this->session->set_flashdata('error',  $e->getMessage());
					//~ if($id)
					//~ redirect(BASEURL.'/letters/create_letters/'.$id);
					//~ redirect(BASEURL.'/letters');
					redirect(BASEURL.'/letters/create_letters');
			}
			$userdata=$this->session->userdata("userdata");
			unset($postData["To_selectContact"]); 
			unset($postData["From_selectContact"]); 
			unset($postData["color"]); 
			$postData["user_id"] = $userdata["id"];
			$res = $this->letters_model->saveletters($postData);	
			if($res){
				$savelobresponse['letter_id'] = $res;
				$savelobresponse['user_id'] = $userdata["id"];
				$this->billing_model->saveBillings($savelobresponse);
				$this->session->set_flashdata('success', 'Letter  Added To '.ucfirst($userdata["lob_api_mode"]).' Queue.');
			}else{
				$this->session->set_flashdata('error', 'Error while updating Letter.');
			}
		}
		
		//~ if($id)
		//~ redirect(BASEURL.'/letters/create_letters/'.$id);
		redirect(BASEURL.'/letters/create_letters');
		//~ redirect(BASEURL.'/letters');
	}
	function createLettersOfGroup($postData,$lobArrayFilePath,$Pages,$lob,$charge){
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
				  'file'                  => $lobArrayFilePath,
				  'color'                 => $postData['color']
				);
				$lobArray['address_placement'] = "insert_blank_page";
				
			try{
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
				$savelobresponse['pages'] = $Pages;
				$savelobresponse['charges'] = $charge;
				//~ $delete = $lob->letters()->delete($lob_mail_id);
				//~ $data = $lob->letters()->get($lob_mail_id);
				//~ echo "<pre>";print_r($lobresponse);print_r($savelobresponse);
			}catch(Exception $e){
					foreach($postData as $postKey => $postVal){
						$this->session->set_flashdata($postKey, $postVal);
					}
					$this->session->set_flashdata('error',  "Error letter to ".$postData['To_name'].", ".$e->getMessage());
					redirect(BASEURL.'/letters/create_letters');
					//~ continue;
			}
			$userdata=$this->session->userdata("userdata");
			unset($postData["To_selectContact"]); 
			unset($postData["From_selectContact"]); 
			unset($postData["color"]); 
			$postData["user_id"] = $userdata["id"];
			$res = $this->letters_model->saveletters($postData);	
			if($res){
				if($userdata["lob_api_mode"]==="live"){
					$sent_status = 1;
				}else{
					$sent_status = 2;
				}
				$savelobresponse['sent_status'] = $sent_status;
				$savelobresponse['letter_id'] = $res;
				$savelobresponse['user_id'] = $userdata["id"];
				$this->billing_model->saveBillings($savelobresponse);
				//~ $this->session->set_flashdata('success', 'Letters  Added To '.ucfirst($userdata["lob_api_mode"]).' Queue.');
			}else{
				$this->session->set_flashdata('error', 'Error while updating Letter. To '.$postData['To_name']);
				redirect(BASEURL.'/letters/create_letters');
			}
			//~ return $getMsg;
		}

	}

}
