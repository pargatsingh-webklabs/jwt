<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class uploads extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('letters_model');
        $this->load->model('upload_model');
        $this->load->model('product_model');
		$this->load->model('user_model');
		$this->load->library('email');
		check_session_and_exit();
	}

    

    public function index() {
		$data["listFiles"] = $this->upload_model->listFiles();
        $data["master_title"] = "Uploads";
        $data["master_body"] = "index";
		$this->load->layout('mainlayout', $data);
    }
     public function deleteLetter($id=false){
		if(!empty($id)){
				$FCPATH = str_replace('/superbigtime','',FCPATH);
				$getFile = $this->upload_model->getFile($id);
				$fname = $getFile["file_name"];
				$filepath = $FCPATH.'uploads/products/'.$fname;
				unlink($filepath);
			$res = $this->upload_model->deleteLetter($id);
			if($res){
				$res = $this->product_model->deleteByFileId($id);
				$this->session->set_flashdata('success', 'File deleted Successfully');
			}else{
				$this->session->set_flashdata('error', 'Error while deleting File.');
			}
		}
		redirect(BASEURL.'/uploads');
	}
    public function downloadFile($id=false){
		$fname = "sample.csv";
		if(!empty($id)){
			$res = $this->upload_model->getFile($id);
			$fname = $res["file_name"];
		}
		$FCPATH = str_replace('/superbigtime','',FCPATH);
		$filepath = $FCPATH.'uploads/products/'.$fname;
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
		die("<h3>Oops Something went wrong.Please try Again after some times <a href='".BASEURL.'/uploads'."'>Go Back</a></h3>");
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
		$FCPATH = str_replace('/superbigtime','',FCPATH);
		$postData = array();
		if(!empty($_FILES)){
			//~ debug($_FILES);die;
			if($_FILES["importfile"]["type"]!="text/csv" && $_FILES["importfile"]["type"]!="application/vnd.ms-excel"){
				$this->session->set_flashdata('error', 'File type must be text/csv or application/vnd.ms-excel.');
				redirect(BASEURL.'/uploads');
			}

			$fname = str_replace(' ', '-',$_FILES["importfile"]["name"]);
			$fname = preg_replace('/[^A-Za-z0-9\-.]/', '',$fname);
			$ext = pathinfo($fname, PATHINFO_EXTENSION);
			$fname_arr = explode(".".$ext,$fname);
			$fname = $fname_arr[0]."_".time().".".$ext;
			$uploadDone = move_uploaded_file($_FILES["importfile"]["tmp_name"],$FCPATH.'uploads/products/'.$fname);
			$postData["file_name"] = $fname;
			$postData["type"] = $_FILES["importfile"]["type"];
		
			if(!$uploadDone){
				$this->session->set_flashdata('error', 'File cannot uploaded successfully.please try later.'.$FCPATH.'uploads/products/'.$fname);
				redirect(BASEURL.'/uploads');
			}
			$userdata=$this->session->userdata("userdata");
			$csvArrary = $this->csv_to_array($FCPATH.'uploads/products/'.$fname);
			$totalrecords = count($csvArrary);
			$postData["user_id"] = $userdata['id'];
			$postData["imported_records"] = $totalrecords;
			$file_id = $this->upload_model->saveletters($postData);	
			
			$userdata=$this->session->userdata("userdata");
			$user_id = $userdata["id"];
			foreach($csvArrary as $key=>$val){
				if($val['Model Number']==null){$skip++;continue;}
				$saveArray = array(
				  'file_id'      	=> $file_id,
				  'user_id'      	=> $userdata['id'],
				  'model'      		=> $val['Model Number'],
				  'brand'      		=> $val['Brand'],
				  'name'      		=> $val['Nickname'],
				  'yield'      		=> $val['Yield'],
				  'color'      		=> $val['Color'],
				  'printers'      	=> $val['Printers'],
				  'price'      		=> $val['Cost'],
				  'quantity'      	=> $val['Qty'],
				  'vendor'      	=> $val['Vendor'],
				  'created'  	 	=> time()
				 );
				$res = $this->db->insert('products',$saveArray);
			}
			$this->upload_model->update_status($uploadDoneRes,($totalrecords-$skip));
			if(($totalrecords-$skip)>0){
				
				$this->session->set_flashdata('success', ($totalrecords-$skip)."/$totalrecords records inserted successfully.");
			}else{
				if(($totalrecords-$skip)==0 && @$totalrecords>0 && @$skip>0){
					$this->session->set_flashdata('error', 'Structure for the file mismatch. Please use <a href="'.BASEURL.'/uploads/downloadFile">sample file</a> structure and make sure (Brand,Model Number,Nickname
,Yield,Color,Printers,Cost,Qty,Vendor) are mandatory.');
				}else{
					$this->session->set_flashdata('error', ' Error: File should be correct format.');
				}
			}
		}
		
		redirect(BASEURL.'/uploads');
	}
	 


}

