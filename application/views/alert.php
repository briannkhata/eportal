
							<?php if ($this->session->flashdata('message')) { ?>
									<div class="alert alert-info fade in">
										<a href="#" class="close" data-dismiss="alert">&times;</a>
										<center><?=$this->session->flashdata('message'); ?> </center>
									</div>
								<?php } ?>		