<div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
		<div class="col-md-12">
			<div class="card">
				<div class="panel panel-default">
				<div class="header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
				<div class="panel-body">
				<form id='edit_profile' method="post" action="<?php echo BASEURL; ?>/manage_admin/add" enctype="multipart/form-data">
<div class="row clearfix">
	<div class="col-sm-4">
			<div class="form-group">
                                    <div class="form-line">
										<label>First Name</label>
										<input  class="form-control" name="first_name" placeholder="Enter First name" type="text">
                                      </div>
             </div>
		
	</div>
	<div class="col-sm-4">
			<div class="form-group">
                   <div class="form-line">
						<label>Last Name</label>
                         <input  class="form-control"  name="last_name" placeholder="Enter last name" type="text">
                     </div>
              </div>
		
   </div>
	<div class="col-sm-4">
			<div class="form-group">
                   <div class="form-line">
						<label>Display Name</label>
                        <input  class="form-control" name="display_name" placeholder="Enter Display name" type="text">
                     </div>
              </div>
		
   </div>
</div>
				
<div class="row clearfix">
		<div class="col-sm-4">
				<div class="form-group">
                          <div class="form-line">
											<label>Email</label>
							<input  class="form-control"  name="email"  placeholder="Enter Email Address" type="email">
                            </div>
                 </div>
		
		</div>
		<div class="col-sm-4">
				<div class="form-group">
                          <div class="form-line">
												<label>Password</label>
										         <input  class="form-control" name="pass" placeholder="Your password" type="password">
                              </div>
                      </div>
		
		</div>

</div>	
	
<div class="row clearfix">
		<div class="col-sm-12">
				<div class="form-group">
                                        <div class="form-line">
											<label>about_myself</label>
											 <textarea id="ckeditor" rows="4" class="form-control no-resize" name="about_myself" placeholder="About yourself"></textarea>
										 </div>
                                    </div>
		
		</div>
			
</div>	
	<div class="row clearfix">
				
					<div class="row clearfix">
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-light-green">
                            <h2>
                           Previleges
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                                <li>
  <div class="demo-checkbox">
                              <input id="select_all" type="checkbox" class="chk-col-black" >
                                <label for="select_all">Select all previledges</label>
						</div>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                           
<div class="row clearfix">
					
	<div class="col-sm-6">
							<label>Locations</label>
							
						<div class="demo-checkbox">
                              <input class="chk-col-black checkbox" id="basic_checkbox_1" name='previlege[location/index]' type="checkbox">
                                <label for="basic_checkbox_1">List Location</label>
                                 <input class="chk-col-black checkbox" id="basic_checkbox_2" name='previlege[location/manually]' type="checkbox">
                                <label for="basic_checkbox_2">add manually</label>
                                <input class="chk-col-black checkbox" id="basic_checkbox_3" name='previlege[location/manually]' type="checkbox">
                                <label for="basic_checkbox_3">Edit Location</label>
							 <input class="chk-col-black checkbox" id="basic_checkbox_4" name='previlege[location/file]' type="checkbox">
                                <label for="basic_checkbox_4">Upload location</label>
								 <input class="chk-col-black checkbox" id="basic_checkbox_5" name='previlege[location/deleteLocation]' type="checkbox">
                                <label for="basic_checkbox_5">Delete location</label>
							</div>
	</div>
							<div class="col-sm-6">
							<label>Location Category</label>
						        <div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="checkbox_1" name='previlege[categories/index]' type="checkbox">
                                <label  for="checkbox_1">List Categroy Location</label>
                                 <input class="chk-col-black checkbox" id="checkbox_2" name='previlege[categories/manage]' type="checkbox">
                                <label for="checkbox_2">Add New</label>
                                <input class="chk-col-black checkbox" id="checkbox_3" name='previlege[categories/manage]'  type="checkbox">
                                <label for="checkbox_3">Edit Category</label>
								 <input class="chk-col-black checkbox" id="checkbox_4" name='previlege[categories/deletecategory]' type="checkbox">
                                <label for="checkbox_4">Delete LOcation Category</label>
								</div>
                            </div>
								
							
					

						<div class="col-sm-6">
							<label>Manage Home Features</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="edit"name='previlege[homefeatures/index]'  type="checkbox">
                                <label for="edit">List Home Feature</label>
							 <input class="chk-col-black checkbox" id="edit1"name='previlege[homefeatures/edit]'  type="checkbox">
                                <label for="edit1">Edit Home Feature</label>
								 
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Manage Home Page video</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="video" name='previlege[home_video/index]'  type="checkbox">
                                <label for="video">Edit Home Page Video</label>
								</div>
                            </div>
								
							
				
						<div class="col-sm-6">
							<label>Home Banners</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="banner1" name='previlege[home_banners/index]' type="checkbox">
                                <label for="banner1">List Banners</label>
                                 <input class="chk-col-black checkbox" id="banner2" name='previlege[home_banners/add]' type="checkbox">
                                <label for="banner2">Add Banner</label>
                                <input class="chk-col-black checkbox" id="banner3" name='previlege[home_banners/edit]'  type="checkbox">
                                <label for="banner3">Edit Banner</label>
								 <input class="chk-col-black checkbox" id="banner4" name='previlege[home_banners/delete]' type="checkbox">
                                <label for="banner4">Delete Banner</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Manage Example video</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="example1" name='previlege[example/index]' type="checkbox">
                                <label for="example1">List Example Video</label>
                                 <input class="chk-col-black checkbox" id="example2" name='previlege[example/add]' type="checkbox">
                                <label for="example2">Add Example Video</label>
                                <input class="chk-col-black checkbox" id="example3" name='previlege[example/edit]'  type="checkbox">
                                <label for="example3">Edit Example Video</label>
								 <input class="chk-col-black checkbox" id="example4" name='previlege[example/delete]' type="checkbox">
                                <label for="example4">Delete Example Video</label>
								</div>
                            </div>
								
							
					
						<div class="col-sm-6">
							<label>Send Mail</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="mail" name='previlege[send/index]' type="checkbox">
                                <label for="mail">Send</label>
                               	</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Update Profile</label>
						<div class="demo-checkbox">
                               
                                <input class="chk-col-black checkbox" id="profile" name='previlege[profile/index]'  type="checkbox">
                                <label for="profile">Edit Profile</label>
								
								</div>
                            </div>
								
							
					
						<div class="col-sm-6">
							<label>Manage Users</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="users1" name='previlege[users/lindex]' type="checkbox">
                                <label for="users1">List Users</label>
                                                   
								 <input class="chk-col-black checkbox" id="users4" name='previlege[users/deleteUser]' type="checkbox">
                                <label for="users4">Delete User</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Manage Admin</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="admin1" name='previlege[manage_admin/index]' type="checkbox">
                                <label for="admin1">List Admins</label>
                                 <input class="chk-col-black checkbox" id="admin2" name='previlege[manage_admin/add]' type="checkbox">
                                <label for="admin2">Add New Admin</label>
                                <input class="chk-col-black checkbox" id="admin3" name='previlege[manage_admin/edit]'  type="checkbox">
                                <label for="admin3">Edit Admin</label>
								 <input class="chk-col-black checkbox" id="admin4" name='previlege[manage_admin/delete]' type="checkbox">
                                <label for="admin4">Delete Admin</label>
								</div>
                            </div>
								
				
						<div class="col-sm-6">
							<label>Email Templates</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="temp1" name='previlege[template/index]' type="checkbox">
                                <label for="temp1">List Temlates</label>
                                <input class="chk-col-black checkbox" id="temp3" name='previlege[template/edit_template]'  type="checkbox">
                                <label for="temp3">Edit Template</label>
								 <input class="chk-col-black checkbox" id="temp4" name='previlege[template/delete]' type="checkbox">
                                <label for="temp4">Delete Template</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>CMS Pages</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="cms1" name='previlege[cms/index]' type="checkbox">
                                <label for="cms1">List CMS Page</label>
                                 <input class="chk-col-black checkbox" id="cms2" name='previlege[cms/manage_cms_pages]' type="checkbox">
                                <label for="cms2">Add New PAge</label>
                                <input class="chk-col-black checkbox" id="cms3" name='previlege[cms/manage_cms_pages]'  type="checkbox">
                                <label for="cms3">Edit Page</label>
								
								</div>
                            </div>
								
							
				
						<div class="col-sm-6">
							<label>Blogs</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="blogs1" name='previlege[blogs/index]' type="checkbox">
                                <label for="blogs1">List Blogs</label>
                                  <input class="chk-col-black checkbox" id="blogs2" name='previlege[blogs/add_blogs]' type="checkbox">
                                <label for="blogs2">Add Blog</label>
                                <input class="chk-col-black checkbox" id="blogs3" name='previlege[blogs/add_blogs]'  type="checkbox">
                                <label for="blogs3">Edit Blog</label>
								 <input class="chk-col-black checkbox" id="blogs4" name='previlege[blogs/deleteblogs]' type="checkbox">
                                <label for="blogs4">Delete Blogs</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Packages</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="packages1" name='previlege[package/list_pack]' type="checkbox">
                                <label for="packages1">List Package</label>
                                 <input class="chk-col-black checkbox" id="packages2" name='previlege[package/add]' type="checkbox">
                                <label for="packages2">Add Package</label>
                                <input class="chk-col-black checkbox" id="packages3" name='previlege[package/edit]'  type="checkbox">
                                <label for="packages3">Edit Package</label>
								 <input class="chk-col-black checkbox" id="packages4" name='previlege[package/delete_package]' type="checkbox">
                                <label for="packages4">Delete Package</label>
								</div>
                            </div>
								
			
						<div class="col-sm-6">
							<label>FAQ's</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="faq1" name='previlege[faq/index]' type="checkbox">
                                <label for="faq1">List FAQ</label>
                                  <input class="chk-col-black checkbox" id="faq2" name='previlege[faq/add]' type="checkbox">
                                <label for="faq2">Add FAQ</label>
                                <input class="chk-col-black checkbox" id="faq3" name='previlege[faq/edit]'  type="checkbox">
                                <label for="faq3">Edit FAQ</label>
								 <input class="chk-col-black checkbox" id="faq4" name='previlege[faq/delete_faq]' type="checkbox">
                                <label for="faq4">Delete FAQ</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>FAQ's Categories</label>
						<div class="demo-checkbox">
                                <input class="chk-col-black checkbox" id="fcat1" name='previlege[faq/get_category]' type="checkbox">
                                <label for="fcat1">List FAQ Category</label>
                                 <input class="chk-col-black checkbox" id="fcat2" name='previlege[faq/add_category]' type="checkbox">
                                <label for="fcat2">Add Category</label>
                                <input  class="chk-col-black checkbox" id="fcat3" name='previlege[faq/edit_category]'  type="checkbox">
                                <label for="fcat3">Edit Category</label>
								 <input class="chk-col-black checkbox" id="fcat4" name='previlege[faq/delete_category]' type="checkbox">
                                <label for="fcat4">Delete Category</label>
								</div>
                            </div>					
					
					
</div> 
                        </div>
                    </div>
                </div>

					</div>
					
					
					<div class="form-line">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-6 ">
							<div id="loader" class="pull-right " >
							</div>	
							</div>	
								<div class="col-md-6 col-sm-6 col-xs-6 ">
								<div class="pull-right ">
								<button type="submit" class="btn bg-red waves-effect">Submit</button>
                         		<a href="<?php echo BASEURL; ?>/manage_admin"  class="btn bg-grey waves-effect" > Cancel</a>     
									
								</div>
								</div>
							</div>
						</div>
					</div>		
					
					
					</form>

				</div>
			</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
