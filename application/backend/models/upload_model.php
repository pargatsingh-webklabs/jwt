<?php
ob_start();

class upload_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function listFiles($user_id=null){
		$userdata=$this->session->userdata("userdata");
		$where =array();
		if($user_id)$where["user_id"] = $user_id;
		else $where["uploaded_file.user_id"] = $userdata["id"];
        return $this->db->select("uploaded_file.*,group_name")->from("uploaded_file")->join("group_contacts",'uploaded_file.group_id = group_contacts.id',"left")->where($where)->order_by('uploaded_file.id','desc')->get()->result_array();
    }
    public function getFile($id){
        return $this->db->select("file_name")->from("uploaded_file")->where(array("id"=>$id))->get()->row_array();
    }
	 public function saveletters($data=null){
		if(!empty($data['id'])){
			$id = $data["id"];
			unset($data["id"]);
			$this->db->where('id',$id,false);
			if($this->db->update('uploaded_file',$data))
			return $id;
			return false;
		}else{
			$data['created'] =time();
			if($this->db->insert('uploaded_file',$data))
			return $this->db->insert_id();				
			return false;				
		}

    }
   public function deleteLetter($id){
      $this->db->where('id', $id);
      return $this->db->delete('uploaded_file');
   }
   
   public function update_status($id,$imported_records=0){
	  $data = array("status"=>2);
	  if($imported_records) $data["imported_records"] = $imported_records;
      $this->db->where('id', $id);
      return $this->db->update('uploaded_file',$data);
   }
   public function checkGroupExist($group_name){
		$userdata=$this->session->userdata("userdata");
		$user_id = $userdata["id"];
        return $this->db->select("id")->from("group_contacts")->where(array("group_name"=>$group_name,"user_id"=>$user_id))->get()->row_array();
    }
   public function addGroupContact($group_name){
		$userdata=$this->session->userdata("userdata");
		$data['user_id'] = $userdata["id"];
		$data['group_name'] = $group_name;
		$data['created'] = time();
		if($this->db->insert('group_contacts',$data))
		return $this->db->insert_id();				
		return false;	
   }
 	
}
