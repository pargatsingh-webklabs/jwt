<?php
ob_start();

class postcard_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function listPostcard(){
        return $this->db->select("*")->from("postcards")->where(array("status"=>1))->order_by('id','desc')->get()->result_array();
    }

	public function getRecipientName($id){
        return $this->db->select("To_name")->from("postcards")->where(array("id"=>$id))->get()->row_array();
    }
    
	 public function savePostcards($data=null){
		if(!empty($data['id'])){
			$id = $data["id"];
			unset($data["id"]);
			$this->db->where('id',$id,false);
			if($this->db->update('postcards',$data))
			return $id;
			return false;
		}else{
			$data['created'] =time();
			if($this->db->insert('postcards',$data))
			return $this->db->insert_id();				
			return false;				
		}

    }
    public function deletePostcard($id){
      $this->db->where('id', $id);
      return $this->db->delete('postcards');
   }
   public function update_status($id){
      $this->db->where('id', $id);
      return $this->db->update('postcards',array("status"=>0));
   }
	public function UpdateStatusOfCreateInvoices($ids=array()){
		if(empty($ids))return false;
		$data = array('status'=>3);
		$this->db->where_in('id',$ids,false);
		if($this->db->update('postcards',$data))
		return true;
		return false;
   }
	
}
