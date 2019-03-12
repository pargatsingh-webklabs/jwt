<?php
ob_start();

class homefeatures_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	public function getallfeatures(){
       return $this->db->select("*")->from("home")->get()->result_array();
       
    }
	public function getfeatures($id=null){
 		return $this->db->select("*")->from("home")->where(array("id"=>$id))->get()->row_array();
	}
	
		public function update_features($data=null){
			//debug($data);die;
		$features = array('heading'=>$data['heading'],'description'=>$data['description'],'image'=>$data['image'],'modified'=>time());
		if(!empty($data['id'])){
			$this->db->where('id',$data['id']);
			$this->db->update('home',$features);
			return true;			
		}else{
			$this->db->insert('home',$features);
			return true;				
		}

    }
	
}