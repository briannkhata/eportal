	<?php $this->load->view('header');?>
								
												<div class="portlet-body">
													<div class="table-toolbar">
															<div class="row">
															<div class="col-md-12">
																			<a class="btn btn-sm green" href="<?=base_url();?>leave_type/read">
																			Add New</i>
																			</a>
																	</div>
																
															</div>
														</div>
															
													<table class="table table-bordered nR">
															<thead>
															<tr>
																<th style="width:2%;">#</th>
																<th>Leave type</th>
																<th></th>
															</tr>
															</thead>
															<tbody>
														<?php 
														$count = 1;
														foreach($this->M_leave_type->get_leave_types() as $row):?>
															<tr class="odd gradeX">
																<td><?=$count++;?></td>
																<td><?=$row['leave_type'];?></td>
																<td>
															<a href="<?=base_url();?>leave_type/read/<?=$row['leave_type_id'];?>" class="btn btn-primary btn-sm">
																	Edit</a>				
															   <a href="<?=base_url();?>leave_type/delete/<?=$row['leave_type_id'];?>" class="btn btn-danger btn-sm">
															    	Delete</a>	
															    	</td>			
															</td>
															</tr>
															<?php endforeach;?>
															</tbody>
															</table>
												</div>
	
<?php $this->load->view('footer.php');?>