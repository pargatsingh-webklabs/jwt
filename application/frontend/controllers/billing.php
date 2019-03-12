<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class billing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('billing_model');
        $this->load->model('letters_model');
        $this->load->model('postcard_model');
        check_session_and_exit();
    }
 
    public function index() {
		$userdata = $this->session->userdata('userdata');
		$user_id = $userdata["id"];
		$data["listBilling"] = $this->billing_model->listBilling();
		$data["listCards"] = $this->billing_model->listCards($user_id);
		$TotalOfBillingCharges = $this->billing_model->GetTotalOfBillingCharges();
		$data["TotalOfBillingCharges"] = !empty($TotalOfBillingCharges["total"])?$TotalOfBillingCharges["total"]:0.00;
		//~ debug($data);die;
		$data["master_title"] = "Billing";
        $data["master_body"] = "billing";
    	$this->load->layout('mainlayout', $data);
    }
    public function list_billing() {
		$userdata = $this->session->userdata('userdata');
		$postData = $this->input->post();
		$data["date_from"] = ($postData["date_from"])?$postData["date_from"]:'';
		$data["date_to"] = ($postData["date_to"])?$postData["date_to"]:'';
		$data["item_per_page"] = ($postData["item_per_page"])?$postData["item_per_page"]:10;
		$data["mail_type"] = ($postData["mail_type"])?$postData["mail_type"]:false;
		$data["current_page"]  = ($postData["current_page"])?$postData["current_page"]:1;
		//~ $postData["user_id"] = $userdata["id"];
		$data["listBilling"] = $this->billing_model->listAllBilling($data);
		$total_records = $this->billing_model->totalListAllBilling($data);
		$data["total_records"]  = ($total_records["total_records"])?$total_records["total_records"]:0;
		$data["total_pages"]  = ($total_pages)?$total_pages:ceil($data["total_records"]/$data["item_per_page"]);
		$data["page_url"]  = ($postData["page_url"])?$postData["page_url"]:BASEURL."/billing/list_billing";
		$data["master_title"] = "Billing";
        //~ $data["master_body"] = "list_billing";
    	$this->load->view('billing/list_billing', $data);
    }
	public function cancelBilling($id=false){
		if(!empty($id)){
			$res = $this->billing_model->getBillingInfoById($id);
			//~ debug($res);die;
			try{
				require	(FCPATH . "lib/vendor/autoload.php");
				$LOB_API_KEY = getConfigSettingVariable('LOB_API_KEY');
				$lob = new \Lob\Lob($LOB_API_KEY);
				if($res['mail_type']=='letter')
				$lobresponse = $lob->letters()->delete($res['lob_letter_id']);
				if($res['mail_type']=='postcard')
				$lobresponse = $lob->postcards()->delete($res['lob_letter_id']);
				if($lobresponse['deleted']){
					if($res['mail_type']=='letter')
						$update =$this->letters_model->update_status($res['letter_id']);
					if($res['mail_type']=='postcard')
						$update = $this->postcard_model->update_status($res['letter_id']);
					$CancelBilling = $this->billing_model->CancelBilling($res['id']);
				}
			}catch(Exception $e){
				$this->session->set_flashdata('error',  $e->getMessage());
				redirect(BASEURL.'/billing');
			}
			
			if($update)
				$this->session->set_flashdata('success', ucfirst($res["mail_type"]).' Cancelled Successfully');
			else
				$this->session->set_flashdata('error', 'Error while cancelling Billing.');
		}
		redirect(BASEURL.'/billing');
	}
    public function stripe_payment(){
		$chargeres = false;
		$userdata = $this->session->userdata('userdata');
		$user_id = $userdata["id"];
		$CustomerId ="";
		//~ debug($_POST);die;
		$token = $_POST['stripeToken'];
		if(empty($token) && !empty($_POST['customer_id']))
		$CustomerId = $_POST['customer_id'];
		$CustomerExist = 0;
		$api_key = getConfigSettingVariable('stripe_sk_key');
		require FCPATH.APPPATH.'libraries/Stripe/init.php';
		//~ \Stripe\Stripe::setApiKey("sk_test_EgwjzSAZLxnWApfydpzAANe1");
		\Stripe\Stripe::setApiKey($api_key);
		if(!empty($token) && empty($_POST['customer_id'])){
			try{
				$Customers = \Stripe\Customer::all();
				if(!empty($Customers->data)){
					foreach(@$Customers->data as $CustomersData){
						if($CustomersData["email"]==$userdata["email"] && false){
							$CustomerId =$CustomersData["id"];
							$CustomerExist =1;
						}
					}
				}
				if(!$CustomerExist){
					$saved_customers = \Stripe\Customer::create(array(
						"email" => $userdata["email"],
						"source" => $token // obtained with Stripe.js
					));
					$saveCustomers = array();
					$saveCustomers["user_id"] =$user_id;
					$saveCustomers["customer_id"] =$saved_customers->id;
					$CustomerId =$saveCustomers["customer_id"];
					$saveCustomers["last4"] =@$saved_customers->sources->data[0]->last4;
					$saveCustomersres = $this->billing_model->saveCustomers($saveCustomers);
				}
					
			}catch(Exception $e){
				$this->session->set_flashdata('error', $e->getMessage());
				redirect(BASEURL.'/billing');
			}
		}
		try {
				$charge = \Stripe\Charge::create([
					'amount' => $_POST['amount']*100,
					'currency' => 'usd',
					'description' => 'billing charges '.$userdata["email"],
					'customer' => $CustomerId,
					]);

				if($charge){
					$chargeres = $this->billing_model->updateStatus($charge->id);
				}
				if($chargeres)
					$this->session->set_flashdata('success', 'Your payment was successful');
				else
					$this->session->set_flashdata('error', 'Error while catching payment.');
					redirect(BASEURL.'/billing');
		  }catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		  }
		redirect(BASEURL.'/billing');
	}
  
}
