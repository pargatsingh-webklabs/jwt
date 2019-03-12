<?php
ob_start();
class home_banners_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	
	/* -------------Queries related to brands------------- */
	public function get_all_home_banners(){
		
		return $home_banners_data = $this->db->select("*")->from("home_banners")->get()->result_array();     
	}
	/* -------------------------------------------------- */
	
	 public function home_bannersDetails($id=null){
        $home_bannersData = $this->db->select("*")->from("home_banners")->where(array("id"=>$id))->get()->row_array();
return $home_bannersData;
    }
	
	public function update_home_banners($data=null){
		$home_banners = array($data['field']=>$data['database_image'],'created'=>time(),'modified'=>time());
		if(!empty($data['id'])){
			$this->db->where('id',$data['id']);
			$this->db->update('home_banners',$home_banners);
			return true;			
		}

    }
	public function add($data=null){
		$home_banners = array('image'=>$data['image'],'main_text'=>$data['heading'],'caption_text'=>$data['description'],'created'=>time(),'modified'=>time());
	   return $this->db->insert('home_banners',$home_banners);
    }
	public function delete($id=null){
		$this->db->where('id', $id);
		if($this->db->delete('home_banners')){
			$msg = 'true';
			return $msg;
			}else{
			$msg = 'false';
			return $msg;		
		}
	}
    
}		
