<?php
ob_start();
class user_token_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	
	
	public function get_usertoken($userdata){
		 return $userData = $this->db->select("*")->from("user_token")->where(array("user_id" => $userdata['id']))->get()->row_array();
	}
	
	public function get_tokens_result($userdata){
		 return $userData = $this->db->select("user_id,refresh_token,access_token,expire_at")->from("user_token")->where(array("user_id" => $userdata['id']))->get()->row_array();
	}
	
	
	
	public function get_token_data($token,$data){
		 $userData = $this->db->select("*")->from("user_token")->where(array("access_token"=>$token,"user_id"=>$data['user_id']))->get()->row_array();
		 return $userData;
	}
	
	public function get_refreshtoken_data($token){
		 $userData = $this->db->select("*")->from("user_token")->where(array("refresh_token"=>$token))->get()->row_array();
		 return $userData;
	}
	
	public function get_accesstoken($token){
		 $userData = $this->db->select("*")->from("user_token")->where(array("access_token"=>$token))->get()->row_array();
		 return $userData['access_token'];
	}
	
	public function get_refreshtoken($token){
		 $userData = $this->db->select("*")->from("user_token")->where(array("refresh_token"=>$token))->get()->row_array();
		 return $userData['refresh_token'];
	}
	
	public function update_user_token($updatearray=array(),$id=null){
		$this->db->where('id', $id);
		if($this->db->update('user_token', $updatearray)){
			return true;
			}else{
			return false;
		}
	}
	
	public function update_access_token($updatearray=array(),$id=null){
		$this->db->where('id', $id);
		if($this->db->update('user_token', $updatearray)){
			return true;
			}else{
			return false;
		}
	}
	
}		
