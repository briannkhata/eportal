	<?php $this->load->view('header');?>

													<div class="portlet-body">
													<div class="table-toolbar">
															
														
														<table class="table table-bordered nR">
															<thead>
															<tr>
																<th style="width:3%;">User ID</th>
																<th>Name</th>
																<th>Username</th>
                                                                <th>Password</th>
																<th>Role</th>
																<th></th>
															</tr>
															</thead>
															<tbody>
														<?php  
														$count = 1;
														foreach($this->M_user->get_active_staffs() as $row):?>
															<tr>
															 <td align="center"><?=$row['user_id'];?></td>
															 <td><?=$row['name'];?></td>
															 <td><?=$row['username'];?></td>
                                                             <td><?=$row['password'];?></td>
															 <td><?=$row['role'];?></td>
															 </td>
															 <td class="nop">					
																<a href="<?=base_url();?>user/read/<?=$row['user_id'];?>" class="btn btn-success btn-sm"> Edit</a>				
																
																<a href="<?=base_url();?>user/delete/<?=$row['user_id'];?>" class="btn btn-danger btn-sm"> Delete</a>				
															</td>
															</tr>
															<?php endforeach;?>
																
															</tr>
															</tbody>
															</table>
														</div>
												
<?php $this->load->view('footer.php');?>