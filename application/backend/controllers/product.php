<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model','MODEL');
    }

    public function index() {	
		$id = $this->input->get_post('id');	
		if(!empty($id)){
			$data['row'] = $this->MODEL->get_row($id);
			$data['get_all_OEMOffers'] = $this->MODEL->get_all_OEMOffers($id);
			$data['get_all_ParadiseOffers'] = $this->MODEL->get_all_ParadiseOffers($id);
		}
		$data["master_title"] = "Add Product"; 
		$data["master_body"] = "index";       
		$this->load->theme('mainlayout', $data);    		
    }	
    
    public function list_() {	

		$data['list'] = $this->MODEL->get_all();
		$data["master_title"] = "List Products"; 
		$data["master_body"] = "list";       
		$this->load->theme('mainlayout', $data);    		
    }	
	
	public function add(){
		$data = $this->input->post();
		foreach($data['data'] as $key=>$val){
			$postData[$val['name']] = $val['value'];
		}
		if(!empty($postData)){
			$res = $this->MODEL->save($postData);
			if(!empty($res)){
				$result['result'] = 'success';
				$result['product_id'] = $res;
				$result['data'] = $postData;
				$type = (!empty($postData['id'])) ? 'updated' : 'added';
				$result['message'] =  'Product '.$type.' successfully';
			}else{
				$result['result'] = 'error';
				$result['message'] = 'Something went wrong';
			}
		}else{
			$result['result'] = 'error';
			$result['message'] = 'Empty input  data';
		}
		echo json_encode($result);die;
	}

	public function delete(){
		$id = $this->input->get_post('id');
		if(!empty($id)){
			$res = $this->MODEL->delete($id);
			$res = $this->MODEL->deleteAllOEMOffer($id);
			$res = $this->MODEL->deleteAllParadiseOffer($id);
			redirect(BASEURL.'/product/list_');
		}
	}
   
	//~ OEM offers functions 
	
	public function get_row_OEMOffers(){
		$id = $this->input->get_post('id');
		if(!empty($id)){
			$res = $this->MODEL->get_row_OEMOffers($id);
			if(!empty($res)){
				$result['result'] = 'success';
				$result['data'] = $res;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'Something went wrong';
			}
		}else{
			$result['result'] = 'error';
			$result['message'] = 'Empty input  data';
		}
		echo json_encode($result);die;
	}
	
	public function addOEMOffer(){
		$data = $this->input->post();
		foreach(json_decode($data['data'],true) as $key=>$val){
			$postData[$val['name']] = $val['value'];
		}
		if(!empty($postData)){
			
			if(!empty($_FILES)){
				unset($postData['image']);
				$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/uploads/product_offers/';
				$config['allowed_types'] = 'gif|jpg|png';
				$newFileName =  $_FILES['file']['name'];
				$fileExt = explode(".", $newFileName);  
				$config['file_name'] =  $fileExt[0].'_'.time().".".$fileExt[1];
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file')) {
					$result['result'] = 'error';
					$result['message'] = $this->upload->display_errors();
					echo json_encode($result);die;
				} else{
					$file_array = $this->upload->data();
					$postData['image'] = $file_array['file_name']; 
				}
			}
			
			$res = $this->MODEL->saveOEMOffers($postData);
			if(!empty($res)){
				$result['result'] = 'success';
				if(!empty($postData['id'])){
					$result['type'] = 'update';
				}
				$result['OEM_offer_id'] = $res;
				$result['data'] = $postData;
				$result['data']['image'] = FRONT_BASE_URL.'uploads/product_offers/'.$postData['image'];
				$type = (!empty($postData['id'])) ? 'updated' : 'added';
				$result['message'] =  'OEM_offer '.$type.' successfully';
			}else{
				$result['result'] = 'error';
				$result['message'] = 'Something went wrong';
			}
		}else{
			$result['result'] = 'error';
			$result['message'] = 'Empty input  data';
		}
		echo json_encode($result);die;
	}
	
	public function deleteOEMOffer(){
		$id = $this->input->get_post('id');
		if(!empty($id)){
			$res = $this->MODEL->deleteOEMOffer($id);
			if(!empty($res)){
				$result['result'] = 'success';
				$result['data'] = $res;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'Something went wrong';
			}
		}else{
			$result['result'] = 'error';
			$result['message'] = 'Empty input  data';
		}
		echo json_encode($result);die;
	}
	
	//~ Paradise offers functions 
	
	public function get_row_ParadiseOffers(){
		$id = $this->input->get_post('id');
		if(!empty($id)){
			$res = $this->MODEL->get_row_ParadiseOffers($id);
			if(!empty($res)){
				$result['result'] = 'success';
				$result['data'] = $res;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'Something went wrong';
			}
		}else{
			$result['result'] = 'error';
			$result['message'] = 'Empty input  data';
		}
		echo json_encode($result);die;
	}
	
	public function addParadiseOffer(){
		$data = $this->input->post();
		foreach(json_decode($data['data'],true) as $key=>$val){
			$postData[$val['name']] = $val['value'];
		}
		if(!empty($postData)){
			
			if(!empty($_FILES)){
				unset($postData['image']);
				$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/uploads/product_offers/';
				$config['allowed_types'] = 'gif|jpg|png';
				$newFileName =  $_FILES['file']['name'];
				$fileExt = explode(".", $newFileName);  
				$config['file_name'] =  $fileExt[0].'_'.time().".".$fileExt[1];
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file')) {
					$result['result'] = 'error';
					$result['message'] = $this->upload->display_errors();
					echo json_encode($result);die;
				} else{
					$file_array = $this->upload->data();
					$postData['image'] = $file_array['file_name']; 
				}
			}
			
			$res = $this->MODEL->saveParadiseOffers($postData);
			if(!empty($res)){
				$result['result'] = 'success';
				if(!empty($postData['id'])){
					$result['type'] = 'update';
				}
				$result['paradise_offer_id'] = $res;
				$result['data'] = $postData;
				$result['data']['image'] = FRONT_BASE_URL.'uploads/product_offers/'.$postData['image'];
				$type = (!empty($postData['id'])) ? 'updated' : 'added';
				$result['message'] =  'Paradise offer '.$type.' successfully';
			}else{
				$result['result'] = 'error';
				$result['message'] = 'Something went wrong';
			}
		}else{
			$result['result'] = 'error';
			$result['message'] = 'Empty input  data';
		}
		echo json_encode($result);die;
	}
	
	public function deleteParadiseOffer(){
		$id = $this->input->get_post('id');
		if(!empty($id)){
			$res = $this->MODEL->deleteParadiseOffer($id);
			if(!empty($res)){
				$result['result'] = 'success';
				$result['data'] = $res;
			}else{
				$result['result'] = 'error';
				$result['message'] = 'Something went wrong';
			}
		}else{
			$result['result'] = 'error';
			$result['message'] = 'Empty input  data';
		}
		echo json_encode($result);die;
	}
	
}
