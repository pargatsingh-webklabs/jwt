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
                            
                        </div>
                        <div class="body">
												
							<form method="post" id="send_email" action="<?php echo BASEURL; ?>/send/send_email">
                            <div class="row clearfix">
                                <div class="col-sm-6">
									<select class="form-control" multiple="multiple" name="to[]">
                                        <option value="">-- Please select --</option>
										<?php foreach($getall as $key => $value )
{	?>
                                        <option value="<?php echo $value['email']; ?>" <?php if(in_array($value['id'],$user_ids)) echo "selected=selected"; ?> ><?php echo $value['fname'];
											echo " ".$value['lname']; ?></option>
                                     <?php }?>
                                    </select>
</div>
                            	<div class="col-sm-6">
									<select id="email_pack" class="form-control"  name="pack_id" onchange="selectuser_as_perplan(this.value)">
                                        <option value="">-- Please select --</option>
										<?php foreach($getall_pack as $key => $value ){	?>
                                        <option value="<?php echo $value['id'];?>" <?php if($selected_plan==$value['id']) echo "selected=selected"; ?>><?php echo $value['name'];?></option>
                                     <?php }?>
                                    </select>
								</div>
								<div class="col-sm-6">
									<input id="subject" name="subject"  class="form-control n" placeholder="Subject"/>
                                </div>
                                <div class="col-sm-12">
									<textarea id="ckeditor" name="message" rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                </div>
                            
								
                            </div>
								<div class="row clearfix"><div class="col-sm-12">
									<button type="submit" class="btn bg-red waves-effect">SEND</button>
						   <a href="<?php echo BASEURL; ?>" class="btn bg-grey waves-effect">CANCEL</a>
                                </div></div>
						</form>
							
							
                        </div>
                    </div>
                </div>
            </div>
</div>