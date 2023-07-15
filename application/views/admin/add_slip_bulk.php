<?php $this->load->view('header');?>
									<div class="portlet-body">
									<form action="<?=base_url();?>slip/upload_slip_bulk" method="post" enctype="multipart/form-data">
													<div class="col-md-12">
                                                         <div class="form-group">
                                                            <label class="control-label">Select Slips</label>
                                                            <input type="file" class="form-control" name="slip[]" multiple>
                                                        </div>
                                                      </div>

                                                       <div class="col-md-6">
														<div class="form-group">
														  <label for="exampleInputEmail1">Month</label>
														    <select name="month" class="form-control">
														    	<option selected="" disabled=""> Option </option>
															   <?php foreach($this->db->get('tblmonths')->result_array() as $yo):?>
																	<option value="<?=$yo['month'];?>">
																		<?=$yo['month'];?></option>
																<?php endforeach;?>
															</select>
														</div>
													</div>
													 <div class="col-md-6">
														<div class="form-group">
														  <label for="exampleInputEmail1">Year</label>
														    <select name="year" class="form-control">
  															    	<option selected="" disabled=""> Option </option>
															   <?php foreach($this->db->get('tblyears')->result_array() as $yo):?>
																	<option value="<?=$yo['year'];?>">
																		<?=$yo['year'];?></option>
																<?php endforeach;?>
															</select>
														</div>
													</div>
												
											<div class="modal-footer" style="border: none;">
											<button type="submit"  class="btn blue zanda"> Upload</button>
										</div>
										</form>
										<!-- END FORM-->
							</div>
								<?php $this->load->view('footer');?>