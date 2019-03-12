<?php
ob_start();

class template_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	public function add($data) {
		  $new_template = array('template_name'=>$data['template_name'],'subject'=>$data['subject'],'description'=>$data['description'],'type'=>auto_responder_email );
	return	$this->db->insert('template',$new_template);
		  
	}
		   public function delete($id=null){
		$d=$this->db->where('id', $id);
	 
		if($this->db->delete('template')){
			$msg = 'true';
			return $msg;
			}else{
			$msg = 'false';
			return $msg;		
		}
	}
	
	  
	public function get_template_list() {
       return $this->db->select("*")->from("template")->where(array("status"=>1))->order_by('id','desc')->get()->result_array();   
	}	
	public function get_subscription_template_list($data) {
       return $this->db->select("*")->from("subscription_email")->where(array("status"=>1))->get()->result_array();   
	}
	public function get_subscription_template($id) {
       return $this->db->select("*")->from("subscription_email")->where(array("id"=>$id,"status"=>1))->get()->row_array();   
	}	
	public function get_template($id) {
       return $this->db->select("*")->from("template")->where(array("id"=>$id,"status"=>1))->get()->row_array();   
	}
	
	public function get_subscription_template_by($template_name) {
       return $this->db->select("*")->from("template")->where(array("template_name"=>$template_name,"status"=>1))->get()->row_array();   
	}
	
	public function update_template_data($data=array(),$id) {
		$this->db->where('id',$id);
		if($this->db->update('template', $data)){
			return true;
		}else{
			return false;
		}
	}
	public function update_subscription_template($data=array(),$id) {
		$this->db->where('id',$id);
		if($this->db->update('subscription_email', $data)){
			return true;
		}else{
			return false;
		}
	}	
	public function get_autoresponder_template() {
       return $this->db->select("*")->from("template")->where(array("type"=>auto_responder_email,"status"=>1))->get()->result_array();   
	}
	
}
