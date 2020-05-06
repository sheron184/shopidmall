<div>
	<div class="p-3">
	    <?php if($this->session->flashdata('not_register')): ?>
	        <div class="alert alert-danger"> 
	            <?php echo $this->session->flashdata('not_register'); ?>
	        </div>
	    <?php endif; ?>
	    <?php if($this->session->flashdata('not_logged')): ?>
	        <div class="alert alert-danger"> 
	            <?php echo $this->session->flashdata('not_logged'); ?>
	        </div>
	    <?php endif; ?>
	    <?php if($this->session->flashdata('errors')): ?>
	    	<div class="w-50 alert alert-danger ml-auto mr-auto">
	    		<h6 class="text-center"><?php echo $this->session->flashdata('errors'); ?></h6>
	    	</div>
		<?php endif; ?>
	</div>
	<div class="container">
		<div class="row"> 
			<div class="col-xl-8 d-flex flex-row ml-auto mr-auto shadow-sm mt-5 forms p-0 position-relative">
				<div class="w-50 forms">
					<div class="login_form w-100">
						<div class="p-3 w-100">
							<h4 class="sign_in_title" align="center">Sign in to eBay</h4>
							<form action="<?php echo base_url(); ?>/users/login" method="POST">
								<div class="form-group pl-4 pr-4 pt-4">
									<div class="my_input_wrapper"><i class="fa fa-user my_icon"></i><input class="form-control ml-3 my_input" type="text" name="username" placeholder="Username.."></div>
								</div>
								<div class="form-group pl-4 pr-4 d-flex justify-content-center flex-column">
									<div class="my_input_wrapper"><i class="fa fa-lock my_icon"></i><input class="form-control ml-3 my_input" type="text" name="password" placeholder="Password.."></div>
									<input class="mt-3 ml-auto mr-auto btn sign_in" type="submit" value="Sign in" name="Login">
								</div>
							</form>
						</div>
					</div>
					<!--<div class="p-4"><div class="border-div"></div></div>-->
					<div class="d-none register_form">
						<div class="p-5 w-100">
							<h5 class="sign_in_title" align="center">Sign Up</h5>
							<form action="<?php echo base_url(); ?>/users/register" method="POST">
								<div class="form-group">
									
									<div class="my_input_wrapper"><i class="fa fa-user my_icon"></i><input class="form-control ml-3 my_input" type="text" name="username_rg" placeholder="Username.."></div>
									
								</div>
								<div class="form-group">
									<div class="my_input_wrapper"><i class="fa fa-envelope my_icon"></i><input class="form-control ml-4 my_input" type="text" name="email" placeholder="Email.."></div>
									
								</div>
								<div class="form-group">
									
									<div class="my_input_wrapper"><i class="fa fa-lock my_icon"></i><input class="form-control ml-3 my_input" type="text" name="password_rg" placeholder="Password.."></div>
									
								</div>
								<div class="d-flex justify-content-center"><input align="center" class="btn sign_in" type="submit" value="Sign Up" name="Register"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="w-50 register_intro position-relative">
					<div class="p-3 w-100 d-flex justify-content-center align-items-center h-100 flex-column sign_up_intro position-absolute">
						<h4 class="text-white"><i>Hello friend</i></h4>
						<p class="text-white">Enter your personal details<br> and start journey with us.</p>
						<button class="btn btn-outline-light sign_up_btn">Sign Up</button>
					</div>
					<div class="p-3 w-100 d-none justify-content-center align-items-center h-100 flex-column sign_in_intro position-absolute">
						<h4 class="text-white"><i>Hello friend Wellcome back!<br></i></h4>
						<p class="text-white">Enter your account details<br> and start journey with us.</p>
						<button class="btn btn-outline-light sign_in_btn">Sign In</button>
					</div>
				</div>
		</div>
	</div>
</div>