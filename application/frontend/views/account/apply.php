<div class="container-fluid con-inner">
	<div class="row well">
		<div class="col-md-2">
    	    <ul class="nav nav-pills nav-stacked well">
        <li><a href="<?php echo BASEURL ?>/account/dashboard"><i class="fa fa-dashboard"></i>  Dashboard</a></li>
              <li  ><a href="<?php echo BASEURL ?>/profile"><i class="fa fa-user"></i> Profile</a></li>
              <li   ><a href="<?php echo BASEURL ?>/profile/broker"><i class="fa fa-user"></i> Broker Info</a></li>
              <li class="active" ><a href="<?php echo BASEURL; ?>/account/apply"><i class="fa fa-key"></i> Apply</a></li>
			  <li ><a href="<?php echo BASEURL; ?>/filled_forms"><i class="fa fa-file-text"></i>  &nbsp;Submitted Advance Requests</a></li>
              <li><a href="<?php echo BASEURL; ?>/users/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
        <div class="col-md-10">
           <div class="row panel-header">
            <h1 style="color:#06216F; margin:30px 0">Apply for an Advance</h1>
            <h5 align="center" class="h-text"><?php echo ucfirst($userdata['display_name']); ?>, what type of Advance would you like?</h5>
            <hr />
           </div>
           
           <div class="row panel-content" style="text-align:center;">
            <div class="col-sm-6 col-xs-12 "><a href="<?php echo BASEURL; ?>/advance_request_form"> <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/new/img/pendingsale_on.png" /></a></div>
            <div id="bridges" class="col-sm-6 col-xs-12 "><a href="<?php echo BASEURL; ?>/replacement_request_form"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/new/img/bridgeadvance_off.png" /></a></div>
			
            <div class="col-sm-12 " style="margin-top:30px;">
             <div id="double" class="alert alert-warning alert-dismissible hidd" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p> <strong>IMPORTANT!</strong> </p>
                <p>A double dip is used to advance more money from a currently active pending sale advance.</p>
                <p>We cannot process a double dip advance at this time because you do not have any active pending advances that qualify for this.</p>
                <p>If you have any questions, please call us toll free at 877-882-4368. Thank you.</p>
             </div>
             
             <div id="short" class="alert alert-info alert-dismissible hidd" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p> <strong>IMPORTANT!</strong> </p>
                <p>Apply for a Short Sale Advance when you have a pending short sale that does not have final, written bank approval. If this is the case, please continue.</p>
                <div class="col-sm-3 col-xs-6">
                <button type="button" class="btn btn-warning pull-left">Cancel</button>
                </div>
                 <div class="col-sm-3 col-xs-6 pull-right">
                 <button type="button" class="btn btn-warning pull-right">Continue with Short Sale Advance</button>
                 </div>
                 <div class="clearfix"></div>
             </div>
             
             <div id="bridge" class="alert alert-info alert-dismissible hidd" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p> <strong>IMPORTANT!</strong> </p>
                <p>Apply for a Bridge Listing Advance when you do not have a pending sale but you have at least 2 active listings, with a minimum of 90 days until they expire, and you have sold at least 1 home in the past 6 months and 2 others within the past 12 months.</p>
                <div class="col-sm-3 col-xs-6 ">
                <button type="button" class="btn btn-warning pull-left">Cancel</button>
                </div>
                 <div class="col-sm-4 col-xs-6 pull-right">
                 <button type="button" class="btn btn-warning pull-right ">Continue with Bridge Listing Advance</button>
                 </div>
                 <div class="clearfix"></div>
             </div>
             
           </div>
         </div>
       </div>
	</div>
  </div>



<div class="modal fade bs-example-modal-lg hide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"><br/><br/>
            <form class="form-horizontal">
            <fieldset>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="body">Body :</label>  
              <div class="col-md-8">
              <input id="body" name="body" type="text" placeholder="Message Body" class="form-control input-md">
                
              </div>
            </div>
            
            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="message">Message :</label>
              <div class="col-md-8">                     
                <textarea class="form-control" id="message" name="message"></textarea>
              </div>
            </div>
            
            <!-- Button -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="send"></label>
              <div class="col-md-8">
                <button id="send" name="send" class="btn btn-primary">Send</button>
              </div>
            </div>
            
            </fieldset>
            </form>

    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/lightslider.js"></script> 
    <script>

 // $('#doubles').click(function()
	   // {
	    // $('#double').slideDown();
		 // $('#short').slideUp();
		 // $("#bridge").slideUp();
	   // });
 // $('#shorts').click(function()
	   // {
	    // $('#short').slideDown();
		 // $("#bridge").slideUp();
	   // });
 // $('#bridges').click(function()
	   // {
	    // $('#bridge').slideDown();
		 // $("#short").slideUp();
	   // });
  
  
    </script>
</body>
</html>
