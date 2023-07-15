<?php $this->load->view('header');?>
									<div class="portlet-body">
									<form action="<?=base_url();?>user/save" method="post" enctype="multipart/form-data">
													
													
													<!--/span-->
													<div class="col-md-12">
														<div class="form-group">
															<label>Name</label>
																<input type="text" name="name" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" required="">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label>Staff No </label>
																<input type="text" name="user_id" class="form-control" value="<?php if (!empty($user_id)){echo $user_id;};?>" required>
														</div>
													</div>
													

													<div class="col-md-4">
														<div class="form-group">
															<label>Username</label>
																<input type="text" name="username" class="form-control" value="<?php if (!empty($username)){echo $username;}?>">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label>Password</label>
																<input type="text" name="password" class="form-control" value="<?php if (!empty($password)){echo $password;}?>">
														</div>
													</div>
													<!--/span-->
													<div class="col-md-12">
														<div class="form-group">
															<label>Role</label>
																<select class="form-control" name="role" required="">
																    <option selected="" disabled="">Option</option>
																    <option <?php if($role == 'staff') echo 'selected';?> value="staff">Staff</option>

																	<option <?php if($role == 'admin') echo 'selected';?> value="admin">Admin</option>
																	
																</select>
														</div>
													</div>
													
											<div class="modal-footer" style="border: none;">
														 <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
														<button type="submit"  class="btn blue zanda">	Save</button>
													</div>
										</form>
										<!-- END FORM-->
											
											</div>
								<?php $this->load->view('footer');?>