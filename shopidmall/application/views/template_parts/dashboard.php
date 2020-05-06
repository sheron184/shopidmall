<div class="container card shadow-sm mt-3 my_card">
	<div class="row">
		<div class="col-12">
			<div class="p-3">
				<ul class="nav nav-tabs"> 
					<li class="nav-item"><a data-toggle="tab" href="#profile" class="nav-link active">Profile</a></li>
					<li class="nav-item"><a data-toggle="tab" href="#link" class="nav-link">Baught items</a></li>
				</ul>
				<div class="tab-content">
					<div id="profile" class="tab-pane show fade container active">
						<div class="p-3">
							<h5>Hello,<?php echo $this->session->userdata('username'); ?></h5>
							<div class="w-50 mb-3 mt-3">
								<form action="" method="POST">
									<div class="form-group d-flex flex-row align-items-center">
										<label>Username:</label>
										<input type="text" name="username" class="form-control ml-2" value="<?php echo $this->session->userdata('username'); ?>">
									</div>
									<div class="d-flex flex-row align-items-center">
										<label>UserEmail:</label>
										<input type="text" name="email" class="form-control ml-2" value="<?php echo $this->session->userdata('email') ?>">
									</div>
									<div class="mt-2">
										<input type="submit" value="Save" class="btn btn-info">
									</div>
								</form>
							</div>
						</div>
					</div>
					<div id="link" class="tab-pane container fade">
						<h1>link</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>