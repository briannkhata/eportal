	<?php $this->load->view('header');?>
			<!-- BEGIN SIDEBAR -->
	<div class="page-content-wrapper">
		<div class="page-content">


			<div class="row margin-top-10">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-green-sharp"><?=count($this->M_user->get_active_staffs());?></small></h3>
								<small>Staff</small>
							</div>
							<div class="icon">
								<i class="icon-users"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
							
							</div>
							<div class="status">
								<div class="status-title">
								 Total Staff
								</div>
								<div class="status-number">
									 
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-blue-sharp">
									<?=count($this->M_slip->get_slips());?></h3>
								<small>Payslips</small>
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
									 All Payslips									 								</div>
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