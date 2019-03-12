<div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
		<div class="col-md-12">
			<div class="card">
				<div class="panel panel-default">
				<div class="header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
				<div class="panel-body">
				<form id='edit_profile' method="post" action="<?php echo BASEURL ?>/manage_admin/edit/<?php echo $admin['id']; ?>" enctype="multipart/form-data">
<div class="row clearfix">
	<div class="col-sm-4">
			<div class="form-group">
                                    <div class="form-line">
										<label>First Name</label>
										<input type="hidden" value="<?php echo $admin['id']; ?>" name="id">
										<input  class="form-control" name="first_name" value="<?php echo $admin['first_name']; ?>" type="text">
                                      </div>
             </div>
		
	</div>
	<div class="col-sm-4">
			<div class="form-group">
                   <div class="form-line">
						<label>Last Name</label>
                         <input  class="form-control"  name="last_name" value="<?php echo $admin['last_name']; ?>" type="text">
                     </div>
              </div>
		
   </div>
	<div class="col-sm-4">
			<div class="form-group">
                   <div class="form-line">
						<label>Display Name</label>
                        <input  class="form-control" name="display_name" value="<?php echo $admin['display_name']; ?>" type="text">
                     </div>
              </div>
		
   </div>
</div>
				
<div class="row clearfix">
		<div class="col-sm-4">
				<div class="form-group">
                          <div class="form-line">
											<label>Email</label>
							  <input type="hidden" value="<?php echo $admin['email']; ?>" name="pass">
							<input  class="form-control"  name="email"  value="<?php echo $admin['email']; ?>" type="email">
                            </div>
                 </div>
		
		</div>

</div>	
	
<div class="row clearfix">
		<div class="col-sm-12">
				<div class="form-group">
                                        <div class="form-line">
											<label>about_myself</label>
											 <textarea id="ckeditor" rows="4" class="form-control no-resize" name="about_myself" ><?php echo $admin['about_myself']; ?></textarea>
										 </div>
                                    </div>
		
		</div>
			
</div>	
	<div class="row clearfix">
		<div class="col-sm-12">
				<div class="form-group">
                                        <div class="form-line">
											<label>Facebook Link</label>
											<input  class="form-control" name="fb_link" value="<?php echo $admin['fb_link']; ?>" type="text">
                                        </div>
                                    </div>
		
		</div>

</div>	

<div class="row clearfix">
		<div class="col-sm-12">
				<div class="form-group">
                                        <div class="form-line">
											<label>Twitter link</label>
											<input  class="form-control" name="tw_link" value="<?php echo $admin['tw_link']; ?>" type="text">
                                        </div>
                                    </div>
		
		</div>

</div>	
					
<div class="row clearfix">
		<div class="col-sm-12">
				<div class="form-group">
                                        <div class="form-line">
												<label>Linked In link</label>
											<input  class="form-control" name="linked_in_link" value="<?php echo $admin['linked_in_link']; ?>" type="text" >
                                        </div>
                                    </div>
		
		</div>

</div>						
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
	  				<?php
							$chk_all = get_previlege_data(array("id"=>$admin['id'], "name"=>'all'));
							//debug($chk_val);die;
							?>
                              <input <?php if($chk_all == 'on') echo 'checked';?> id="select_all" type="checkbox" class="chk-col-black" name="previlege[all]" >
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
							<?php
							$chk_val = get_previlege_data(array("id"=>$admin['id'], "name"=>'location/index'));
							//debug($chk_val);die;
							?>
                              <input <?php if($chk_val == 'on') echo 'checked';?> class="chk-col-black checkbox" id="basic_checkbox_1"  name='previlege[location/index]' type="checkbox">
                                <label for="basic_checkbox_1">List Location</label>
						<?php
							$chk_loc = get_previlege_data(array("id"=>$admin['id'], "name"=>'location/manually'));
							?>
                                 <input <?php if($chk_loc == 'on') echo 'checked';?> class="chk-col-black checkbox" id="basic_checkbox_2" name='previlege[location/manually]' type="checkbox">
                                <label for="basic_checkbox_2">add manually</label>
							<?php
							$chk_loc_edit = get_previlege_data(array("id"=>$admin['id'], "name"=>'location/manually'));
							?>
                                <input <?php if($chk_loc_edit == 'on') echo 'checked';?> class="chk-col-black checkbox" id="basic_checkbox_3" name='previlege[location/manually]' type="checkbox">
                                <label for="basic_checkbox_3">Edit Location</label>
							<?php
							$chk_loc_up = get_previlege_data(array("id"=>$admin['id'], "name"=>'location/file'));
							?>
								 <input <?php if($chk_loc_up == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="basic_checkbox_4" name='previlege[location/file]' type="checkbox">
                                <label for="basic_checkbox_4">Upload location</label>
				<?php
							$chk_loc_del = get_previlege_data(array("id"=>$admin['id'], "name"=>'llocation/deleteLocation'));
							?>
								 <input <?php if($chk_loc_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="basic_checkbox_5" name='previlege[location/deleteLocation]' type="checkbox">
                                <label for="basic_checkbox_5">Delete location</label>
							</div>
	</div>
							<div class="col-sm-6">
							<label>Location Category</label>
						        <div class="demo-checkbox">
									<?php
							$chk_cat = get_previlege_data(array("id"=>$admin['id'], "name"=>'categories/index'));
							?>
                                <input <?php if($chk_cat == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="checkbox_1" name='previlege[categories/index]' type="checkbox">
                                <label  for="checkbox_1">List Categroy Location</label>
									<?php
							$chk_cat_add = get_previlege_data(array("id"=>$admin['id'], "name"=>'categories/manage'));
							?>
                                 <input <?php if($chk_cat_add == 'on') echo 'checked'; ?>  class="chk-col-black checkbox" id="checkbox_2" name='previlege[categories/manage]' type="checkbox">
                                <label for="checkbox_2">Add New</label>
									<?php
							$chk_cat_edit = get_previlege_data(array("id"=>$admin['id'], "name"=>'categories/manage'));
							?>
                                <input <?php if($chk_cat_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="checkbox_3" name='previlege[categories/manage]'  type="checkbox">
                                <label for="checkbox_3">Edit Category</label>
									<?php
							$chk_cat_del = get_previlege_data(array("id"=>$admin['id'], "name"=>'categories/deletecategory'));
							?>
								 <input <?php if($chk_cat_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="checkbox_4" name='previlege[categories/deletecategory]' type="checkbox">
                                <label for="checkbox_4">Delete LOcation Category</label>
								</div>
                            </div>
								
							
					

						<div class="col-sm-6">
							<label>Home Features</label>
						<div class="demo-checkbox">
							<?php
							$chk_fea = get_previlege_data(array("id"=>$admin['id'], "name"=>'homefeatures/index'));
							?>
                                <input <?php if($chk_fea == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="edit" name='previlege[homefeatures/index]'  type="checkbox">
                                <label for="edit">List Home Feature</label>
							<?php
							$chk_fea_edit = get_previlege_data(array("id"=>$admin['id'], "name"=>'homefeatures/edit'));
							?>
                                <input <?php if($chk_fea_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="edit1" name='previlege[homefeatures/edit]'  type="checkbox">
                                <label for="edit1">Edit Home Feature</label>
								 
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Home Page video</label>
						<div class="demo-checkbox">
							<?php
							$chk_video= get_previlege_data(array("id"=>$admin['id'], "name"=>'home_video/index'));
							?>
                                <input <?php if($chk_video == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="video" name='previlege[home_video/index]'  type="checkbox">
                                <label for="video">Edit Home Page Video</label>
								</div>
                            </div>
								
							
				
						<div class="col-sm-6">
							<label>Home Banners</label>
						<div class="demo-checkbox">
							<?php
							$chk_ban= get_previlege_data(array("id"=>$admin['id'], "name"=>'home_banners/index'));
							?>
                                <input <?php if($chk_ban == 'on') echo 'checked';?> class="chk-col-black checkbox" id="banner1" name='previlege[home_banners/index]' type="checkbox">
                                <label for="banner1">List Banners</label>
							<?php
							$chk_ban_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'home_banners/add'));
							?>
                                 <input <?php if($chk_ban == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="banner2" name='previlege[home_banners/add]' type="checkbox">
                                <label for="banner2">Add Banner</label>
							<?php
							$chk_ban_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'home_banners/edit'));
							?>
                                <input  <?php if($chk_ban_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="banner3" name='previlege[home_banners/edit]'  type="checkbox">
                                <label for="banner3">Edit Banner</label>
							<?php
							$chk_ban_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'home_banners/delete'));
							?>
								 <input  <?php if($chk_ban_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="banner4" name='previlege[home_banners/delete]' type="checkbox">
                                <label for="banner4">Delete Banner</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Manage Example video</label>
						<div class="demo-checkbox">
							<?php
							$chk_example= get_previlege_data(array("id"=>$admin['id'], "name"=>'example/index'));
							?>
                                <input <?php if($chk_example == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="example1" name='previlege[example/index]' type="checkbox">
                                <label for="example1">List Example Video</label>
							<?php
							$chk_example_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'example/add'));
							?>
                                 <input <?php if($chk_example_add == 'on') echo 'checked'; ?>  class="chk-col-black checkbox" id="example2" name='previlege[example/add]' type="checkbox">
                                <label for="example2">Add Example Video</label>
							<?php
							$chk_example_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'example/edit'));
							?>
                                <input <?php if($chk_example_edit == 'on') echo 'checked'; ?>  class="chk-col-black checkbox" id="example3" name='previlege[example/edit]'  type="checkbox">
                                <label for="example3">Edit Example Video</label>
							<?php
							$chk_example_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'example/delete'));
							?>
								 <input <?php if($chk_example_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="example4" name='previlege[example/delete]' type="checkbox">
                                <label for="example4">Delete Example Video</label>
								</div>
                            </div>
								
							
					
						<div class="col-sm-6">
							<label>Send Mail</label>
						<div class="demo-checkbox">
							<?php
							$chk_send= get_previlege_data(array("id"=>$admin['id'], "name"=>'send/index'));
							?>
                                <input <?php if($chk_send == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="mail" name='previlege[send/index]' type="checkbox">
                                <label for="mail">Send</label>
                               	</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Update Profile</label>
						<div class="demo-checkbox">
                               <?php
							$chk_profile= get_previlege_data(array("id"=>$admin['id'], "name"=>'profile/index'));
							?>
                                <input <?php if($chk_profile == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="profile" name='previlege[profile/index]'  type="checkbox">
                                <label for="profile">Edit Profile</label>
								
								</div>
                            </div>
								
							
					
						<div class="col-sm-6">
							<label>Manage Users</label>
						<div class="demo-checkbox">  <?php
							$chk_users= get_previlege_data(array("id"=>$admin['id'], "name"=>'users/lindex'));
							?>
                                <input <?php if($chk_users == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="users1" name='previlege[users/lindex]' type="checkbox">
                                <label for="users1">List Users</label>
							
							<?php
							$chk_users_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'users/deleteUser'));
							?>
								 <input <?php if($chk_users_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="users4" name='previlege[users/deleteUser]' type="checkbox">
                                <label for="users4">Delete User</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Manage Admin</label>
						<div class="demo-checkbox">
							<?php
							$chk_admin= get_previlege_data(array("id"=>$admin['id'], "name"=>'manage_admin/index'));
							?>
                                <input <?php if($chk_admin == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="admin1" name='previlege[manage_admin/index]' type="checkbox">
                                <label for="admin1">List Admins</label>
								<?php
							$chk_admin_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'manage_admin/add'));
							?>
                                 <input <?php if($chk_admin_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="admin2" name='previlege[manage_admin/add]' type="checkbox">
                                <label for="admin2">Add New Admin</label>
							<?php
							$chk_admin_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'manage_admin/edit'));
							?>
                                <input <?php if($chk_admin_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="admin3" name='previlege[manage_admin/edit]'  type="checkbox">
                                <label for="admin3">Edit Admin</label>
							<?php
							$chk_admin_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'manage_admin/delete'));
							?>
								 <input <?php if($chk_admin_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="admin4" name='previlege[manage_admin/delete]' type="checkbox">
                                <label for="admin4">Delete Admin</label>
								</div>
                            </div>
								
				
						<div class="col-sm-6">
							<label>Email Templates</label>
						<div class="demo-checkbox">
							<?php
							$chk_tmp= get_previlege_data(array("id"=>$admin['id'], "name"=>'emplate/index'));
							?>
                                <input <?php if($chk_tmp == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="temp1" name='previlege[emplate/index]' type="checkbox">
                                <label for="temp1">List Temlates</label>
							
							<?php
							$chk_tmp_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'template/edit_template'));
							?>
                                <input <?php if($chk_tmp_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="temp3" name='previlege[template/edit_template]'  type="checkbox">
                                <label for="temp3">Edit Template</label>
							<?php
							$chk_tmp_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'template/delete'));
							?>
								 <input <?php if($chk_tmp_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="temp4" name='previlege[template/delete]' type="checkbox">
                                <label for="temp4">Delete Template</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>CMS Pages</label>
						<div class="demo-checkbox">
							<?php
							$chk_pages= get_previlege_data(array("id"=>$admin['id'], "name"=>'cms/index'));
							?>
                                <input <?php if($chk_pages == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="cms1" name='previlege[cms/index]' type="checkbox">
                                <label for="cms1">List CMS Page</label>
							<?php
							$chk_pages_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'cms/manage_cms_pages'));
							?>
                                 <input <?php if($chk_pages_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="cms2" name='previlege[cms/manage_cms_pages]' type="checkbox">
                                <label for="cms2">Add New PAge</label>
							<?php
							$chk_pages_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'cms/manage_cms_pages'));
							?>
                                <input <?php if($chk_pages_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="cms3" name='previlege[cms/manage_cms_pages]'  type="checkbox">
                                <label for="cms3">Edit Page</label>
							
								</div>
                            </div>
								
							
				
						<div class="col-sm-6">
							<label>Blogs</label>
						<div class="demo-checkbox">
							<?php
							$chk_blogs= get_previlege_data(array("id"=>$admin['id'], "name"=>'blogs/index'));
							?>
                                <input <?php if($chk_blogs == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="blogs1" name='previlege[blogs/index]' type="checkbox">
                                <label for="blogs1">List Blogs</label>
							<?php
							$chk_blogs_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'blogs/add_blogs'));
							?>
                                  <input <?php if($chk_blogs_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="blogs2" name='previlege[blogs/add_blogs]' type="checkbox">
                                <label for="blogs2">Add Blog</label>
							<?php
							$chk_blogs_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'[blogs/add_blogs'));
							?>
                                <input <?php if($chk_blogs_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="blogs3" name='previlege[[blogs/add_blogs]'  type="checkbox">
                                <label for="blogs3">Edit Blog</label>
							<?php
							$chk_blogs_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'blogs/deleteblogs'));
							?>
								 <input <?php if($chk_blogs_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="blogs4" name='previlege[blogs/deleteblogs]' type="checkbox">
                                <label for="blogs4">Delete Blogs</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>Packages</label>
						<div class="demo-checkbox">
							<?php
							$chk_pack= get_previlege_data(array("id"=>$admin['id'], "name"=>'package/list_pack'));
							?>
                                <input <?php if($chk_pack == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="packages1" name='previlege[package/list_pack]' type="checkbox">
                                <label for="packages1">List Package</label>
							<?php
							$chk_pack_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'package/add'));
							?>
                                 <input <?php if($chk_pack_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="packages2" name='previlege[package/add]' type="checkbox">
                                <label for="packages2">Add Package</label>
							<?php
							$chk_pack_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'package/edit'));
							?>
                                <input <?php if($chk_pack_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="packages3" name='previlege[package/edit]'  type="checkbox">
                                <label for="packages3">Edit Package</label>
							<?php
							$chk_pack_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'package/delete_package'));
							?>
								 <input <?php if($chk_pack_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="packages4" name='previlege[package/delete_package]' type="checkbox">
                                <label for="packages4">Delete Package</label>
								</div>
                            </div>
								
			
						<div class="col-sm-6">
							<label>FAQ's</label>
						<div class="demo-checkbox">
							<?php
							$chk_faq= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/index'));
							?>
                                <input <?php if($chk_faq == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="faq1" name='previlege[faq/index]' type="checkbox">
                                <label for="faq1">List FAQ</label>
							<?php
							$chk_faq_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/add'));
							?>
                                  <input <?php if($chk_faq_add == 'on') echo 'checked'; ?>  class="chk-col-black checkbox" id="faq2" name='previlege[faq/add]' type="checkbox">
                                <label for="faq2">Add FAQ</label><?php
							$chk_faq_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/edit'));
							?>
                                <input <?php if($chk_faq_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="faq3" name='previlege[faq/edit]'  type="checkbox">
                                <label for="faq3">Edit FAQ</label>
							<?php
							$chk_faq_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/delete_faq'));
							?>
								 <input <?php if($chk_faq_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="faq4" name='previlege[faq/delete_faq]' type="checkbox">
                                <label for="faq4">Delete FAQ</label>
							</div>
                            </div>
	
							<div class="col-sm-6">
							<label>FAQ's Categories</label>
						<div class="demo-checkbox">
							<?php
							$chk_fcat= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/get_category'));
							?>
                                <input <?php if($chk_fcat == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="fcat1" name='previlege[faq/get_category]' type="checkbox">
                                <label for="fcat1">List FAQ Category</label>
							<?php
							$chk_fcat_add= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/add_category'));
							?>
                                 <input <?php if($chk_fcat_add == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="fcat2" name='previlege[faq/add_category]' type="checkbox">
                                <label for="fcat2">Add Category</label>
							<?php
							$chk_fcat_edit= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/edit_category'));
							?>
                                <input <?php if($chk_fcat_edit == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="fcat3" name='previlege[faq/edit_category]'  type="checkbox">
                                <label for="fcat3">Edit Category</label>
							<?php
							$chk_fcat_del= get_previlege_data(array("id"=>$admin['id'], "name"=>'faq/delete_category'));
							?>
								 <input <?php if($chk_fcat_del == 'on') echo 'checked'; ?> class="chk-col-black checkbox" id="fcat4" name='previlege[faq/delete_category]' type="checkbox">
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
