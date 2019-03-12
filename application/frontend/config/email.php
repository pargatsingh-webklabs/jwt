<?php
$config['forget_password_email']['subject'] ="Password reset request on Smooth Maps";
$config['forget_password_email']['message'] ="Dear #user#,\nAs you have requested for password reset request. \n\n Please click on following link  to complete the password reset process.\n\n #link#\n\nThanks \nSmooth Maps Support Team.";

$config['registration_email']['subject'] ="New Sign up request on Smooth Maps";
$config['registration_email']['message'] = "Dear #user#,\nAs you have completed with your registration . To verify your email ,and in order to activate your account please click on following link .\n\n #link#\n\nThanks \nSmooth Maps Support Team.";
$config['renew_lenses_mail']['subject'] ="request on Smooth Maps";
$config['renew_lenses_mail']['message'] = "";

$config['subscribe_email']['subject'] ="You have Successfully Subscribed";
$config['subscribe_email']['message'] = " Dear #user# \n Plan Name : #product# \n Email : #email# \n Date : #date# \n Plan Amount : #amount# \n \n Thanks & Regards \n #sitename#";

$config['subscribe_cancel_email']['subject'] ="You have Successfully cancel the Subscription ";
$config['subscribe_cancel_email']['message'] = " Dear #user# \n You have Successfully cancel your stripe subscription \n Plan Name : #product# \n Email : #email# \n Date : #date# \n Plan Amount : #amount# \n \n Thanks & Regards \n #sitename#";

$config['subscribe_renew_email']['subject'] ="You have Successfully renew the Subscription ";
$config['subscribe_renew_email']['message'] = " Dear #user# \n You have Successfully renew your stripe subscription \n Plan Name : #product# \n Email : #email# \n Date : #date# \n Plan Amount : #amount# \n \n Thanks & Regards \n #sitename#";

$config['subscribe_expire_email']['subject'] ="Your Subscription has been cancelled";
$config['subscribe_expire_email']['message'] = " Dear #user# \n Your Subscription has been cancelled \n Plan Name : #product# \n Email : #email# \n Date : #date# \n Plan Amount : #amount# \n \n Thanks & Regards \n #sitename#";

$config['subscribe_single_email']['subject'] ="You have Successfully purchase Plan";
$config['subscribe_single_email']['message'] = " Dear #user# \n You have Successfully purchase package \n Plan Name : #product# \n Email : #email# \n Date : #date# \n Plan Amount : #amount# \n \n Thanks & Regards \n #sitename#";
$config['protocol']     = 'smtp';
$config['smtp_host']    = 'smtp.mailgun.org';
$config['smtp_port']    = '587';
$config['smtp_timeout'] = '30';
$config['smtp_user']    = 'postmaster@elevated.ink';
$config['smtp_pass']    = '6bedbb2de5e8707beaf3bb7d723dd41c';
$config['smtp_crypto']  = '';
$config['charset']      = 'utf-8';
$config['mailtype']     = 'text/html';
//~ $config['wordwrap']     = TRUE;
//~ $config['newline']      = "\r\n";
//~ $this->email->initialize($config);
?>
