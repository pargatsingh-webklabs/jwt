      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <!--<h1 class="h1-color">You currently have no maps saved to your account.</h1>-->
          <div class="col-sm-12 text-center">
		<?php $count = get_stripe_plan();
		  $userdata = $this->session->userdata('userdata');
			if ($count == 0){
			?>  
			 <a class="create-map hvr-sweep-to-right dotted-b-btn" data-toggle="modal" data-target="#create-map-popup"><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px; line-height: 53px;"></i>Create New Map.</a>
			 <?php }else{ ?> 
		   <a class="create-map hvr-sweep-to-right dotted-b-btn" data-toggle="modal" data-target="#create-my-map"><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px; line-height: 53px;"></i>Create New Map.</a>
			  
			  <?php } ?>
		  </div>
		  <!--<div class="col-sm-12 text-center">
		  <a href="#" target="_blank" class="guide">Maptive 4 Quickstart Guide</a>
		  </div>-->
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="container s-table">
 
		 
    <div class="" style="margin:10px -15px">
    <?php $i=0; ?>  
     <?php foreach($maps as $key => $map){ ?>
        <?php if($i%3==0){ ?>	
          <div class="row"> <?php } ?> 
		   <div class="col-sm-4">
		      <div class="col-border">				   
				   <div class="col-sm-12 col-xs-12 col-xs padding-l-6">
					   <h4 class="margin-0-bottom"><?php echo $map['name']; ?></h4>
							
					   <?php $lenght = strlen($map['description']);
					      if($lenght>160){
						     $dots = '...';
						  }else{
						     $dots = '';
						  }
					   ?>
					   <h5 class="margin-0-top"><?php echo substr($map['description'], 0, 160).$dots;  ?></h5>
					   <a onclick="return confirm('Are You Sure You Want To Delete Map !')" href="<?php echo BASEURL;?>/account/delete_map/?id=<?php echo  base64_encode($map['id']); ?>" id="<?php echo $map['id']; ?>" class="" >	
				   <span class="round-edit3"><i class="fa fa-trash" aria-hidden="true"></i></span>
						</a>
					   
						<a  href="javascript:void(0);" id="<?php echo $map['id']; ?>" class="edit_map_model" >	
				   <span class="round-edit2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
						</a>
						<a  href="#" id="<?php echo $map['id']; ?>" class="share_map_model" >	
				   <span class="round-edit" data-toggle="modal" ><i class="fa fa-share-alt" aria-hidden="true"></i></span>
						</a>
					   
				   </div>
				   
		      </div>
		   </div>
        <?php $i++; ?>	
        <?php if(($i+0)%3==0){ ?>         
            </div>
          <?php } ?>
          
		 
  <div id="share-map-popup_<?php echo $map['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"style="float: left;width: 100%; margin-top:60px">
      <div class="modal-header">
        <button type="button" class="close border-close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Share</h4>
      </div>
      <div class="modal-body" style="float: left;width: 100%;">
	  <div class="col-sm-12">
      <div style="margin-bottom:15px;"> <input type="text" id="foo" class=" form-control" value="http://neo-crews.com/smooth_maps/map/?id=<?php echo base64_encode($map['id']); ?>" ></div>
     <div class="social col-sm-8 col-md">
		<span id="share_link" class=' st_facebook_large'	st_url="http://neo-crews.com/smooth_maps/admin" displayText='Facebook'></span>
		<span class=' st_twitter_large' 	st_url="http://neo-crews.com/smooth_maps/admin" displayText='Tweet'></span>
		<span class=' st_linkedin_large' 	st_url="http://neo-crews.com/smooth_maps/admin"  displayText='LinkedIn'></span>
		<span class=' st_whatsapp_large'  st_url="http://neo-crews.com/smooth_maps/admin" displayText='WhatsApp'></span>
		<span class=' st_googleplus_large' st_url="http://neo-crews.com/smooth_maps/admin"  displayText='Google +'></span>
	</div>
							
			<div class="pull-right col-sm-4 col-md">
			<button  type="submit" data-clipboard-action="copy" data-clipboard-target="#foo" class=" copy_btn ex-btn-two hvr-sweep-to-right float-r-m">Copy Link</button>
</div>			

	  </div>     
    </div>

  </div>
</div>
</div>		  
		   
<?php } ?>			   
	 </div>
 <div class="row">
				<div class="col-sm-12 text-center">
					<ul class="pagination" >
						<!-- Show pagination links -->
						<?php foreach ($links as $link) {

						echo "<li>".$link ."</li>";
						} ?>
					</ul>	   
					</div>
					</div>
     <!--   <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th><i class="fa fa-times-circle-o" aria-hidden="true" style="font-size: 24px;"></i></th>
        				<th>MAP / SAVED MAP VIEW NAME</th>
        				<th class="numeric">LAST MAP UPDATE</th>
        				<th class="numeric">LAST DATA CHANGE</th>
        				<th class="numeric">MAP VIEWS</th>
        				<th class="numeric">ACTIONS</th>
        				
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td data-title="Code"><input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" /><label for="checkboxG1" class="css-label"></label></td>
        				<td data-title="Company">Surbhi Arora</td>
        				<td data-title="Price" class="numeric">Dec 13, 2016</td>
        				<td data-title="Change" class="numeric">Dec 13, 2016</td>
        				<td data-title="Change %" class="numeric">1</td>
        				<td data-title="Open" class="action-icon"><i class="fa fa-cog" title="Settings"></i> <i class="fa fa-list-alt" title="Open in Presentation / Shared Mode"></i> <i class="fa fa-share-square-o" title="Share"></i> <i class="fa fa-clipboard" title="Copy Map"></i> </td>
        				
        			</tr>
        			<tr>
        				<td data-title="Code"><input type="checkbox" name="checkboxG3" id="checkboxG3" class="css-checkbox" /><label for="checkboxG3" class="css-label"></label></td>
        				<td data-title="Company">Surbhi Arora</td>
        				<td data-title="Price" class="numeric">Dec 13, 2016</td>
        				<td data-title="Change" class="numeric">Dec 13, 2016</td>
        				<td data-title="Change %" class="numeric">1</td>
        				<td data-title="Open" class="action-icon"><i class="fa fa-cog" title="Settings"></i> <i class="fa fa-list-alt" title="Open in Presentation / Shared Mode"></i> <i class="fa fa-share-square-o" title="Share"></i> <i class="fa fa-clipboard" title="Copy Map"></i> </td>
        				
        			</tr>
        			<tr>
        				<td data-title="Code"><input type="checkbox" name="checkboxG2" id="checkboxG2" class="css-checkbox" /><label for="checkboxG2" class="css-label"></label></td>
        				<td data-title="Company">Surbhi Arora</td>
        				<td data-title="Price" class="numeric">Dec 13, 2016</td>
        				<td data-title="Change" class="numeric">Dec 13, 2016</td>
        				<td data-title="Change %" class="numeric">1</td>
        				<td data-title="Open" class="action-icon"><i class="fa fa-cog" title="Settings"></i> <i class="fa fa-list-alt" title="Open in Presentation / Shared Mode"></i> <i class="fa fa-share-square-o" title="Share"></i> <i class="fa fa-clipboard" title="Copy Map"></i> </td>
        				
        			</tr>
        			
        			
        		</tbody>
        	</table>
        </div>-->
    
    
</div>

<!---------create map modal open html---------->
<!-- Modal -->
<div id="create-my-map" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md" style="z-index: 9999999;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Map</h4>
      </div>
      <div class="modal-body">
       <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
         <span class="badge">1</span>  Name Your Map 
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
		<form id="form_map" method="post" name="form_map" action="<?php echo BASEURL  ?>/map/add" >  
	     <div class="col-lg-12 col-md">
                                <div class="form-group">
                                    <label for="create_map_name">Map Name</label>
                                    <input class="form-control" id="name" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="create_map_description">Map Description (optional)</label>
                                    <textarea rows="3" class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                   <button type="submit" class="ex-btn-two hvr-sweep-to-right" >Map Now</button>
                                </div>
                            </div>
        </form>
	  </div>
    </div>
  </div>
		   
 
		  </div>
  
    </div>

  </div>
</div>
</div>

<div id="edit-my-map" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md" style="z-index: 9999999;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Map</h4>
      </div>
      <div class="modal-body">
       <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
         <span class="badge">1</span>  Name Your Map 
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
		<form id="form_map" method="post" name="form_map" action="<?php echo BASEURL  ?>/map/add" >  
	     <div class="col-lg-12 col-md">
                                <div class="form-group">
                                    <label for="create_map_name">Map Name</label>
                                    <input class="form-control" id="name" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="create_map_description">Map Description (optional)</label>
                                    <textarea rows="3" class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                   <button type="submit" class="ex-btn-two hvr-sweep-to-right" >Map Now</button>
                                </div>
                            </div>
        </form>
	  </div>
    </div>
  </div>
		   
 
		  </div>
    </div>

  </div>
</div>
</div>
<div class="col-sm-6 text-center">
<a href="#" data-toggle="popover" title="Popover title" data-content="A larger popover to demonstrate the max-width of the Bootstrap popover."><i class="fa fa-map-marker" aria-hidden="true"  style="color:#ff1493; font-size:30px"></i></a>
</div>










<!---------create map modal open html---------->









        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<div class="clearfix"></div>