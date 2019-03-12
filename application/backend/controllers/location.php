<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class location extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('locations_model');
        $this->load->model('categories_model');
        $this->load->helper('location_helper');
    }
    public function index(){
		$data["master_title"] = "Locations List";	
		$data["master_body"] = "list";
		$this->load->theme('mainlayout', $data);	
		//$this->load->view('location/fetch_lists', $data);	
	}	
	public function get_location_data() {
        $data = $this->input->post();
		$data["total_rows"] = $this->locations_model->get_locations_count($data);		
		$data["per_page"] = !empty($data['per_page'])?$data['per_page']:10;	
		$data['offset'] =!empty($data['curr_page'])?($data['curr_page']):0;
		$data["locations"] =  $this->locations_model->get_locations($data);	
       	$this->load->view('location/fetch_lists', $data);	
    }
	
    public function file(){

		$data["categoriesdata"]=$this->categories_model->get_all_sub_categories();
		$post = $this->input->post();
        if(!empty($post)){
			debug($post);
			debug($_FILES);
			echo "hello";die;
	    $userdata = $this->session->userdata('userdata');
			
	    if(!empty($_FILES)){

		$allowed =  array('csv'); 
		$filename = $_FILES['upload_file']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) {
			echo 'Invalid file extension';
		}else{
			$_FILES['userfile']['name'] = $_FILES['upload_file']['name'];
			$_FILES['userfile']['type'] = $_FILES['upload_file']['type'];
			$_FILES['userfile']['tmp_name'] = $_FILES['upload_file']['tmp_name'];
			$_FILES['userfile']['error'] = $_FILES['upload_file']['error'];
			$_FILES['userfile']['size'] = $_FILES['upload_file']['size']; 
			$config['upload_path'] ='./assets/files/';
			$config['allowed_types'] = '*';
            $config['max_size']  = '0'; //the zero means no limit			
			$config['file_name'] =  $_FILES['upload_file']['name'];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload()) {
				$error = array('error' => $this->upload->display_errors());
				debug($error);die;
			} else{
				
				$data = array('upload_data' => $this->upload->data());
				$file_name = $data['upload_data']['file_name'];
				$file_path = 'assets/files/'.$file_name;
				chmod($file_path, 0777);
				$file_info['name'] = $file_name;
				$file_info['admin_id'] = $userdata['id'];					
				$file_info['type'] = 'locations';	
				$response = $this->locations_model->upload_file_info($file_info);
			}				
		}
	}
	if($response){
				// insert category in categories table
				$category_id = $post['existing_category'];
				$category_name = $this->categories_model->get_category_name($category_id);
				//---------------------------------------------------------------
				$locations_headings = array('store_number', 'store_type', 'address', 'city', 'state', 'zip_code', 'phone_number', 'play_place', 'drive_through', 'arch_card', 'free_wifi', 'latitude', 'longitude', 'geo_accuracy', 'country', 'country_code', 'county');
						// read a valid csv file and converts it to an array 
						$rows = array_map('str_getcsv', file($file_path));
				$i=0;
				$locations_headings=array();
			    foreach ($rows as $row) {
				if($i==0){
				$locations_headings = $row;
				}
				$i++;

						}
						$header = $locations_headings;
						$csv = array();
				$i=0;
						foreach ($rows as $row) {
				if($i>0){
						   $csv1 = array_combine($header, $row);

						if(empty($csv1['store_type']))
						{
							$csv1['store_type'] = $category_name;

						}	
						$csv[] = $csv1;
				}
				$i++;
		}	
		//---------------------------------------------------

		// tryverse converted array to insert to insert values to locations and category_location table

$feilds = $this->locations_model->get_feildsTable();
	foreach($csv as $key => $locations){
		
	debug($locations);	
		die;
		
		foreach($locations as $keyLoc =>$valLoc){
			if(in_array($keyLoc,$feilds)){
				$new_location[$keyLoc] = $valLoc;
			}else{
			   unset($locations[$keyLoc]);
			}

		}
			if($key!=0){
				if(@$new_location['latitude'] && $new_location['latitude']!=0 && @$new_location['longitude'] &&  $new_location['longitude']!=0){

				  $location_id = $this->locations_model->add_location($new_location);
				  if(@$location_id && @$category_id){
					$response_fi = $this->locations_model->add_category_location(array('category_id'=>$category_id,'location_id'=>$location_id));
				  }
				}					
			}	
	}


		//----------------------------------------------------------------------------------------------------------

	   if($response_fi){
			$this->session->set_flashdata('successmsg', 'Requested file has been inserted successfully');
			redirect(BASEURL.'/location/file/?msg=1');	   
	   }else{
			$this->session->set_flashdata('errormsg', 'Error tracking your requested file , please try again');
			redirect(BASEURL.'/location/file/?msg=0');		   
	   }

	}else{
        $this->session->set_flashdata('errormsg', 'Error tracking your requested file , please try again');
		redirect(BASEURL.'/location/file/?msg=0');
	}	
}

			$data["master_title"] = "Upload Locations File";	
			$data["master_body"] = "upload";   
			$this->load->theme('mainlayout', $data);   
		
    }

    public function manually($id){
		$data['location'] = $this->locations_model->get_location($id);
		$locations = $this->input->post();
		if(!empty($locations)){
			$location_id = $this->locations_model->add_location($locations);	
			if($location_id){
				if(@$locations['id']){
					$this->session->set_flashdata('successmsg', 'Location data updated successfully');
				}else{
					$this->session->set_flashdata('successmsg', 'Location data inserted successfully');
				}				
				redirect(BASEURL.'/location');				
			}else{
				if(@$id){
				    $this->session->set_flashdata('errormsg', 'Error updating your requested data , please try again');
				}else{
			    	$this->session->set_flashdata('errormsg', 'Error inserting your requested data , please try again');
				}								

				redirect(BASEURL.'/location');			
			}
		}
		
		if(@$id){
		  $data["master_title"] = "Edit new locations";
		}else{
		  $data["master_title"] = "Add new locations";
		}
		$data["master_body"] = "manually";   
		$this->load->theme('mainlayout', $data);  
    }	
	
    public function deleteLocation($id){
      	$this->locations_model->delete_location($id);
        redirect(BASEURL.'/location');
    }
	
	public function loc_cat(){
		$data["loc_cat"] =  $this->locations_model->get_locations_categories();
		$data["master_title"] = "List of locations categories";
		$data["master_body"] = "loc_cat";   
		$this->load->theme('mainlayout', $data); 
    }
	

	
	public function deleteLocationCat($id){
      	$this->locations_model->delete_LocationCat($id);
        redirect(BASEURL.'/location/loc_cat');
    }
	
	
	
	
	
	
	
	
}
