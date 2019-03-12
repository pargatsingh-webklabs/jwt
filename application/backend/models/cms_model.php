<?php
ob_start();

class cms_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /************************************** Relations data starts ************************************************* */
    
    public function getCMSPages(){
        $cmsData = $this->db->select("*")->from("cms_pages")->where(array("status"=>1))->get()->result_array();
        return $cmsData;
    }
    public function pageDetails($id=null){
        $cmsData = $this->db->select("*")->from("cms_pages")->where(array("status"=>1,"id"=>$id))->get()->row_array();
		return $cmsData;
    }
      
    public function get_page_data($data=array()){
        $cmsData = $this->db->select("*")->from("cms_pages")->where(array("status"=>1,"link_title"=>$data['link_title']))->get()->row_array();
		return $cmsData;
    }
       	
	public function manage_CMSPages($data=null){
		
		$contant = array('link_title'=>$data['link_title'],'page_name'=>$data['page_name'],'page_text'=>$data['page_text'],'created'=>time());
	
		if(!empty($data['id'])){
			$this->db->where('id',$data['id']);
			$this->db->update('cms_pages',$contant);
			return true;			
		}else{
			
			$this->db->insert('cms_pages',$contant);
			return true;				
		}

    }
	
	
	
	
	
	
	
	
	
	
}
