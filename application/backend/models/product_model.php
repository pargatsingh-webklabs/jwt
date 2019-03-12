<?php
ob_start();
class product_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->table = 'products';
		$this->table1 = 'OEM_offers';
		$this->table2 = 'paradise_offers';
	}
	
	function save($data=array()){
		
		$data['modified'] = time();
		if(!empty($data['id'])){
			$this->db->where('id',$data['id']);
			$this->db->update($this->table, $data);
			return $data['id'];
		}else{
			unset($data['id']);
			$data['created'] = time();
			$this->db->insert($this->table,$data);
			return $this->db->insert_id();
			
		}
	}		

	function get_all(){
		return  $this->db->select("*")->from($this->table)->get()->result_array();
	}
	
	function get_row($id=null){
		return  $this->db->select("*")->from($this->table)->where(array('id'=>$id))->get()->row_array();
	}
	
	function delete($id=null){
		$this->db->where('id',$id);
		if($this->db->delete($this->table)){
			return true;
		}else{
			return false;
		}
	}
	
	function deleteByFileId($file_id=null){
		$this->db->where('file_id',$file_id);
		if($this->db->delete($this->table)){
			return true;
		}else{
			return false;
		}
	}
	
	//~ OEM offers functions 
	
	function saveOEMOffers($data=array()){
		
		$data['modified'] = time();
		if(!empty($data['id'])){
			$this->db->where('id',$data['id']);
			$this->db->update($this->table1, $data);
			return $data['id'];
		}else{
			unset($data['id']);
			$data['created'] = time();
			$this->db->insert($this->table1,$data);
			return $this->db->insert_id();
			
		}
	}
	
	function get_all_OEMOffers($product_id){
		return  $this->db->select("*")->from($this->table1)->where(array('product_id'=>$product_id))->get()->result_array();
	}
	
	function get_row_OEMOffers($id=null){
		return  $this->db->select("*")->from($this->table1)->where(array('id'=>$id))->get()->row_array();
	}	
	
	function deleteOEMOffer($id=null){
		$this->db->where('id',$id);
		if($this->db->delete($this->table1)){
			return true;
		}else{
			return false;
		}
	}
	
	function deleteAllOEMOffer($product_id=null){
		$data = $this->get_all_OEMOffers($product_id);
		if(!empty($data)){
			foreach($data as $key=>$val){
				unlink($_SERVER['DOCUMENT_ROOT'].'/uploads/product_offers/'.$val['image']);
			}
		}
		$this->db->where('product_id',$product_id);
		if($this->db->delete($this->table1)){
			return true;
		}else{
			return false;
		}
	}
	
	//~ Paradise offers functions 
	
	function saveParadiseOffers($data=array()){
		
		$data['modified'] = time();
		if(!empty($data['id'])){
			$this->db->where('id',$data['id']);
			$this->db->update($this->table2, $data);
			return $data['id'];
		}else{
			unset($data['id']);
			$data['created'] = time();
			$this->db->insert($this->table2,$data);
			return $this->db->insert_id();
			
		}
	}
	
	function get_all_ParadiseOffers($product_id){
		return  $this->db->select("*")->from($this->table2)->where(array('product_id'=>$product_id))->get()->result_array();
	}
	
	function get_row_ParadiseOffers($id=null){
		return  $this->db->select("*")->from($this->table2)->where(array('id'=>$id))->get()->row_array();
	}	
	
	function deleteParadiseOffer($id=null){
		$this->db->where('id',$id);
		if($this->db->delete($this->table2)){
			return true;
		}else{
			return false;
		}
	}
	
	function deleteAllParadiseOffer($product_id=null){
		$data = $this->get_all_ParadiseOffers($product_id);
		if(!empty($data)){
			foreach($data as $key=>$val){
				unlink($_SERVER['DOCUMENT_ROOT'].'/uploads/product_offers/'.$val['image']);
			}
		}
		$this->db->where('product_id',$product_id);
		if($this->db->delete($this->table2)){
			return true;
		}else{
			return false;
		}
	}


}		
