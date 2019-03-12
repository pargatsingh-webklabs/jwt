<div class="content-wrapper	">
	<div class="row well">
        <div class="col-md-12">
            <h1 style="color:#06216F;text-align: center;"><?php echo $master_title;  ?></h1>
            <hr />
 
    <div class="col-xs-12 col-sm-12 col-md-12">
      	<form id='updateProfileForm' method="post" action='<?php echo BASEURL; ?>/users/updateUserInfo' class="form-horizontal" role="form">   
			<div class="col-sm-6">
				<div class="form-group">
					<label1 class="control-label"style="text-align: left;"><h4>First name: </h4></label1>				
					  <input class="form-control" name='fname' id="fname" type="text" value="<?php echo $user_profile_data['fname'] ;?>">
					  <input type="hidden" id="userimage" name="image"/> 
				 </div>
			</div>
			
			<div class="col-sm-6">
				  <div class="form-group">
					<label1 class="control-label"style="text-align: left;"> <h4>Last name: </h4></label1>				
					<input class="form-control" name='lname' id="lastname" type="text" value="<?php echo $user_profile_data['lname'] ;?>">			
				  </div>
			</div>
			
			<div class="col-sm-6">
			  	<div class="form-group">
				<label1 class=" control-label"style="text-align: left;"> <h4>Email: </h4></label1>
				  <input class="form-control"  name='email' id="email" type="text" value="<?php echo $user_profile_data['email'] ;?>" readonly>
				</div>
			  </div>
			
			<div class="col-sm-6">
			  <div class="form-group">
				<label1 class="control-label"style="text-align: left;"> <h4>Phone Number</h4></label1>
				  <input  type="text" class="form-control usphonenumber" name="agent_phone" id="agent_phone" value="<?php echo $user_profile_data['agent_phone'] ;?>">
				</div>
			  </div>
			
			<div class="col-md-6">
			<p id="updateprofilevalidating" class="text-center"></p>  
              <input class="btn btn-lg btn-success btn-block" value="Save Your Changes" type="submit" style="padding: 23px;line-height: 2px;">
              <span></span>
          </div>
        </form>  
       
       </div>
	</div>
  </div>

</div>	  
	