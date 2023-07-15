		<?php $this->load->view('header');?>				

							<div class="portlet-body">
													<div class="table-toolbar">
											
															
														<table class="table table-striped table-bordered table-hover nR">
															<thead>
															<tr>
																<th style="width:5%;">#</th>
																<th>Staff</th>
																<th>Month</th>
																<th>Year</th>
																<th>File</th>
																<th></th>
															</tr>
															</thead>
															<tbody>
										<?php 
										$count = 1;
										foreach($this->M_slip->get_slips() as $row):?>
															<tr>
																<td><?=$count++;?></td>
																<td><?=$this->M_user->get_name($row['user_id']);?></td>
																<td><?=$row['month'];?></td>
																<td><?=$row['year'];?></td>
																<td>
																	<a href="<?=base_url();?>uploads/slips/<?=$row['slip'];?>" target="blank">
																		Download
																</a></td>
																<td>								
															 <a href="<?=base_url();?>slip/delete/<?=$row['slip_id'];?>" class="btn btn-danger btn-xs">
															 	Delete</a>				
															</td>
															</tr>
															<?php endforeach;?>
															</tbody>
															</table>
													
												</div>
		<?php $this->load->view('footer');?>				
