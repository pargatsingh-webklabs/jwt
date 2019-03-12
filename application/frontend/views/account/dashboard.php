<style>
.preview-wrapper {
    transition: box-shadow .175s cubic-bezier(.4,0,.2,1);
    position: relative;
    z-index: 1;
    border-radius: 3px;
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.25);
    overflow: hidden;
	margin-bottom:15px;
}
.preview-details {
    transition: background-color .175s cubic-bezier(.4,0,.2,1),border .175s cubic-bezier(.4,0,.2,1),color .175s cubic-bezier(.4,0,.2,1),opacity .175s cubic-bezier(.4,0,.2,1),box-shadow .175s cubic-bezier(.4,0,.2,1);
    
    background-color: #fff;
  
}
.preview-image {
    
    width: 100%;
    height: 150px;
    overflow: hidden;
}
.preview-image img {
  width:100%;
	height: 100%;
}
.preview-details {
    color: #333;
}
.preview-info {
    transition: background-color .175s cubic-bezier(.4,0,.2,1),border .175s cubic-bezier(.4,0,.2,1);
    display: block;
    position: relative;
    padding: 20px;
    border-top: 1px solid #f0f0f0;
    overflow: hidden;
}
.preview-title {
    transition: color .175s cubic-bezier(.4,0,.2,1);
    color: #fc4a1a;
    font-size: 18px;
}
.preview-designer {
    display: block;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.preview-stats {
    display: block;
    margin-top: 10px;
}

.preview-details:hover .preview-arrow, .preview-details:focus .preview-arrow, .preview-details:active .preview-arrow {
    -webkit-transform: translate(0,0);
    -ms-transform: translate(0,0);
    transform: translate(0,0);
    color: rgba(255,255,255,.5);
}
.preview-wrapper:hover, .preview-wrapper:focus {
    box-shadow: 0 1px 3px 1px rgba(0,0,0,.25);
}
.preview-wrapper:hover .show-hover, .preview-wrapper:focus .show-hover {
	display:block;
	background:rgba(0,0,0,.5)
	
}
.preview-details:hover, .preview-details:focus, .preview-details:active {
    background-color: #fc4a1a;
    color: #fff;
}
.preview-details:hover, .preview-details:focus, .preview-details:active {
    background-color: #fc4a1a;
    color: #fff;
	
}


.preview-info:hover {
    border-color: #fc4a1a;
	background: #fc4a1a;
}
.preview-wrapper:hover .preview-info{
    border-color: #fc4a1a;
	background: #fc4a1a;
	cursor:pointer;
}
.preview-details:hover .preview-title, .preview-details:focus .preview-title, .preview-details:active .preview-title {
    color: #fff;
}

.preview-wrapper:hover .preview-info .preview-title{
    color: #fff !important;
}
.preview-wrapper:hover .preview-info .preview-designer{
    color: #fff !important;
}
.mar-t{margin-bottom:5px;}
.show-hover{position: absolute;
    top: 0;
    right: 0;
    text-align: center;
    display: none;
    left: 0px;
    margin: auto;
    height: 100%;
    padding-top: 64px;
	z-index:999;}
	
</style>     

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
			 <?php }else if($map_no_detail<=$map_detail_users){ ?> 
			   <a class="create-map hvr-sweep-to-right dotted-b-btn" data-toggle="modal" data-target="#exceed_limit_popup"><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px; line-height: 53px;"></i>Create New Map.</a>
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
 
		 
    <div class="" style="margin:0px -15px">
    <?php $i=0; ?>  
     <?php foreach($maps as $key => $map){ ?>
        <?php if($i%4==0){ ?>	
          <div class="row mar-t"> <?php } ?> 
		   <div class="col-md-3 col-sm-6" style="margin-top:5px;">
		   
		   <div class="preview-wrapper">
        <a class="preview-details btn-no-underline" href="/style/151/ultra-light-with-labels">
            <div class="preview-image">
			
				<!--<iframe src="<?php echo MAP_SHARE_LINK; ?><?php echo base64_encode($map['id']); ?>" style="border: 0px none;"></iframe>-->
				<img src="<?php echo FRONT_END_LAYOUT ?>/assets/images/map4.jpg" />
			
					<div class="show-hover">
		
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
            <span class="preview-info edit_map_model" id="<?php echo $map['id']; ?>">
                <span class="preview-title"><?php echo $map['name']; ?></span>
				<?php $lenght = strlen($map['description']);
					      if($lenght>100){
						     $dots = '...';
						  }else{
						     $dots = '';
						  }
					   ?>
                <span class="preview-designer"><?php echo substr($map['description'], 0, 50).$dots;  ?></span>
				
            </span>
        </a>
		
    </div>
	
		      
		   </div>
        <?php $i++; ?>	
        <?php if(($i+0)%4==0){ ?>         
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
      <div style="margin-bottom:15px;"> <input type="text" id="foo_<?php echo $map['id']; ?>" class=" form-control" value="<?php echo MAP_SHARE_LINK; ?><?php echo base64_encode($map['id']); ?>" ></div>
     <div class="social col-sm-8 col-md">
		<span id="share_link" class=' st_facebook_large'	st_url="<?php echo MAP_SHARE_LINK; ?><?php echo base64_encode($map['id']); ?>" displayText='Facebook'></span>
		<span class=' st_twitter_large' 	st_url="<?php echo MAP_SHARE_LINK; ?><?php echo base64_encode($map['id']); ?>" displayText='Tweet'></span>
		<span class=' st_linkedin_large' 	st_url="<?php echo MAP_SHARE_LINK; ?><?php echo base64_encode($map['id']); ?>"  displayText='LinkedIn'></span>
		<span class=' st_whatsapp_large'  st_url="<?php echo MAP_SHARE_LINK; ?><?php echo base64_encode($map['id']); ?>" displayText='WhatsApp'></span>
		<span class=' st_googleplus_large' st_url="<?php echo MAP_SHARE_LINK; ?><?php echo base64_encode($map['id']); ?>"  displayText='Google +'></span>
	</div>
							
			<div class="pull-right col-sm-4 col-md">
			<button  type="submit" data-clipboard-action="copy" data-clipboard-target="#foo_<?php echo $map['id']; ?>" class=" copy_btn ex-btn-two hvr-sweep-to-right float-r-m">Copy Link</button>
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











<!---------create map modal open html---------->









        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<div class="clearfix"></div>