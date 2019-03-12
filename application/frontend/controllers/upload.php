<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('letters_model');
        $this->load->model('upload_model');
        $this->load->model('addressbook_model');
        check_session_and_exit();
    }

	function Gurvinder(){
		echo $LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
		$userdata = $this->session->userdata('userdata');
		debug($userdata);//die;
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
		$data["listFiles"] = $this->upload_model->listFiles();
		$data["master_title"] = "Upload";
        $data["master_body"] = "list";
    	$this->load->layout('mainlayout', $data);
		
    }
    public function deleteLetter($id=false){
		if(!empty($id)){
				$getFile = $this->upload_model->getFile($id);
				$fname = $getFile["file_name"];
				$filepath = FCPATH.'uploads/addressFiles/'.$fname;
				unlink($filepath);
			$res = $this->upload_model->deleteLetter($id);
			if($res){
				$res = $this->addressbook_model->deleteAddressesOfSheet($id);
				$this->session->set_flashdata('success', 'File deleted Successfully');
			}else{
				$this->session->set_flashdata('error', 'Error while deleting File.');
			}
		}
		redirect(BASEURL.'/upload');
	}
	
    public function downloadFile($id=false){
		$fname = "sampleCsvFile.csv";
		if(!empty($id)){
			$res = $this->upload_model->getFile($id);
			$fname = $res["file_name"];
		}
		$filepath = FCPATH.'uploads/addressFiles/'.$fname;
		if(file_exists($filepath)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($filepath));
			flush(); // Flush system output buffer
			readfile($filepath);
			exit;
		 }
		die("<h3>Oops Something went wrong.Please try Again after some times <a href='".BASEURL.'/upload'."'>Go Back</a></h3>");
	}
	
	function csv_to_array($fname=null) {
		$all_rows = array();
	    $header = null;
	   if (($handle = fopen($fname, "r")) !== FALSE) {
			while (($data = fgetcsv($handle)) !== FALSE) {
				if ($header === null) {
				   $header = $data;
				   continue;
				}
				$all_rows[] = array_combine($header, $data);
			}
		  fclose($handle);
		}
	   return $all_rows;
	}
	
	function addGroupContact($group_name=false){
		$group_exist = $this->upload_model->checkGroupExist($group_name);
		if(count($group_exist)>0) return $group_exist["id"];
		return $this->upload_model->addGroupContact($group_name);
	}
	function save(){
		$uploadDone = false;
		$skip = 0;
		$postData = array();
		if(!empty($_FILES)){
			if($_FILES["importfile"]["type"]!="text/csv" && $_FILES["importfile"]["type"]!="application/vnd.ms-excel"){
				$this->session->set_flashdata('error', 'File type must be text/csv or application/vnd.ms-excel.');
				redirect(BASEURL.'/upload');
			}
			/******** Add New Group ********/
			$group_id = null;
			$group_name = $this->input->post('group_name');
			if(!empty($group_name)){
				$group_id = $this->addGroupContact(trim($group_name));
			}
			/******** Add New Group ********/
			$fname = str_replace(' ', '-',$_FILES["importfile"]["name"]);
			$fname = preg_replace('/[^A-Za-z0-9\-.]/', '',$fname);
			$ext = pathinfo($fname, PATHINFO_EXTENSION);
			$fname_arr = explode(".".$ext,$fname);
			$fname = $fname_arr[0]."_".time().".".$ext;
			$uploadDone = move_uploaded_file($_FILES["importfile"]["tmp_name"],FCPATH.'uploads/addressFiles/'.$fname);
			$postData["file_name"] = $fname;
			$postData["type"] = $_FILES["importfile"]["type"];
		
			if(!$uploadDone){
				$this->session->set_flashdata('error', 'File cannot uploaded successfully.please try later.');
				redirect(BASEURL.'/upload');
			}
			$userdata=$this->session->userdata("userdata");
			$postData["user_id"] = $userdata["id"];
			$postData["group_id"] = $group_id;
			$uploadDoneRes = $this->upload_model->saveletters($postData);	
			$csvArrary = $this->csv_to_array(FCPATH.'uploads/addressFiles/'.$fname);
			$totalrecords = count($csvArrary);
			//~ debug($csvArrary);die;
			
			$userdata=$this->session->userdata("userdata");
			$user_id = $userdata["id"];
			foreach($csvArrary as $data_arr){
				$saveArray = array();
				if(empty($data_arr['Name'])){$skip++;continue;}
				if(empty($data_arr['Addressline1'])){$skip++;continue;}
				if(empty($data_arr['State'])){$skip++;continue;}
				$saveArray = array(
				  'user_id'      => $user_id,
				  'comapany'      => $data_arr['Company'],
				  'name'          => $data_arr['Name'],
				  'email'         => $data_arr['Email'],
				  'phone_no'      => $data_arr['Phone'],
				  'addressline1'  => $data_arr['Addressline1'],
				  'addressline2'  => $data_arr['Addressline2'],
				  'city'      => $data_arr['City'],
				  'zip'       => $data_arr['Zip'],
				  'state'     => $data_arr['State'],
				  'group_id'   => $group_id,
				  'imported_file_id'   => $uploadDoneRes,
				  'created'   => time()
				 );
				 
				$res = $this->addressbook_model->saveaddress($saveArray);
			}
			$this->upload_model->update_status($uploadDoneRes,($totalrecords-$skip));
			if(($totalrecords-$skip)>0){
				$this->session->set_flashdata('success', ($totalrecords-$skip)."/$totalrecords records inserted successfully.");
			}else{
				if(($totalrecords-$skip)==0 && @$totalrecords>0 && @$skip>0){
					$this->session->set_flashdata('error', 'Structure for the file mismatch. Please use <a href="'.BASEURL.'/upload/downloadFile">sample file</a> structure and make sure (Name,Addressline1,State) are mandatory.');
				}else{
					$this->session->set_flashdata('error', ' Error: File should be correct format.');
				}
			}
		}
		
		redirect(BASEURL.'/upload');
	}
	
	function save1(){
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
				$lobArray['file'] = '@'.realpath(FCPATH.'uploads/lettersFile/'.$fname); 
				//~ $lobArray['file'] = '<html style="padding: 1in; font-size: 20;">Back HTML for Pritpal</html>'; 
			}
				
				
			try{
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
				$savelobresponse['pages'] = $lobresponse['perforated_page'];
				/**************** calculate charge ******************/
				$charge = '0.00';
				$LETTER_PER_PAGE_CHARGE = getConfigSettingVariable('LETTER_PER_PAGE_CHARGE');
				$LETTER_MULTIPLE_PAGE_CHARGE = getConfigSettingVariable('LETTER_MULTIPLE_PAGE_CHARGE');
				if(!$LETTER_PER_PAGE_CHARGE)$LETTER_PER_PAGE_CHARGE='0.00';
				if(!$LETTER_MULTIPLE_PAGE_CHARGE)$LETTER_MULTIPLE_PAGE_CHARGE='0.00';
				//~ $per_page_charge	  = '0.90';
				//~ $multiple_page_charge = '0.15';
				$per_page_charge	  = $LETTER_PER_PAGE_CHARGE;
				$multiple_page_charge = $LETTER_MULTIPLE_PAGE_CHARGE;
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
