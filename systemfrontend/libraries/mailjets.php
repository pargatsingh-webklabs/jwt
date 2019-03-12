<?php
class mailjets {
	
	public function __construct($config = array())
	{
	}

	function sendEmail($POST,$settings) {
	    /*echo "<pre>";
	    print_r($POST);
	    print_r($settings);
	    echo "</pre>";*/
		error_reporting(-1);
ini_set("display_errors", 1);
		//~ $apiKeys = $settings['mailjet_key'];
		//~ $secretKeys = $settings['mailjet_secret'];
		$apiKeys = MAILJET_KEY;
		$secretKeys = MAILJET_SECRET;
		include("".DIR_FS_SITE_FRONTEND."third_party/mailjet/src/Mailjet/php-mailjet-v3-simple.class.php");
		

		$mj = new Mailjet($apiKeys, $secretKeys);
		// Create a new Object
		//~ $mj = new Mailjet();
		$params = array(
			"method" => "POST",
			"from" => '"'.$settings['fromname'].'" <'.$settings['from_email'].'>',
			"to" => "{$POST['to']}",
			"subject" => "{$POST['subject']}",
			"text" => "{$POST['text']}",
			
		);
		if(!empty($POST["Attachment"])){
			$params["Attachment"]= $POST['Attachment'];
			
		}
		$result = $mj->sendEmail($params);
		if ($mj->_response_code == 200) {
			$msg =array("success"=>true,'msg'=>'<i class="fa fa-check"></i> Email Sent.');
		} elseif ($mj->_response_code == 400) {
			$msg =array("success"=>false,'msg'=>"<i class='fa fa-exclamation-triangle'></i> Bad Request! One or more arguments are missing or maybe mispelling.");
		} elseif ($mj->_response_code == 401) {
			$msg =array("success"=>false, 'msg'=>"<i class='fa fa-exclamation-triangle'></i> Unauthorized! You have specified an incorrect ApiKey or username/password couple.");
		} elseif ($mj->_response_code == 404) {
			$msg =array("success"=>false, 'msg'=>"<i class='fa fa-exclamation-triangle'></i> Not Found! The method your are trying to reach don\'t exists.");
		} elseif ($mj->_response_code == 405) {
			$msg =array("success"=>false, 'msg'=>"<i class='fa fa-exclamation-triangle'></i> Method Not Allowed! You made a POST request instead of GET, or the reverse.");
		} else {
			$msg =array("success"=>false, 'msg'=>"<i class='fa fa-exclamation-triangle'></i> Internal Server Error! Status returned when an unknow error occurs");
		}
		return $msg;
	}
	
}
?>
