<?php
ob_start();

class settings_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function getAllSettings(){
       return $this->db->select("*")->from("config")->where(array("status"=>1))->get()->result_array();
   }
	 
    public function checkSettingMode($key){
		if($key=="LOB_API_KEY"){
			$userdata=$this->session->userdata("userdata");
			if($userdata["lob_api_mode"]==="live"){
				return "LIVE_LOB_API_KEY";
			}else{
				return "TEST_LOB_API_KEY";
			}
		}
		return false;
	}
    public function getConfigSettingVariable($key){
		$where = array("key"=>$key);
		$Mode = $this->checkSettingMode($key);
		if($Mode){	$where["key"] = $Mode; }
       return $this->db->select("value")->from("config")->where($where)->get()->row_array();
    }
  
	
	 public function update_packages($data=array()){
		
		 if(!empty($data['id'])){
			$new_package = array('name'=>$data['name'],'price'=>$data['price'],'type'=>$data['type'],'created'=>time(),'modified'=>time());
			$this->db->where('id',$data['id']);
			if($this->db->update('packages',$new_package)){
				$package_feature = array('package_id'=>$data['package_id'],'feature'=>$data['feature'],'description'=>$data['description'],'created'=>time(),'modified'=>time());
				$this->db->where('package_id',$data['id']);
				foreach($data['feature'] as $key => $val)
	{
		echo $val;
		echo '<br/>';
	    $package_feature = array('package_id'=>$data['id'],'feature'=>$val,'description'=>$data['description'],'created'=>time(),'modified'=>time());
		 $this->db->insert('package_features',$package_feature);
		 //return $this->db->insert_id();
    }
				
				/*
				if($this->db->insert('package_features',$package_feature)){
				   return true;
				}else{
				   return false;
				}	*/		  
			}
						    
	 }	 
    }	
    public function edit_package($id=null){
		//	return $package = $this->db->select("*")->from("packages")->join('package_features','package_features.package_id=packages.id')->where(array("packages.id"=>$id))->get()->row_array();
		$result['package'] = $this->db->select("*")->from("packages")->where(array("id"=>$id))->get()->row_array();		
		$result['package_features'] =  $this->db->select("*")->from("package_features")->where(array("package_id"=>$id))->get()->result_array();
		//debug($result['package_features']);die;
		return $result;	
	}	
    public function update_package($data=null){
        $new_package = array('name'=>$data['name'],'price'=>$data['price'],'validity'=>$data['validity'],'plan_description'=>$data['plan_description'],'type'=>$data['type'],'created'=>time(),'modified'=>time());
		$this->db->where('id',$data['id']);
		$this->db->update('packages',$new_package);
	}	
    public function delete_package($id=null){
		if($this->db->where('id',$id)->delete('packages')){
			$msg = 'true';
			return $msg;
		}else{
			$msg = 'false';
			return $msg;		
		}
	}	
    public function updatePackageStatus($updatearray=array(),$id=null){
        $this->db->where('id', $id);
        if($this->db->update('packages', $updatearray)){
            return true;
        }else{
            return false;
        }
    }	
	
	
	
	
}
