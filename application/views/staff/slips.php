		<?php $this->load->view('header');?>				

							<div class="portlet-body">
													<div class="table-toolbar">
											
															
														<table class="table table-striped table-bordered table-hover nR">
															<thead>
															<tr>
																<th style="width:3%;">#</th>
																<th>Date</th>
																<th>Payslip</th>
															</tr>
															</thead>
															<tbody>
										<?php 
										$count = 1;
										foreach($this->M_slip->get_slip_by_user_id($this->session->userdata('user_id')) as $row):?>
															<tr>
																<td><?=$count++;?></td>
																<td>
																	<?=$row['month'];?> - <?=$row['year'];?></td>
																<td>
																	<a href="<?=base_url();?>uploads/slips/<?=$row['slip'];?>" target="blank">
																		Download
																</a></td>
															</tr>
															<?php endforeach;?>
															</tbody>
															</table>
													
												</div>
		<?php $this->load->view('footer');?>				
