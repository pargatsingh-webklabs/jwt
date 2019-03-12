<?php
ob_start();

class letters_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function listLetters(){
        return $this->db->select("*")->from("letters")->where(array("status"=>1))->order_by('id','desc')->get()->result_array();
    }
    
    public function listAdminLetters(){
        return $this->db->select("*")->from("letters")->where()->order_by('id','desc')->get()->result_array();
    }
    public function getRecipientName($id){
        return $this->db->select("To_name")->from("letters")->where(array("id"=>$id))->get()->row_array();
    }
	 public function saveletters($data=null){
		if(!empty($data['id'])){
			$id = $data["id"];
			unset($data["id"]);
			$this->db->where('id',$id,false);
			if($this->db->update('letters',$data))
			return $id;
			return false;
		}else{
			$data['created'] =time();
			if($this->db->insert('letters',$data))
			return $this->db->insert_id();				
			return false;				
		}

    }
   public function deleteLetter($id){
      $this->db->where('id', $id);
      return $this->db->delete('letters');
   }
   
   public function update_status($id){
      $this->db->where('id', $id);
      return $this->db->update('letters',array("status"=>0));
   }
   public function UpdateStatusOfCreateInvoices($ids=array()){
		if(empty($ids))return false;
		$data = array('status'=>3);
		$this->db->where_in('id',$ids,false);
		if($this->db->update('letters',$data))
		return true;
		return false;
   }
   
	
	
}
