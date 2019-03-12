<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class crontab extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('letters_model');
        $this->load->model('postcard_model');
        $this->load->model('addressbook_model');
        $this->load->model('billing_model');
    }

    public function index() {
		die("<h1>Under Construction</h1>");
		$billingData = $this->billing_model->listPendingBilling();
		//~ debug($billingData);//die;
		$CreateInvoiceArray = array();
		require FCPATH.APPPATH.'libraries/Stripe/init.php';
		\Stripe\Stripe::setApiKey("sk_test_EgwjzSAZLxnWApfydpzAANe1");
		//~// \Stripe\Stripe::setApiKey($api_key);
		foreach($billingData as $billingArray):
			if($billingArray["user_id"]!=11)continue;
			if(!array_key_exists($billingArray["user_id"],$CreateInvoiceArray)){
				$UserCard = $this->billing_model->getUserCardOfCustomer($billingArray["user_id"]);
				if(empty($UserCard["customer_id"])) continue;
				$CreateInvoiceArray[$billingArray["user_id"]]["customer_id"] = $UserCard["customer_id"];
			}
			
			try{
				$makeDescription = "Item Type:".$billingArray["mail_type"].",Mail ID:".$billingArray["lob_letter_id"].",\n description:".$billingArray["description"];
				$itemObj = \Stripe\InvoiceItem::create(array(
					"customer" => $CreateInvoiceArray[$billingArray["user_id"]]["customer_id"],
					"amount" => ($billingArray["charges"]*100),
					"currency" => "usd",
					//~// "invoice" => $invoiceObj["id"],
					"description" => $makeDescription)
				);
				
				$CreateInvoiceArray[$billingArray["user_id"]]["items"][] = $billingArray["id"];
				$CreateInvoiceArray[$billingArray["user_id"]][$billingArray["mail_type"]][] = $billingArray["letter_id"];
			}catch(Exception $e){
				$CreateInvoiceArray[$billingArray["user_id"]]["items_errors"][$billingArray["id"]] = $e->getMessage();
			}
			
		endforeach;
		$InvoiceErrors = array();
		//~ debug($CreateInvoiceArray);//die;
		if(!empty($CreateInvoiceArray)){
			foreach($CreateInvoiceArray as $user_id => $InvoiceItemsArray):
				try{
					$invoiceObj =  \Stripe\Invoice::create(array(
						"customer" => $InvoiceItemsArray["customer_id"],
						"description" => "This invoice for pending items."
					));
					$inv_id = $invoiceObj->id;
					if($this->billing_model->UpdateStatusOfCreateInvoices($inv_id,$InvoiceItemsArray["items"])){
						if(!empty($InvoiceItemsArray["letter"])){
							$update =$this->letters_model->UpdateStatusOfCreateInvoices($InvoiceItemsArray["letter"]);
						}
						if(!empty($InvoiceItemsArray["postcard"])){
							$update = $this->postcard_model->UpdateStatusOfCreateInvoices($InvoiceItemsArray["postcard"]);
						}
					}
				}catch(Exception $e){
					$InvoiceErrors[] = "Error for Customer Id:".$InvoiceItemsArray["customer_id"].", ".$e->getMessage();
				}
			endforeach;

		}
		debug($CreateInvoiceArray);
		debug($InvoiceErrors);
		die;
		
		
		
    }
     public function deletePostcard($id=false){
		if(!empty($id)){
			//~ $res = $this->postcard_model->deletePostcard($id);
			if($res)
				$this->session->set_flashdata('success', 'Postcard deleted Successfully');
			else
				$this->session->set_flashdata('error', 'Error while deleting Postcard.');
		}
		redirect(BASEURL.'/postcard');
	}
	
}
