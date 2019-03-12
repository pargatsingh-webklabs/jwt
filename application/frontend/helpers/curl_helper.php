<?php 
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function curl_data($_REQUEST){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"http://localhost/pfaapp/add_tickets.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 
			http_build_query($_REQUEST));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec ($ch);
			$status = curl_getinfo($ch);
			curl_close ($ch);
			//~ echo json_decode($status);
		//~ var_dump($status);
		return $server_output;
	}
function sendnotification($url,$data){
		$ch = curl_init();
		//~ curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL,$url);
		 
		curl_setopt($ch, CURLOPT_POST, 1);
		
	//  in real life you should use something like:
		curl_setopt($ch, CURLOPT_POSTFIELDS, 
		http_build_query($data));
		
	//  receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec ($ch);
		curl_close ($ch);
		//~ debug($server_output);die;	   	      
		return $server_output;
			
	}	
	
function _remap($function)
{
     if($function == "list_tickets")
    {
       $this->$function();
    }
     else
    {
       $this->default_function();
    }
}	

?>
