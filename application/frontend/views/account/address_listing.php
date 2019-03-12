<div class="col-sm-8 view">
     <h3 style="border-bottom:1px solid #ccc;"><?php echo (isset($master_title) && !empty($master_title))?$master_title:'Address Listing'; ?>  </h3>   
     
     
     <?php foreach($shipping_address_info as $val){ ?>
     <div class="infoo">
     <div style="margin-top:30px;" class="col-sm-6 col">
      <div class="cary">
    
<a href="<?php echo BASEURL.'/account/edit_shipping_address/'.$val['id']; ?>"><i aria-hidden="true" class="fa fa-pencil-square-o"></i>
</a>
     
    
     <ul>
     <li><?php echo $val['shipping_address'];?> </li>
     <li><?php echo $val['shipping_city'].",".$val['shipping_state'];?> </li>
     <li><?php echo $val['shipping_zip'];?> </li>
     </ul>
    </div>
     </div>
     
     
     
     </div>
      
     <?php } ?>
     <!--
     <div style="margin-top:30px;" class="col-sm-6 pencil">
     <div class="cary">
    
<span style="color:#999; font-size:20px;">Address |</span><a href="address.html"> <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
</a>
     
     
     
    
     <ul>
     <li>3100 West Cary Street</li>
     <li>Richmond, VA 23221</li>
     <li>804.355.4383</li>
     </ul>
    </div>
     </div>
     
     
     
    <div style="margin-top:20px;" class="col-sm-6 col">
    <div class="cary">
    
<span style="color:#999; font-family:22px; font-size:20px;">Address |</span><a href="address.html"><i aria-hidden="true" class="fa fa-pencil-square-o"></i>
</a>
     
     
     
     
     <ul>
     <li>3100 West Cary Street</li>
     <li>Richmond, VA 23221</li>
     <li>804.355.4383</li>
     </ul>
   </div>
     </div>-->	
     </div>
