	<?php $this->load->view('header');?>
			<!-- BEGIN SIDEBAR -->
	<div class="page-content-wrapper">
		<div class="page-content">


			<div class="row margin-top-10">
					
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-blue-sharp">
									<?=count($this->M_slip->get_slip_by_user_id($this->session->userdata('user_id')));?></h3>
								<small>My Payslips</small>
							</div>
							<div class="icon">
								<i class="fa fa-file-o"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
								<span class="sr-only"></span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 My payslips
									 								</div>
								<div class="status-number">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			
			
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php $this->load->view('footer');?>