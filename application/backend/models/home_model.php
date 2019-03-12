<?php
ob_start();

class home_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->encrypt_vars = array('title','description');
		$this->requiredVars = array('id','title','description','status','assignedto','created_by','created');
    }

    public function list_hospitals(){
		$otherdb = $this->load->database('otherdb', TRUE);  
		$encrypt_key =$this->config->item("encrypt_key");
		$fields="";
		foreach($this->requiredVars as $key):
			if (in_array($key, $this->encrypt_vars)) {
				$fields.= "AES_DECRYPT(".$key.",'".$encrypt_key."') as ".$key.",";
			} else { 
				$fields.= $key.",";
			}
		endforeach;
		 $fields = substr($fields, 0, strlen($fields) - 1);
		 $sql= "select ".$fields." from hospital_credentials";
		return $otherdb->query($sql)->result_array();     
		
	}	
	
	public function list_tickets(){
		$default_db = $this->load->database('default', TRUE); 
		 $encrypt_key =$this->config->item("encrypt_key");
		 $fields="";
		 foreach($this->requiredVars as $key):
			if (in_array($key, $this->encrypt_vars)) {
				$fields.= "CAST(AES_DECRYPT(".$key.",'".$encrypt_key."') as CHAR) as ".$key.",";
			} else { 
				$fields.= $key.",";
			}
		 endforeach;
		 $fields = substr($fields, 0, strlen($fields) - 1);
		 $sql= "select ".$fields." from create_ticket";
		  return $default_db->query($sql)->result_array();     
	}
	
	public function get_specific_tickets($id){
		$default_db = $this->load->database('default', TRUE); 
		 $encrypt_key =$this->config->item("encrypt_key");
		 $fields="";
		 foreach($this->requiredVars as $key):
			if (in_array($key, $this->encrypt_vars)) {
				$fields.= "CAST(AES_DECRYPT(".$key.",'".$encrypt_key."') as CHAR) as ".$key.",";
			} else { 
				$fields.= $key.",";
			}
		 endforeach;
		 $fields = substr($fields, 0, strlen($fields) - 1);
		 $sql= "select ".$fields." from create_ticket where id=".$id."";
		  return $default_db->query($sql)->row_array();     
	}
	
	public function inser_ticket($data){
		 $this->load->database('default', TRUE); 
		 $encrypt_key =$this->config->item("encrypt_key");
		$query1 = "Insert into create_ticket SET ";
			foreach($data as $key => $value):
				if (in_array($key, $this->encrypt_vars)) {
					$query1.= $key . "=aes_encrypt(".$this->db->escape($value).",'".$encrypt_key."'), ";
				}else{
					$query1.= $key . "=".$this->db->escape($value). ", ";
				}
			endforeach;
			 $query = substr($query1, 0, strlen($query1) - 2);
				if($this->db->query($query)){
					return $insert_id = $this->db->insert_id();
				}else{
					return false;
				}
	}
	
	public function add_comment_image($ticketid,$imagename){
		 $query = "Insert into ticket_comment_images SET commentid ='".$ticketid."', images ='".$imagename."' ";
		if($this->db->query($query)){
			return $insert_id = $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function insert_ticket_images($ticketid,$imagename){
		 $query = "Insert into ticket_images SET ticketid ='".$ticketid."', images ='".$imagename."' ";
		if($this->db->query($query)){
			return $insert_id = $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function add_comment($data){
		 $this->load->database('default', TRUE); 
		 $encrypt_key =$this->config->item("encrypt_key");
		$query1 = "Insert into ticket_comments SET ";
			foreach($data as $key => $value):
				if (in_array($key, $this->encrypt_vars)) {
					$query1.= $key . "=aes_encrypt(".$this->db->escape($value).",'".$encrypt_key."'), ";
				}else{
					$query1.= $key . "=".$this->db->escape($value). ", ";
				}
			endforeach;
			 $query = substr($query1, 0, strlen($query1) - 2);
				if($this->db->query($query)){
					return $insert_id = $this->db->insert_id();
				}else{
					return false;
				}
	}
	
	public function update_ticket($data,$id){
		 $this->load->database('default', TRUE); 
		 $encrypt_key =$this->config->item("encrypt_key");
		$query1 = "update create_ticket SET ";
			foreach($data as $key => $value):
				if (in_array($key, $this->encrypt_vars)) {
					$query1.= $key . "=aes_encrypt(".$this->db->escape($value).",'".$encrypt_key."'), ";
				}else{
					$query1.= $key . "=".$this->db->escape($value). ", ";
				}
			endforeach;
			$query = substr($query1, 0, strlen($query1) - 2);
			$query.= " where id = '".$id."'";
				if($this->db->query($query)){					
					return true;
					 
				}else{
					return false;
				}
	}
	
	public function get_tickets(){
		$store_data = $this->db->select("*")->from("bug_report")->where(array('status'=>'0'))->get()->result_array();
		
        return $store_data;
	}
	public function delete_ticket($id){
		$this->db->where('id', $id);
		return $this->db->delete('create_ticket');
	}
	
	public function update_status($id,$status){
		$this->db->where('id',$id);
		$result  = $this->db->update('create_ticket', array('status' => $status));
		if($result){ 
			return true;
		}else{
			return false;
		}	
	}
	
	public function get_status(){
		$store_data = $this->db->select("*")->from("status")->get()->result_array();
		
        return $store_data;
	}
	
    public function get_store(){
        $store_data = $this->db->select("*")->from("pl_posts")->join('pl_postmeta','pl_posts.ID=pl_postmeta.post_id')->where(array('pl_posts.post_type'=>'product'))->group_by('pl_posts.ID')->order_by("rand()")->limit(8,0)->get()->result_array();
		
        return $store_data;	
    } 
	public function get_recent_store(){
        $store_data = $this->db->select("*")->from("pl_posts")->join('pl_postmeta','pl_posts.ID=pl_postmeta.post_id')->where(array('pl_posts.post_type'=>'product'))->group_by('pl_posts.ID')->order_by("post_modified", "DESC")->limit(8,0)->get()->result_array();
		
        return $store_data;	
    } 
  
    function get_product_image($id=null)
	{
		
		$sql= "select guid from  pl_posts where ID =(select meta_value from pl_postmeta where post_id='".$id."' and meta_key='_thumbnail_id')";
		$product_image=$this->db->query($sql)->row_array();
		if(empty($product_image))
		{
			return BASEURL.'/assets/img/e.jpg';
		}
		else
		{
			return $product_image['guid'];	
		}
		
			
	}
	function get_product_sale_price($id=null)
	{
		$sql= "select meta_value from pl_postmeta where post_id ='".$id."' and meta_key='_sale_price'";
		$sale_price=$this->db->query($sql)->row_array();
		return $sale_price['meta_value'];
		
			
	}
}
