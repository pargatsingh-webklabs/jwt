<?php
ob_start();

class admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function get_admin(){
	    $get_admin = array();
        $get_admin['admin_first'] = $this->db->select("*")->from("admins")->where(array("id"=>1))->get()->row_array();
        $get_admin['admin_second'] = $this->db->select("*")->from("admins")->where(array("id"=>2))->get()->row_array();
		return $get_admin;
    }
    
    public function verify_admin($data){
		$get_admin = $this->db->select("*")->from("admins")->where(array("user_name"=>$data['Username'],"password"=>md5($data['Password'])))->get()->row_array();
		if(!empty($get_admin)){
			echo json_encode(array("result"=>"success"));
			return $get_admin;
		}else{
			echo json_encode(array("result"=>"fail"));
			return false;
		}
    }

}
