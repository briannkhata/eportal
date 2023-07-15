<?php $this->load->view('header');?>
							<div class="portlet-body">
									<div class="table-toolbar">
															<div class="row">
															<div class="col-md-6">
																			<a href="<?=base_url();?>Leave/read"  class="btn btn-sm blue">
																			Add New
																			</a>
																	
																		<button class="btn btn-sm grey" onclick="window.print();">
																			print <i class="fa fa-print"></i>
																			</button>
																</div>
															</div>
														</div>
															
														<table class="table table-striped table-bordered table-hover nR">
															<thead>
															<tr>
																<th>Name</th>
																<th>Total Days</th>
																<th>Dates</th>
																<th>Date Applied</th>
																<th>Status</th>
																<th>Year</th>
																<th></th>
															</tr>
															</thead>
															<tbody>
														<?php         
														    foreach($this->M_leave->get_leaves() as $row):?>
															<tr>
																<td><?=$this->M_user->get_name($row['user_id']);?><br>
																<b><small>days applied : 
																	<?=$row['total_applied'];?></small></b></td>
																<td><?=$row['total_days'];?></td>
																<td>from: 
																	<?=date('d M Y',strtotime($row['start_date']));?><br>
																	to : 
																	<?=date('d M Y',strtotime($row['end_date']));?></td>
																<td><?=date('d M Y',strtotime($row['date_applied']));?></td>
																<td>

																	<?php if($row['status'] == 0):?>
																		---pending---
																	<?php elseif($row['status'] == 1):?>
																		---status--- [<?=date('d M Y',strtotime($row['date_status']));?>]<br>
																		<small><?=$row['comment'];?></small>
																	<?php elseif($row['status'] == 2):?>
																		---denied--- [<?=date('d M Y',strtotime($row['date_status']));?>]<br>
																		<small><?=$row['comment'];?></small>
																		<?php if($row['endto_date'] < date('Y-m-d-H-i-s')){?>
																			<strong style="color: red;">LEAVE DAYS OVER</strong>
																		<?php }?>
																	<?php endif;?>

																	</td>
																	<td><?=$row['year'];?></td>
																	 <td>			
 																	<?php if($row['status'] == 0){?>

																<a href="<?=base_url();?>leave/read/<?=$row['leave_id'];?>" class="btn btn-success btn-xs black"><i class="fa fa-edit"></i></a>				
															   	<a href="<?=base_url();?>leave/delete/<?=$row['leave_id'];?>" class="btn btn-danger btn-xs black"><i class="fa fa-times-circle"></i></a><br>
															   	<a href="<?=base_url();?>leave/approve/<?=$row['leave_id'];?>/<?=$row['user_id'];?>" class="btn btn-primary btn-xs black"> -- attend to --</a>	
															   	<?php }?>	

															</td>
															</tr>
															<?php endforeach;?>
															</tbody>
															</table>
											
												</div>
							<?php $this->load->view('footer');?>
