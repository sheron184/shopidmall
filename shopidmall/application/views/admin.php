<!DOCTYPE html>
<html>
<?php if($this->session->userdata('admin') == true): ?>
<head>
	<title>eBay-Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/common.css">
    <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url(); ?>/assets/jquery.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>/assets/css/sidebar.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/myJs/common.js" type="text/javascript"></script>
</head>
<body>
	<?php if($this->session->userdata('logged_in')): ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 p-3 shadow-sm">
				<img src="<?php echo base_url(); ?>/assets/images/ebay-logo.png">
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 shadow-sm sideBar">
				<?php $this->load->view($sidebar); ?>
			</div>
			<div class="col-10">
				<?php if($this->session->flashdata('category_add')): ?>
                <div class="alert alert-success"> 
                    <?php echo $this->session->flashdata('category_add'); ?>
                </div>
            	<?php endif; ?>	
            	
				<?php $this->load->view($view); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</body>
<?php else: ?>
	<p class="text-danger">You are not an admin</p>
<?php endif; ?>
</html>






