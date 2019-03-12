<?php
ob_start();

class addressbook_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	public function saveaddress($data=null){
		if(!empty($data['id'])){
			$id = $data["id"];
			unset($data["id"]);
			$this->db->where('id',$id,false);
			if($this->db->update('address_book',$data))
			return $id;
			return false;
		}else{
			$data['created'] =time();
			if($this->db->insert('address_book',$data))
			return $this->db->insert_id();				
			return false;				
		}

    }
    public function getAllAddressByGroup($group_id=null){
		$userdata=$this->session->userdata("userdata");
		$where =array("status"=>1);
		if($group_id)$where["group_id"] = $group_id;
		if($user_id)$where["user_id"] = $user_id;
		else $where["user_id"] = $userdata["id"];
        return $this->db->select("*")->from("address_book")->where($where)->order_by('id','desc')->get()->result_array();
   }
    public function listGroups($user_id=null){
		$userdata=$this->session->userdata("userdata");
		$where =array("status"=>1);
		if($user_id)$where["user_id"] = $user_id;
		else $where["user_id"] = $userdata["id"];
        return $this->db->select("*")->from("group_contacts")->where($where)->order_by('id','desc')->get()->result_array();
   }
    public function listAddress($user_id=null){
		$userdata=$this->session->userdata("userdata");
		$where =array("status"=>1);
		if($user_id)$where["user_id"] = $user_id;
		else $where["user_id"] = $userdata["id"];
		
        return $this->db->select("*")->from("address_book")->where($where)->order_by('id','desc')->get()->result_array();
   }
    public function defaultAddress(){
		$userdata=$this->session->userdata("userdata");
		$orwhere =array("default_user"=>1);
        return $this->db->select("*")->from("address_book")->or_where($orwhere)->get()->result_array();
   }
    public function deleteAddress($id){
      $this->db->where('id', $id);
      return $this->db->delete('address_book');
   }
    public function deleteAddressesOfSheet($id){
      $this->db->where('imported_file_id', $id);
      return $this->db->delete('address_book');
   }
    public function getAddress($id=null){
        return $this->db->select("*")->from("address_book")->where(array("status"=>1,"id"=>$id))->get()->row_array();
	}
      
    public function get_page_data($data=array()){
        $cmsData = $this->db->select("*")->from("cms_pages")->where(array("status"=>1,"link_title"=>$data['link_title']))->get()->row_array();
		return $cmsData;
    }
       	
	
	
	
	
}
