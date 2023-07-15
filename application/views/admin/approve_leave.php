<?php $this->load->view('header');?>
						<div class="portlet-body">
							<?php foreach($this->M_leave->get_leave_by_id($leave_id) as $row){?>
												<form role="form" action="<?=base_url();?>leave/approve_leave" method="post">
													 
														<div class="col-md-2">
															<div class="form-group">
															  <label for="exampleInputEmail1">Days</label>
															 	  <input type="text" class="form-control" value="<?=$row['total_applied'];?>" readonly>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
															  <label for="exampleInputEmail1">From</label>
															 	  <input type="text" class="form-control" value="<?=$row['start_date'];?>" readonly>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
															  <label for="exampleInputEmail1">To</label>
															 	  <input type="text" class="form-control" value="<?=$row['end_date'];?>" readonly>
															</div>
														</div>

														<div class="col-md-2">
															<div class="form-group">
															  <label for="exampleInputEmail1">Date Applied</label>
															 	  <input type="text" class="form-control" value="<?=date('d M Y',strtotime($row['date_applied']));?>" readonly>
															</div>
														</div>
														
														<div class="col-md-12">
															<div class="form-group">
															  <label for="exampleInputEmail1">Title</label>
															 	  <input type="text" class="form-control" value="<?=$row['title'];?>" readonly>
															</div>
														</div>

														<div class="col-md-12">
															<div class="form-group">
															  <label for="exampleInputEmail1">Attend to</label>
															  <select class="form-control" name="approved">
															  	 <option selected="" disabled="">Option</option>
															  	 <option value="1">Approve</option>
															  	 <option value="2">Deny</option>
															  </select>
															 
															</div>
														</div>

														<div class="col-md-12">
															<div class="form-group">
															  <label for="exampleInputEmail1">Comment</label>
															  <input type="" name="comment" class="form-control">
															</div>
														</div>

														<div class="modal-footer" style="border: none;">
                                                     <input type="hidden" name="leave_id" value="<?=$leave_id;?>">
															<button type="submit"  class="btn blue"> Finish
															</button>
														</div>
									            </form>	
									            <?php }?>									
												</div>
									<?php $this->load->view('footer');?>
