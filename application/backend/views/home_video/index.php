<div class="container-fluid">
			<div class="block-header">
                <h2><?php echo ucfirst($master_title); ?></h2>
            </div>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               <?php echo ucfirst($master_title); ?>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
<div class="body">
	
		<form id="home_video" action="<?php echo BASEURL ?>/home_video" method="post" enctype="multipart/form-data">
				<div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Enter the url of Home Video" name="link"><?php echo $video['link']; ?></textarea>
                                        </div>
                                    </div>
                                </div>

				<div class="col-md-6">
                                    
				                       <div class="form-group">
                                        
                                           <button type="submit" class="btn bg-red waves-effect">Submit</button>
                                
                                    </div>
                                </div>       
				
				  </div> 
	
			</form>
			</div>
       
                             
                         
</div>
						
						
                    </div>
                </div>
            </div>



