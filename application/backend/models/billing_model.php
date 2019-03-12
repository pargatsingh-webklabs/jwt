<?php
ob_start();

class billing_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function listCards($user_id){
        return $this->db->select("*")->from("saved_customers")->where(array('user_id'=>$user_id))->get()->result_array();
    }
     public function getBillingInfoById($id){
		 $userdata=$this->session->userdata("userdata");
        return $this->db->select("id,lob_letter_id,letter_id,mail_type")->from("billing")->where(array("id"=>$id,"user_id"=>$userdata["id"]))->get()->row_array();
    }
    
    public function listAdminBilling($user_id=null){
		$userdata=$this->session->userdata("userdata");
		$where =array();
		//~ if($user_id)$where["user_id"] = $user_id;
		//~ else $where["user_id"] = $userdata["id"];
        return $this->db->select("*")->from("billing")->where($where)->order_by('id','desc')->get()->result_array();
    }
    public function listPendingBilling(){
		$where =array();
		$where["status"] = '0';
		$where["charges >"] = '0.00';
        return $this->db->select("*")->from("billing")->where($where)->order_by('user_id','desc')->get()->result_array();
    }
    public function listBilling($user_id=null){
		$userdata=$this->session->userdata("userdata");
		$where =array();
		if($user_id)$where["user_id"] = $user_id;
		else $where["user_id"] = $userdata["id"];
        return $this->db->select("*")->from("billing")->where($where)->order_by('id','desc')->get()->result_array();
    }
    public function listAllBilling($postData=array()){
		$userdata=$this->session->userdata("userdata");
		$where =" 1=1 ";
		if(!empty($userdata["id"])){
			$where.= " and user_id='".$userdata["id"]."'";
		}
		if(!empty($postData["mail_type"])){
			$where.= " and mail_type='".$postData["mail_type"]."'";
		}
		if(!empty($postData["date_from"])){
			$where.= " and UNIX_TIMESTAMP(STR_TO_DATE(SUBSTR(`send_date`, 1, 10),'%Y-%m-%d'))>= UNIX_TIMESTAMP(STR_TO_DATE('".$postData["date_from"]."','%m/%d/%Y'))";
		}
		if(!empty($postData["date_to"])){
			$where.= " and UNIX_TIMESTAMP(STR_TO_DATE(SUBSTR(`send_date`, 1, 10),'%Y-%m-%d'))<= UNIX_TIMESTAMP(STR_TO_DATE('".$postData["date_to"]."','%m/%d/%Y'))";
		}
		//~ $postData["date_from"] = date("Y-m-d", strtotime($postData["date_from"]));
		//~ $postData["date_to"] = date("Y-m-d", strtotime($postData["date_to"]));
		//~ if($postData["mail_type"])$where["mail_type"] = $postData["mail_type"];
		//~ if($user_id)$where["user_id"] = $user_id;
		//~ else $where["user_id"] = $userdata["id"];
		$start = (($postData["current_page"]-1)*$postData["item_per_page"]);
         return $this->db->select("*")->from("billing")->where($where, NULL, FALSE)->order_by('id','desc')->limit($postData["item_per_page"],$start)->get()->result_array();
    echo  $this->db->last_query();die;
    }
    public function totalListAllBilling($postData=array()){
		$userdata=$this->session->userdata("userdata");
			$where =" 1=1 ";
		if(!empty($userdata["id"])){
			$where.= " and user_id='".$userdata["id"]."'";
		}
		if(!empty($postData["mail_type"])){
			$where.= " and mail_type='".$postData["mail_type"]."'";
		}
		if(!empty($postData["date_from"])){
			$where.= " and UNIX_TIMESTAMP(STR_TO_DATE(SUBSTR(`send_date`, 1, 10),'%Y-%m-%d'))>= UNIX_TIMESTAMP(STR_TO_DATE('".$postData["date_from"]."','%m/%d/%Y'))";
		}
		if(!empty($postData["date_to"])){
			$where.= " and UNIX_TIMESTAMP(STR_TO_DATE(SUBSTR(`send_date`, 1, 10),'%Y-%m-%d'))<= UNIX_TIMESTAMP(STR_TO_DATE('".$postData["date_to"]."','%m/%d/%Y'))";
		}
        return $this->db->select("count(*) as total_records")->from("billing")->where($where, NULL, FALSE)->order_by('id','desc')->get()->row_array();
         echo  $this->db->last_query();
    }
    public function getTotalOfBillingCharges($user_id=null){
		$userdata=$this->session->userdata("userdata");
		$where =array("status"=>0);
		if($user_id)$where["user_id"] = $user_id;
		else $where["user_id"] = $userdata["id"];
        return $this->db->select("sum(charges) as total")->from("billing")->where($where)->get()->row_array();
    }
    public function getLastDaysBillingCharges($days=null,$Return="count"){
		//~ $where =array("status"=>0);
		//~ if($user_id)$where["user_id"] = $user_id;
		//~ else $where["user_id"] = $userdata["id"];
		 //~ $where = " created BETWEEN NOW() - INTERVAL 30 DAY AND NOW() ";
		 if($days==7)
		 $where = " FROM_UNIXTIME(created) BETWEEN now()-INTERVAL 7 day AND NOW()";
		 else if($days==30)
		 $where = " FROM_UNIXTIME(created) BETWEEN now()-INTERVAL 30 day AND NOW()";
		 else
		 $where = " FROM_UNIXTIME(created) BETWEEN now()-INTERVAL 1 day AND NOW()";
		if($Return=="charges"){
        $return  = $this->db->select("sum(charges) as total")->from("billing")->where($where,Null,false)->get()->row_array();
        return ($return["total"])?number_format($return["total"],2):'0.00';
        }else{
        $return  = $this->db->select("count(id) as total")->from("billing")->where($where,Null,false)->get()->row_array();
        return ($return["total"])?$return["total"]:'0';
        }
    }
    public function getTotalChargesOfUser($user_id=null,$mode="total"){
		$Paid =array("user_id"=>$user_id,"status"=>1);
		$Unpaid =array("user_id"=>$user_id,"status"=>0);
		$total =array("user_id"=>$user_id);
		if($mode=="Paid")
        return $this->db->select("sum(charges) as total")->from("billing")->where($Paid)->get()->row_array();
        else if($mode=="Unpaid")
        return $this->db->select("sum(charges) as total")->from("billing")->where($Unpaid)->get()->row_array();
        else
        return $this->db->select("sum(charges) as total")->from("billing")->where($total)->get()->row_array();
    }
    
    public function getlobletterid($id,$mail_type=null){
        return $this->db->select("id,lob_letter_id")->from("billing")->where(array("letter_id"=>$id,"mail_type"=>$mail_type))->get()->row_array();
    }
    
    public function CancelBilling($id=null){
		$data =array("status"=>2);
		$this->db->where('id',$id,false);
		if($this->db->update('billing',$data))
		return true;
		return false;
	}
    public function updateStatus($ch_id=""){
			$userdata=$this->session->userdata("userdata");
			$user_id = $userdata["id"];
			$data =array("status"=>1,"charge_id"=>$ch_id);
			$this->db->where('status',0,false);
			$this->db->where('user_id',$user_id,false);
			if($this->db->update('billing',$data))
			return true;
			return false;
    }

    
	 
    public function saveCustomers($data=null){
		$data['created'] =time();
		if($this->db->insert('saved_customers',$data))
		return $this->db->insert_id();				
		return false;				
	}
    public function getUserCardOfCustomer($user_id=null){
		return $this->db->select("customer_id")->from("saved_customers")->where(array('user_id'=>$user_id,'customer_id !='=>"",'status'=>1))->get()->row_array();
	}
    public function saveBillings($data=null){
		if(!empty($data['id'])){
			$id = $data["id"];
			unset($data["id"]);
			$this->db->where('id',$id,false);
			if($this->db->update('billing',$data))
			return $id;
			return false;
		}else{
			$data['created'] =time();
			if($this->db->insert('billing',$data))
			return $this->db->insert_id();				
			return false;				
		}

    }
    public function UpdateStatusOfCreateInvoices($inv_id=null,$createdItemsIds=array()){
			if($inv_id==null)return false;
			if(empty($createdItemsIds))return false;
			$data = array('status'=>3,'invoice_id'=>$inv_id);
			$this->db->where_in('id',$createdItemsIds,false);
			if($this->db->update('billing',$data))
			return true;
			return false;
	}
	
	
}
