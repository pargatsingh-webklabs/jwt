<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
DEFINE('BASEURL',$config['base_url']);
DEFINE('THEME_URL',$config['theme_url']);
DEFINE('SITENAME',$config['sitename']);
DEFINE('FRONT_BASE_URL',$config['front_base_url']);
$config['billingStatus'] = array("0"=>"unpaid","1"=>"Paid","2"=>"Canceled","3"=>"Invoiced");	// billing status text
$config['billingStatusLabel'] = array("0"=>"default","1"=>"success","2"=>"danger","3"=>"warning");	// billing status label color 
$config['locations_headings'] = array('store_number', 'store_type', 'address', 'city', 'state', 'zip_code', 'phone_number', 'play_place', 'drive_through', 'arch_card', 'free_wifi', 'latitude', 'longitude', 'geo_accuracy', 'country', 'country_code', 'county');
DEFINE('LOCATION_HEADINGS',$config['locations_headings']);
//~ DEFINE("LOB_API_KEY",'live_b7f4d7b3c762cb4f4b1496f925cc2715f52'); /************ LOB API LIVE KEY ************/
DEFINE("LOB_API_KEY",'test_bfa80a75534733558bbb11af5a95e219c89'); /************ LOB API TEST KEY ************/
$config['countryArray'] = array("AL"=>"Alabama","AK"=>"Alaska","AZ"=>"Arizona","AR"=>"Arkansas","CA"=>"California","CO"=>"Colorado","CT"=>"Connecticut","DE"=>"Delaware","DC"=>"District Of Columbia","FL"=>"Florida","GA"=>"Georgia","HI"=>"Hawaii","ID"=>"Idaho","IL"=>"Illinois","IN"=>"Indiana","IA"=>"Iowa","KS"=>"Kansas","KY"=>"Kentucky","LA"=>"Louisiana","ME"=>"Maine","MD"=>"Maryland","MA"=>"Massachusetts","MI"=>"Michigan","MN"=>"Minnesota","MS"=>"Mississippi","MO"=>"Missouri","MT"=>"Montana","NE"=>"Nebraska","NV"=>"Nevada","NH"=>"New Hampshire","NJ"=>"New Jersey","NM"=>"New Mexico","NY"=>"New York","NC"=>"North Carolina","ND"=>"North Dakota","OH"=>"Ohio","OK"=>"Oklahoma","OR"=>"Oregon","PA"=>"Pennsylvania","RI"=>"Rhode Island","SC"=>"South Carolina","SD"=>"South Dakota","TN"=>"Tennessee","TX"=>"Texas","UT"=>"Utah","VT"=>"Vermont","VA"=>"Virginia","WA"=>"Washington","WV"=>"West Virginia","WI"=>"Wisconsin","WY"=>"Wyoming");
?>
