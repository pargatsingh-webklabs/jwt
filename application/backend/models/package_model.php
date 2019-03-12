<?php
ob_start();

class package_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function get_packages(){
        $package_Data = $this->db->select("*")->from("packages")->where(array("status"=>1))->get()->result_array();
        return count($package_Data);
    }
	 
    public function getPackages(){
        return $package_Data = $this->db->select("*")->from("packages")->get()->result_array();
    }
    public function get_paidpackages(){
        $package_Data = $this->db->select("*")->from("packages")->where(array("type"=>'paid'))->get()->result_array();
        return count($package_Data);
    }
    public function get_freepackages(){
        $package_Data = $this->db->select("*")->from("packages")->where(array("type"=>'free'))->get()->result_array();
        return count($package_Data);
    }
    public function get_CustomPackages_sold(){
        $userData = $this->db->select("*")->from("user_package")->where(array("package_name"=>'Custom Plan'))->get()->result_array();
        return count($userData);
    }
	public function get_defaultPackages_sold(){
        $userData = $this->db->select("*")->from("user_package")->where(array("package_name"=>'Default Plan'))->get()->result_array();
       return count($userData);
    }	
    public function add_new_package($data=array()){
		//debug($data['feature']);die; $data['feature']
		$new_package = array('name'=>$data['name'],'price'=>$data['price'],'type'=>$data['type'],'created'=>time(),'modified'=>time());
		$this->db->insert('packages',$new_package);
		 return $this->db->insert_id();
    }
	 public function add_package_features($data=array()){
		//debug($data['feature']);die;
	foreach($data['feature'] as $key => $val)
	{
		echo $val;
		echo '<br/>';
	    $package_feature = array('package_id'=>$data['package_id'],'feature'=>$val,'description'=>$data['description'],'created'=>time(),'modified'=>time());
		 $this->db->insert('package_features',$package_feature);
		 //return $this->db->insert_id();
    }
	
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
	 public function delete_feature($id=null){
			if($this->db->where('id',$id)->delete('package_features')){
			$msg = 'true';
			return $msg;
		}else{
			$msg = 'false';
			return $msg;		
		}
	}
	
	/******pack on account/profile******/
	
	 public function get_Packags_id($userdata){
       return  $this->db->select("*")->from("user_package")->where(array("user_id"=>$userdata['id']))->get()->result_array();
         
    }
	 public function get_Packags_data_by_id($id){

       return  $this->db->select("*")->from("packages")->where(array("id"=>$id))->get()->row_array();
         
    }
	
	
}
