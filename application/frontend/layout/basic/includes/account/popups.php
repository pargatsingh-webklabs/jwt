<div class=" modal fade " id="add_family_members" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h2 class="modal-title" id="myModalLabel">Add Family Member</h2>
            </div>

            <div class="modal-body login-modal">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="formAddFamily" action="<?php echo BASEURL; ?>/users/addFamily" method="post" >
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Please enter First Name" name="fname" />
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Please enter Last Name" name="lname" />
                            </div>
                             <div class="row">
                           <div class="col-sm-12">
                            <div style="width:15px; float:left; margin-left:0px;" >
                                <input type="checkbox" name="visibility" value="1" />
                             </div>
                           <div class="chk-text">Allow other to see the First and Last Names</div>
                           </div> 
                          </div>
                          
                          <div class="form-group">
                                <div class="radio ">
                                        <div class="row">
                                            <div class="col-sm-3">Gender</div>
                                            <div class="col-sm-4"><input type="radio" name="gender" value="male" checked="checked" style="margin-left:-20px;">Male</div>
                                            <div class="col-sm-4"><input type="radio" name="gender" value="female" style="margin-left: -20px;">Female</div>
                                        </div>
                                    </div>  
                            </div>
                          
                          
                          
                            <div class="form-group">
                                <label>Nickname</label>
                                <input type="text" class="form-control" placeholder="Please enter Nick name" name="nick_name" />
                            </div>
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" placeholder="Please enter zip code" name="zip_code" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Please enter Email" name="email" />
                            </div>
                            
                           
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value='1'>Active</option>
                                    <option value='0'>Inactive</option>
                                </select>
                            </div>

                            <div id='addfamilymember'></div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary pull-right" value="Add" />
                                <input type='reset' style='display:none' id='resetAddFamily'>
                            </div>
                        </form>   
                    </div>      
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="modal-footer login_modal_footer">

            </div>

        </div>
    </div></div>




<div class="modal fade " id="choose_photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title" id="myModalLabel">Choose Profile Photo</h2>
            </div>

            <div class="modal-body login-modal">
                <?php echo form_open_multipart('account/updateuserimage', array("id" => "uploadform")); ?>
                <div class="row">
                    <div class="col-xs-12 col-md-5 ">
                        <div class="profile_picture pull-left">
                            <a href="#" id='avatar_pic'><img alt="avatar" id="avatar" style="height:150px;width:150px" src="<?php echo BASEURL; ?>/assets/users/profilepictures/<?php echo $userdata['image']; ?>" class="avatar" id="profile_picture"></a>
                            <canvas class='avatar' id="cvs" style="height:150px;width:215px"></canvas>
                            <div id="fileuploadingmessage" style="color:red"></div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-7" style="border-left:1px solid #ddd">
                        <div class="col-md-12">
                            <div style="border-bottom: 1px solid #ddd; padding-bottom:15px;">
                                <div class="fileUpload btn btn-primary " style="margin-left:0px;">
                                    <span>Upload From PC</span>
                                    <input type="file" name="userfile" size="20" class="upload btn1 pull-left" id="upload_file" />

                                </div><br>
                            </div>
                            <div id='center-line3'> OR </div>
                            <button data-toggle="modal" type="button" class="btn btn-primary pull-left" data-target="#choose_from_avatars" style="margin-top:25px; ">Choose from Avatars</button><br>

                        </div>
                    </div>
                </div> 

                <div class="row">

                    <div class="col-lg-2 pull-right" style="margin-right:10px;">
                        <button type='submit' id='btn_upload' class="btn btn-primary pull-right" name='btnuploadphoto'>Save</button>
                        <!--<a href="#" class="btn btn-primary" id="cancel">Cancel</a>-->
                    </div>
                </div>
            </div>
            </form>
            <div class="clearfix"></div>
            <div class="modal-footer login_modal_footer">

            </div>

        </div>
    </div></div>

<?php foreach ($get_user_family as $key => $val) { ?>
<div class=" modal fade " id="add_family_members<?php echo $val['superid'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h2 class="modal-title" id="myModalLabel">Edit <?php echo "@".$val['nick_name']; ?> profile</h2>
            </div>

            <div class="modal-body login-modal">
                <div class="row">
                    <div class="col-sm-12">
                        <form class='formAddFamily' id="formAddFamily" action="<?php echo BASEURL; ?>/users/editFamily" method="post" >
                            <input type='hidden' name='id' value="<?php echo $val['superid']; ?>">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Please enter First Name" name="fname" value="<?php echo $val['fname'];?>" />
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Please enter Last Name" name="lname" value="<?php echo $val['lname'];?>" />
                            </div>
                                <div class="row">
                           <div class="col-sm-12">
                            <div style="width:15px; float:left; margin-left:0px;" >
                                <input type="checkbox" name="visibility" <?php echo ($val['visibility']=="1")?"checked=checked":""; ?>  value="1" />
                             </div>
                           <div class="chk-text">Allow other to see the First and Last Names</div>
                           </div> 
                          </div>
                          
                             <div class="form-group">
                                                                <div class="radio ">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">Gender</div>
                                                                        <div class="col-sm-4"><label><input type="radio" name="gender" value="male" <?php echo ($val['gender']=="male")?'checked=checked':''; ?>  style="margin-left:-20px;">Male</label></div>
                                                                        <div class="col-sm-4"><label><input type="radio" name="gender" value="female" <?php echo ($val['gender']=="female")?'checked=checked':''; ?> style="margin-left: -20px;">Female</label></div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Please enter Email" name="email"  value="<?php echo $val['email'];?>" />
                            </div>
                            
                              <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" placeholder="Please enter zip code" name="zip_code"  value="<?php echo $val['zip_code'];?>" />
                            </div>
                           
                         
                           
                            
                                     
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option <?php echo ($val['status']=='1')?'checked=checked':''; ?> value='1'>Active</option>
                                    <option <?php echo ($val['status']=='1')?'checked=checked':''; ?> value='0'>Inactive</option>
                                </select>
                            </div>

                            <div class='addfamilymemberdiv'></div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary pull-right" value="Update" />
                                <input type='reset' style='display:none' id='resetAddFamily'>
                            </div>
                        </form>   
                    </div>      
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="modal-footer login_modal_footer">

            </div>

        </div>
    </div></div>
    <div class=" modal fade " id="choose_photo_family<?php echo $val['superid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header login_modal_header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h2 class="modal-title" id="myModalLabel">Edit photo for <?php echo $val['fname'] . ' ' . $val['lname']; ?></h2>
                </div>

                <div class="modal-body login-modal">
                    <?php echo form_open_multipart('account/updatefamilyimage', array("id" => "uploadform", 'class' => 'upload_family_pic')); ?>
                    <input type='hidden' name='family_user_id' value='<?php echo $val["superid"] ?>'>
                    <div class="row">
                        <div class="col-xs-12 col-md-5">
                            <div class="profile_picture pull-left">
                                <a href="#" id='avatar_pic_<?php echo $val["superid"]; ?>'><img alt="avatar" id="avatar_<?php echo $val['superid']; ?>" style="height:150px;width:150px" src="<?php echo BASEURL; ?>/assets/users/profilepictures/<?php echo $val['image']; ?>" class="avatar"></a>
                                <canvas class='avatar' id="cvs_<?php echo $val['superid']; ?>" style="height:150px;width:215px;position:absolute"></canvas>
                                <div id="fileuploadingmessage_<?php echo $val['superid']; ?>" class='fileuploadingmessage' style="color:red"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-7" style="border-left:1px solid #ddd">
                            <div class="col-md-12 ">
                                <div style="border-bottom: 1px solid #ddd; padding-bottom:15px;">
                                    <div class="fileUpload btn btn-primary" style="margin-left:0px;">
                                        <span>Upload From PC  </span>
                                        <input type="file" name="userfile" size="20" class="upload btn1 upload_file_family" id="<?php echo $val['superid']; ?>" />
                                    </div><br>
                                </div>
                                <div id='center-line3'> OR </div>
                                <button data-toggle="modal" type="button" class="btn btn-primary " data-target="#choose_from_avatars_family<?php echo $val['superid']; ?>" style="margin-top:25px; ">Choose from Avatars</button>
                            </div>
                        </div>
                    </div> 

                    <div class="row">

                        <div class="col-lg-2 pull-right" style="margin-right:10px;">
                            <button type='submit' id='btn_upload' class="btn btn-primary" name='btnuploadphoto'>Save</button>
                            <!--<a href="#" class="btn btn-primary" id="cancel">Cancel</a>-->
                        </div>
                    </div>
                </div>
                </form>
                <div class="clearfix"></div>
                <div class="modal-footer login_modal_footer">

                </div>

            </div>
        </div></div>
<?php } ?>
<?php foreach ($get_user_family as $key => $val) { ?>
    <div class=" modal fade " class="" id="choose_from_avatars_family<?php echo $val['superid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header login_modal_header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 class="modal-title" id="myModalLabel">Avatars</h2>


                </div>
                <div class="modal-body login-modal">

                    <div class="row avatar_gallary" id="avatar_gallary<?php echo $val['superid']; ?>">
                        <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                            <a href="#"><img class="img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar1.png" data-name="avatar1.png" alt="avatar1"></a>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                            <a href="#"><img class="img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar2.png" data-name="avatar2.png" alt="avatar2"></a>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                            <a href="#"><img class="img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar3.png" data-name="avatar3.png" alt="avatar3"></a>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                            <a href="#"><img class=" img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar-female1.png" data-name="avatar-female1.png" alt="avatar4"></a>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                            <a href="#"><img class="img-thumbnail img-responsive"  src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar-female2.png" data-name="avatar-female2.png" alt="avatar5"></a>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                            <a href="#"><img class="img-thumbnail img-responsive"  src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar-female3.png" data-name="avatar-female3.png" alt="avatar6"></a>
                        </div>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2 pull-right" style="margin-right:10px;">
                        <a href="#" class="btn btn-primary save_avator_src_family" id="<?php echo $val['superid']; ?>">Choose</a>
                        <!--<a href="#" class="btn btn-primary" id="cancel">Cancel</a>-->
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer login_modal_footer">

                </div>

            </div>
        </div>
    </div>
<?php } ?>

<div class=" modal fade " id="choose_from_avatars" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title" id="myModalLabel">Avatars</h2>


            </div>
            <div class="modal-body login-modal">

                <div class="row" id="avatar_gallary">
                    <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                        <a href="#"><img class="img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar1.png" data-name="avatar1.png" alt="avatar1"></a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                        <a href="#"><img class="img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar2.png" data-name="avatar2.png" alt="avatar2"></a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                        <a href="#"><img class="img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar3.png" data-name="avatar3.png" alt="avatar3"></a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                        <a href="#"><img class=" img-thumbnail img-responsive" src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar-female1.png" data-name="avatar-female1.png" alt="avatar4"></a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                        <a href="#"><img class="img-thumbnail img-responsive"  src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar-female2.png" data-name="avatar-female2.png" alt="avatar5"></a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12 avatar text-center">
                        <a href="#"><img class="img-thumbnail img-responsive"  src="<?php echo BASEURL; ?>/assets/users/profilepictures/avatar-female3.png" data-name="avatar-female3.png" alt="avatar6"></a>
                    </div>
                </div>
                <div class="col-lg-12"><br></div>
                <div class="col-lg-2 pull-right" style="margin-right:10px;">
                    <a href="#" class="btn btn-primary" id="save_avator_src">Choose</a>
                    <!--<a href="#" class="btn btn-primary" id="cancel">Cancel</a>-->
                </div>
                <div class="col-lg-12"><br></div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer login_modal_footer">

            </div>

        </div>
    </div>
</div>

<div class=" modal fade " id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title" id="myModalLabel">Change password</h2>


            </div>
            <div class="modal-body login-modal">
                <form id='changePasswordForm' action="<?php echo BASEURL; ?>/users/updatepassword" method="post">
                    <div class="col-sm-12 ">
                        <div class="form-group">
                            <input type="password" placeholder="Old password" id="old_password" name="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="New Password" id="new_password" name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Confirm new password" id="confirm_new_password" name="confirm_new_password" class="form-control">
                        </div>    
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div id="showupdatedpassword"></div>
                    <div class="col-lg-2 pull-right" style="margin-right:10px;">
                        <button class="btn btn-primary" type="submit" id="update_password">Update</a>
                            <!--<a href="#" class="btn btn-primary" id="cancel">Cancel</a>-->
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="modal-footer login_modal_footer">

            </div>

        </div>
    </div>
</div>







 