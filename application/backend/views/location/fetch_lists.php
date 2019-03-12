					
							<?php  
								if(!empty($locations)){
								foreach($locations as $key => $location){ ?>	
                                    <tr>									
                                        <td>
<a title="Delete" onclick="return confirm('Are you sure you want to delete this location')" href="<?php echo BASEURL ?>/location/deleteLocation/<?php echo $location['id'] ?>"><i class="material-icons" style="color:#DB4D4D;">delete</i></a>		

<a href="<?php echo BASEURL ?>/location/manually/<?php echo $location['id'] ?>"><i class="material-icons" style="color:#8bc34a !important;">mode_edit</i></a>		
										</td>
                                        <td><?php echo $location['store_number']; ?></td>
                                        <td><?php echo $location['store_type']; ?></td>
                                        <td><?php echo $location['address']; ?></td>
                                        <td><?php echo $location['city']; ?></td>
                                        <td><?php echo $location['state']; ?></td>
                                        <td><?php echo $location['zip_code']; ?></td>
                                        <td><?php echo $location['phone_number']; ?></td>
                                        <td><?php echo $location['play_place']; ?></td>
                                        <td><?php echo $location['drive_through']; ?></td>
                                        <td><?php echo $location['arch_card']; ?></td>
                                        <td><?php echo $location['free_wifi']; ?></td>
                                        <td><?php echo $location['latitude']; ?></td>
                                        <td><?php echo $location['longitude']; ?></td>
                                        <td><?php echo $location['geo_accuracy']; ?></td>
                                        <td><?php echo $location['country']; ?></td>
                                        <td><?php echo $location['country_code']; ?></td>
                                        <td><?php echo $location['county']; ?></td>
                                    </tr>

                                 <?php } ?>
                                 <?php $total_pages=ceil($total_rows/$per_page);
									if($total_pages>1){
								?>

								<tr>
                                    <td colspan="18" class="text-center">
										<ul class="pagination">

										<?php for($i=1;$i<=$total_pages;$i++){ ?>	
											 <li  class="<?php echo ($curr_page==$i)?'active':''; ?>"><a href="javascript:get_filtered_data(<?php echo $i;?>)"><?php echo $i;?></a></li>
										
										<?php } ?>	
											<li><a href="javascript:get_filtered_data(<?php echo ($i-1);?>)" style="border:1px solid #cdcdcd">Last ›</a></li>
										</ul>
                                    </td>
								</tr>
							<?php }} else{?>
								<tr>
										<td colspan="18" class="text-center">
											No Result Found !!
									</td>
								</tr>
						<?php }?>