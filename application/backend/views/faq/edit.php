
   <div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="panel-heading"><!--<?php echo ucfirst($master_title); ?>
	<a href="<?php echo BASEURL ?>/cms" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	-->					
					</div>
				<div class="panel-body">

  <form name="faq_form" id="faq_form" action="<?php echo BASEURL ?>/faq/edit/<?php echo $faq['id']; ?>" method='post'>
	 <input type="hidden" name="id" value="<?php echo $faq['id'];  ?>" /> 

<div class="row clearfix">
	<div class="col-sm-6">
		<div class="form-group">
		 <select class="form-control show-tick" name="faq_id">
                                        <option value="">-- Please select --</option>
			 <?php 
				foreach ($select as $key => $val) {
				?>
                                        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                      <?php	} ?>
                                    </select>
		</div>
	</div>
</div>	  
<div class="row clearfix">
	<div class="col-sm-12">
		<div class="form-group">
			<div class="form-line">
                <label>Question</label>				
				<input class="form-control" type="text" name="question" value="<?php echo $faq['question'] ?>" />
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="form-group">
			<div class="form-line">
                <label>Answer</label>		
				 <textarea id="ckeditor" rows="4" class="form-control no-resize" placeholder="Answer" type="text" name="answer"><?php echo $faq['answer'] ?></textarea>
			
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
									
									 <button type="submit" class="btn bg-teal btn-block waves-effect">SEND</button>
                         									
								<button type="submit" href="<?php echo BASEURL; ?>/faq"   class="btn bg-red btn-block  waves-effect"> Cancel</button>     
									
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
</div>
