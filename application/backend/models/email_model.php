<?php 
class email_model extends CI_Model { 
 
    function __construct(){
        parent::__construct();
    }
	
		
	public function sendIndividualEmail($emailarr=array()){
		$this->email->clear();		
		$this->email->to($emailarr["to"]);
		if(!empty($emailarr["reply_to"]))
		$this->email->reply_to($emailarr["reply_to"], $emailarr["reply_name"]);
		$this->email->from($this->config->item("adminemail"),$this->config->item("adminname"));
		$this->email->subject($emailarr["subject"]);
		$this->email->message($emailarr["message"]);
		if(!empty($emailarr["attachment"]))
		$this->email->attach($emailarr["attachment"]);
		$this->email->send();

	}	
	public function send_contact_message($emailarr=array()){
		$this->email->clear();		
		$this->email->to($emailarr["to"]);
		$this->email->from($emailarr["from"]);
		$this->email->subject($emailarr["subject"]);
		$this->email->message($emailarr["message"]);	
		if($this->email->send()){
			return true;
		}else{
		    return false;
		}

	}
}
