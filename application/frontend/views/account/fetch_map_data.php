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
						<ul class="pagination">
						<?php for($i=1;$i<=ceil($total_rows/$per_page);$i++){ ?>
						 <li <?php echo ($curr_page==$i)?'':'id="ajax_pg"'; ?> class="<?php echo ($curr_page==$i)?'active':'page'; ?>"><a href="javascript:get_filtered_map(<?php echo $i;?>)"><?php echo $i;?></a></li>			 
						 <?php }?>
							
							<li><a href="javascript:get_filtered_map(<?php echo ($i-1);?>)" style="border:1px solid #cdcdcd">Last ›</a></li>
						</ul>
					</div>
				</div>
