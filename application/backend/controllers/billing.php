<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class billing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('billing_model');
        check_session_and_exit();
    }

    public function index() {
		$userdata = $this->session->userdata('userdata');
		$user_id = $userdata["id"];
		$data["listBilling"] = $this->billing_model->listAdminBilling();
		$data["listCards"] = $this->billing_model->listCards($user_id);
		$TotalOfBillingCharges = $this->billing_model->GetTotalOfBillingCharges();
		$data["TotalOfBillingCharges"] = !empty($TotalOfBillingCharges["total"])?$TotalOfBillingCharges["total"]:0.00;
		//~ debug($data);die;
		$data["Charges24"] = $this->billing_model->getLastDaysBillingCharges(1,"charges");
		$data["Charges7days"] = $this->billing_model->getLastDaysBillingCharges(7,"charges");
		$data["Charges30days"] = $this->billing_model->getLastDaysBillingCharges(30,"charges");
		$data["Count24"] = $this->billing_model->getLastDaysBillingCharges(1);
		$data["Count7days"] = $this->billing_model->getLastDaysBillingCharges(7);
		$data["Count30days"] = $this->billing_model->getLastDaysBillingCharges(30);
		$data["master_title"] = "Billing";
        $data["master_body"] = "billing";
    	$this->load->theme('mainlayout', $data);
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
