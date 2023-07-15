	<?php $this->load->view('header');?>

													<div class="portlet-body">
													<div class="table-toolbar">
                                                      
                                                      <button class="btn btn-default" onclick="print()">Print</button>
                                                      <br><br>
															
														
														<table class="table table-bordered">
															<thead>
															<tr>
																<th style="width:3%;">ID</th>
																<th>Name</th>
																<th>Username</th>
                                                                <th>Password</th>
																<th>Role</th>
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
															</tr>
															<?php endforeach;?>
																
															</tr>
															</tbody>
															</table>
														</div>
												
<?php $this->load->view('footer.php');?>