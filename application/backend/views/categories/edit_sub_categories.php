
<div class="container-fluid" >
            <div class="block-header">
                <h2><?php echo $master_title; ?></h2>
            </div>

	     <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <h2><?php echo $master_title; ?></h2>
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
                             <form role="form" action="<?php echo BASEURL; ?>/categories/edit_sub_cate" id='edit_sub_categories_validation' method='post'>
                                <div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
										<select class="form-control show-tick category_feild" name="category_id" >

										<option value="" >Select your category</option>
										<?php foreach($categorydata as $key=>$val){?>
										<option value="<?php echo $val['id'] ?>" <?php if($categoriesdata['parent']==$val['id']) {echo "selected=selected";} ?>><?php echo $val['name'] ?></option>
										<?php } ?>
										</select>

									</div>	
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" placeholder="Add new category ..." name="name" type="text" value="<?php echo $categoriesdata['name'];?>" >
												<input type="hidden" name="id" value="<?php echo $categoriesdata['id'];?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" placeholder="Add Color Code ..." name="color_code" type="text" value="<?php echo $categoriesdata['color_code'];?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                     <button type="submit" class="btn bg-light-green waves-effect " style="font-size:19px"><i class="material-icons">send</i> Submit</button>
                                    </div>
									
									
									
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<div class="pull-left" id="loading"></div>
</div>	
									
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	</div>
