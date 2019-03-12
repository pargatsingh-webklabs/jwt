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
		echo "hello";die;
		$uploading_data = $this->locations_model->check_uploading_files();
        $data["categoriesdata"]=$this->categories_model->get_all_categories();		
		$post = $this->input->post();
        $union_id = mt_rand(1056,1000000);
        if(!empty($post)){
	    $userdata = $this->session->userdata('userdata');
	    if(!empty($_FILES)){
          if($_FILES['upload_file']['name']){
			 $existing_category = explode(",",$post['existing_category']); 			
		     $files_lenght = count($_FILES['upload_file']['name']);
				for($i=0;$i<$files_lenght;$i++){
				$allowed =  array('csv'); 
				$filename = $_FILES['upload_file']['name'][$i];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(!in_array($ext,$allowed) ) {
					echo 'Invalid file extension';
				}else{
					$_FILES['userfile']['name']= $_FILES['upload_file']['name'][$i];
					$_FILES['userfile']['type']    = $_FILES['upload_file']['type'][$i];
					$_FILES['userfile']['tmp_name'] = $_FILES['upload_file']['tmp_name'][$i];
					$_FILES['userfile']['error'] = $_FILES['upload_file']['error'][$i];
					$_FILES['userfile']['size']    = $_FILES['upload_file']['size'][$i]; 
					$config['upload_path'] ='./assets/uploads/';
					$config['allowed_types'] = '*';
					$config['file_name'] =  $_FILES['upload_file']['name'][$i];
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload()) {
						$error = array('error' => $this->upload->display_errors());
						debug($error);die;
					} else{

						$data = array('upload_data' => $this->upload->data());
						$file_name = $data['upload_data']['file_name'];
						$file_path = 'assets/uploads/'.$file_name;
						chmod($file_path, 0777);
						$category_id = $existing_category[$i];					
						$file_info['name'] = $file_name;
						$file_info['admin_id'] = $userdata['id'];					
						$file_info['category_id'] = $category_id;	
						$file_info['union_id'] = $union_id;	
						$response = $this->locations_model->upload_file_info($file_info);
						echo "file uploaded <br/>" ;
					}
				}	
			}
			   if($response){
					$this->session->set_flashdata('successmsg', 'Requested file has been inserted successfully');
					redirect(BASEURL.'/location/file');	   
			   }else{
					$this->session->set_flashdata('errormsg', 'Error tracking your requested file , please try again');
					redirect(BASEURL.'/location/file');		   
			   }			  
		  }
			
		debug($_FILES);	
		debug($post);	
			die;
	/*		
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
		        $category_id = $post['existing_category'];					
				$file_info['name'] = $file_name;
				$file_info['admin_id'] = $userdata['id'];					
				$file_info['category_id'] = $category_id;	
				$response = $this->locations_model->upload_file_info($file_info);
   			    echo "file uploaded <br/>" ;
				if($response){
					// insert category in categories table
					$category_id = $post['existing_category'];
					$category_name = $this->categories_model->get_category_name($category_id);
			//------------------------------------------------------------------------------------------------------------------------------------
					$locations_headings = array('store_number', 'store_type', 'address', 'city', 'state', 'zip_code', 'phone_number', 'play_place', 'drive_through', 'arch_card', 'free_wifi', 'latitude', 'longitude', 'geo_accuracy', 'country', 'country_code', 'county');
					// read a valid csv file and converts it to an array
					$rows = array_map('str_getcsv', file($file_path));
					$csv = array();
					$i = 0;
					$unwanted_rows = array();
					$header = array();

					foreach($rows as $row) {
						if ($i == 0) {
							$j = 0;
							foreach($row as $rowVal) {
								$rowVal = preg_replace('/\s+/', '', $rowVal);
								if (in_array($rowVal, $locations_headings)) {
									$header[] = $rowVal;
								}
								else {
									$unwanted_rows[] = $j;
								}

								$j++;
							}
						}

						foreach($unwanted_rows as $UnWrowVal) {
							unset($row[$UnWrowVal]);
						}

						$csv1 = array_combine($header, $row);
						if (empty($csv1['store_type'])) {
							$csv1['store_type'] = $category_name;
						}

						$csv[] = $csv1;
						$i++;
					}
			//======================================================================================================================================

					// tryverse converted array to insert to insert values to locations and category_location table

					foreach($csv as $key => $locations){

						if($key!=0){
			if(@$locations['latitude'] && $locations['latitude']!=0 && @$locations['longitude'] &&  $locations['longitude']!=0){		
						   $location_id = $this->locations_model->add_location($locations);
						if(@$location_id && @$category_id){
						   $response_fi = $this->locations_model->add_category_location(array('category_id'=>$category_id,'location_id'=>$location_id));
						}	 								
						}
						}
					}

					//----------------------------------------------------------------------------------------------------------

				   if($response_fi){
						$this->session->set_flashdata('successmsg', 'Requested file has been inserted successfully');
						redirect(BASEURL.'/location/file');	   
				   }else{
						$this->session->set_flashdata('errormsg', 'Error tracking your requested file , please try again');
						redirect(BASEURL.'/location/file');		   
				   }

				}else{
					$this->session->set_flashdata('errormsg', 'Error tracking your requested file , please try again');
					redirect(BASEURL.'/location/file');
				}				
			}				
		}*/
   }
}

		if($uploading_data>0){
			$data["master_title"] = "Uploading Files";	
			$data["master_body"] = "uploading_in";   
			$this->load->theme('mainlayout', $data);		
		}else{
	        $data["master_title"] = "Upload Locations File";	
			$data["master_body"] = "upload";   
			$this->load->theme('mainlayout', $data);   
		}		
				
    }
/*    public function file(){
		
		$data["categoriesdata"]=$this->categories_model->get_all_sub_categories();
		$post = $this->input->post();
        if(!empty($post)){
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
			echo "file uploaded <br/>" ;
				if($response){
						// insert category in categories table
						$category_id = $post['existing_category'];
						$category_name = $this->categories_model->get_category_name($category_id);
				//------------------------------------------------------------------------------------------------------------------------------------
						$locations_headings = array('store_number', 'store_type', 'address', 'city', 'state', 'zip_code', 'phone_number', 'play_place', 'drive_through', 'arch_card', 'free_wifi', 'latitude', 'longitude', 'geo_accuracy', 'country', 'country_code', 'county');
						// read a valid csv file and converts it to an array
					echo $file_path;
						$rows = array_map('str_getcsv', file($file_path));
						$csv = array();
						$i = 0;
						$unwanted_rows = array();
						$header = array();

						foreach($rows as $row) {
							if ($i == 0) {
								$j = 0;
								foreach($row as $rowVal) {
									$rowVal = preg_replace('/\s+/', '', $rowVal);
									if (in_array($rowVal, $locations_headings)) {
										$header[] = $rowVal;
									}
									else {
										$unwanted_rows[] = $j;
									}

									$j++;
								}
							}

							foreach($unwanted_rows as $UnWrowVal) {
								unset($row[$UnWrowVal]);
							}

							$csv1 = array_combine($header, $row);
							if (empty($csv1['store_type'])) {
								$csv1['store_type'] = $category_name;
							}

							$csv[] = $csv1;
							$i++;
						}
				//======================================================================================================================================
				debug($csv);die;
						// tryverse converted array to insert to insert values to locations and category_location table

						foreach($csv as $key => $locations){

							if($key!=0){
				if(@$locations['latitude'] && $locations['latitude']!=0 && @$locations['longitude'] &&  $locations['longitude']!=0){		
							   $location_id = $this->locations_model->add_location($locations);
							if(@$location_id && @$category_id){
							   $response_fi = $this->locations_model->add_category_location(array('category_id'=>$category_id,'location_id'=>$location_id));
							}	 								
							}
							}
						}

						//----------------------------------------------------------------------------------------------------------

					   if($response_fi){
							$this->session->set_flashdata('successmsg', 'Requested file has been inserted successfully');
							redirect(BASEURL.'/location/file');	   
					   }else{
							$this->session->set_flashdata('errormsg', 'Error tracking your requested file , please try again');
							redirect(BASEURL.'/location/file');		   
					   }

					}else{
						$this->session->set_flashdata('errormsg', 'Error tracking your requested file , please try again');
						redirect(BASEURL.'/location/file');
					}				
				
				
				
				
			}				
		}
	}
		
}

			$data["master_title"] = "Upload Locations File";	
			$data["master_body"] = "upload";   
			$this->load->theme('mainlayout', $data);   
		
    }

*/

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
		$post = $this->input->post();
        if(!empty($post["cat_chk"])){
		   foreach($post["cat_chk"] as $key => $val){
      	     $this->locations_model->delete_location($val);			   
		   }
		}else{
      	   $this->locations_model->delete_location($id);
		}		
		
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
