<?php
ob_start();
class user_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	
	public function update_user($arraydata,$id){
		//~ debug($updatearray);die;
		 $updatearray = array('fname'=>$arraydata['fname'],'lname'=>$arraydata['lname'],'email'=>$arraydata['email'],'password'=>md5($arraydata['password']),'dob'=>$arraydata['dob'],'status'=>'1');
		$this->db->where('id', $id);
		if($this->db->update('user', $updatearray)){
			return true;
			}else{
			return false;
		}
	}
	
	public function save_user($data=array()){
	    $insertarray = array('fname'=>$data['fname'],'lname'=>$data['lname'],'email'=>$data['email'],'password'=>md5($data['password']),'dob'=>$data['dob'],'status'=>1,'created'=>time());
		if($this->db->insert('user', $insertarray)){
		   $last_id = $this->db->insert_id();
		   //~ $GuestData = $this->db->select("*")->from("users")->where(array("id"=>$last_id,"isDeleted"=>0))->get()->row_array();
		   return true;
		}else{
			return false;
		}	
	}
	
	public function check_user($data){
		 return $userdata = $this->db->select("*")->from("user")->where(array("email" => $data['email']))->get()->row_array();
	}
	public function get_company_data($id=null){
		 return $userdata = $this->db->select("id,company_name,company_logo")->from("users")->where(array("id" => $id, "isDeleted" => "0"))->get()->row_array();
	}	
	
	public function get_Users($REQUEST){
		$password = $REQUEST["password"];
		return $userData = $this->db->select("*")->from("user")->where(array("email" => $REQUEST['email'], "password" => md5($password)))->get()->row_array();
	}
	
	public function get_user($id){
		return $userData = $this->db->select("*")->from("user")->where(array("id"=>$id))->get()->row_array();
	}
	
	public function get_user_by_status($status=NULL){
		return $userData = $this->db->select("*")->from("users")->where(array("isDeleted"=>0,"status"=>$status))->get()->result_array();     
	}	
	public function get_user_info($id=NULL){
		return $user_details = $this->db->select("*")->from("users")->where(array("isDeleted"=>0,"id"=>$id))->get()->row_array();     
	}	
	public function get_userdata($id=NULL) {
		return $userdata=$this->db->select("*")->from("users")->where(array("id" =>$id))->get()->row_array();
	}
	public function getAdminByCookie($hash = null) {
		$userData = $this->db->select("*")->from("admins")->where(array("hash" => $hash, 'status' => 1))->get()->row_array();
		return $userData;
	}
	public function getAdminByUserId($user_id = null) {
		$userData = $this->db->select("*")->from("admins")->where(array("id" => $user_id, 'status' => 1))->get()->row_array();
		return $userData;
	}

	public function getUsers(){
		$userData = $this->db->select("*")->from("users")->where(array("isDeleted"=>0))->get()->result_array();
		return count($userData);
	}
	public function get_active_users(){
		$userData = $this->db->select("*")->from("users")->where(array("status"=>1,"isDeleted"=>0))->get()->result_array();
		return count($userData);
	}
	public function get_inactive_users(){
		$userData = $this->db->select("*")->from("users")->where(array("status"=>0,"isDeleted"=>0))->get()->result_array();
		return count($userData);
	}
	public function getUserDetail($id=null){
		$userData = $this->db->select("*")->from("users")->where(array("id"=>$id,"isDeleted"=>0))->get()->row_array();
		return $userData;
	}
	
	public function get_accountinfo($id=NULL){
		 $accoutinfo=$this->db->select("*")->from("user_package")->where(array("user_id" =>$id))->get()->row_array();
		
		$info = $this->db->select("name")->from("packages")->where(array("id" =>$accoutinfo['package_id']))->get()->row_array();
		$accoutinfo['package_id']=$info['name'];
		return $accoutinfo;
	}	
	public function update_user_info($updatearray=array(),$id=null){
		$this->db->where('id', $id);
		if($this->db->update('users', $updatearray)){
			return true;
			}else{
			return false;
		}
	}
	public function updateUserStatus($updatearray=array(),$id=null){
		$this->db->where('id', $id);
		if($this->db->update('users', $updatearray)){
			return true;
			}else{
			return false;
		}
	}
	
	
	public function updateFormStatus($table,$updatearray=array(),$id=null){
		$this->db->where('id', $id);
		if($this->db->update($table, $updatearray)){
			return true;
			}else{
			return false;
		}
	}
	public function update_advance_Status($updatearray=array(),$id=null){
		$this->db->where('id', $id);
		if($this->db->update('advance_request_form', $updatearray)){
			return true;
			}else{
			return false;
		}
	}	
	public function delete_user($id=null){
		$this->db->where('id', $id);
		if($this->db->delete('users')){
			$msg = 'true';
			return $msg;
			}else{
			$msg = 'false';
			return $msg;		
		}
	}
	public function checkUserAuthorization() {
		$userdata = $this->session->userdata('userdata');
		$userid = $userdata['id'];
		if (isset($userid) && !empty($userid)) {
			$validate = $this->user_model->getAdminByUserId($userid);
			if (count($validate) != 0) {
				redirect(BASEURL);
				} else {
				redirect(BASEURL . '/login');
			}
			} else {
			redirect(BASEURL . '/login');
		}
	}

	public function check_admin_login($arr = array()) {
        $userData = $this->db->select("id,first_name,last_name,display_name,email,superadmin,verify_password")->from("admins")->where(array("email" => $arr['username'], "password" => md5($arr['password']), 'status' => 1))->get()->row_array();
  return $userData;
    }
	
	public function authenticate_pass($verify=null)
	{
	
	$result_row = $this->db->select("verify_password")->from("admins")->where(array("verify_password" =>md5($verify),'superadmin'=>1))->get()->num_rows();
	if($result_row >0)
	{
	return true;
	
	} 
	return  false;
		
	}
	/*     * *********************************************** Admin login functions ends ************************************************* */
}		
