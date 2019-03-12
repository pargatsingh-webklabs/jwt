
   <div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="panel-heading"><!--<?php echo ucfirst($master_title); ?>
	<a href="<?php echo BASEURL ?>/cms" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	-->					
					</div>
				<div class="panel-body">

  <form name="faq_form" id="faq_form" action="<?php echo BASEURL ?>/faq/add" method='post'>
	  

<div class="row clearfix">
	<div class="col-sm-6">
		<div class="form-group">
		 <select class="form-control" name="faq_id">
                                        <option value="">-- Please select category --</option>
			 <?php 
				foreach ($select as $key => $val) {
				?>
                                        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                      <?php	} ?>
                                    </select>
		
		</div>
	</div>
</div>
	  
	  <br/>
	  <br/>
	  <br/>
	  
	  <div class="row clearfix">
	<div class="col-sm-12">
		<div class="form-group">
			<div class="form-line">
                <label>Question</label>				
				<input class="form-control" placeholder="Question" type="text" name="question">
			</div>
		</div>
	</div>
		  </div>
	 <div class="row clearfix"> 
	<div class="col-sm-6">
		<div class="form-group">
			<div class="form-line">
                <label>Answer</label>	
				 <textarea id="ckeditor" rows="4" class="form-control no-resize" placeholder="Answer" type="text" name="answer"> </textarea>
				
			</div>
		</div>
	</div>
</div> 
	  
<!--<div class="row clearfix">
	<div class="col-sm-6">
		<div class="form-group">
			<div class="form-line">
                <label>Package type</label>				
				<input class="form-control" placeholder="Price" type="text" name="type">
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<div class="form-line">
                <label>Package Feature</label>					
				<input class="form-control" placeholder="Feature" type="text" name="feature">
			</div>
		</div>
	</div>
</div> 
  
  
	  
	 <div class="form-group">
		<div class="form-line">
			 <label>Package Description</label>
			<textarea id="ckeditor" rows="4" class="form-control no-resize"  name="description"  placeholder="Description"></textarea>

		</div>
	</div>
	  -->

			
					<div class="form-line">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-6 ">
							<div id="loader" class="pull-right " >
							</div>	
							</div>	
								<div class="col-md-6 col-sm-6 col-xs-6 ">
								<div class="pull-right ">
									
									 <button type="submit" class="btn bg-teal btn-block waves-effect">SUBMIT</button>
                         									
								<button type="submit" href="<?php echo BASEURL; ?>/blogs"   class="btn bg-red btn-block  waves-effect"> Cancel</button>     
									
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
