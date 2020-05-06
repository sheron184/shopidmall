<div>
	<?php if($this->session->flashdata('add_item')): ?>
        <div class="alert alert-success"> 
            <?php echo $this->session->flashdata('add_item'); ?>
        </div>
    <?php endif; ?>
</div>
<div class="container-fluid selling-banner shadow-sm">
	<div class="">
		<div class="row">
			<div class="col-12 pt-5 pb-5">
				<div class="mt-3 banner-text pl-2">
					<h3 class="d-4" align="center">Selling on eBay is the easy way<br> to make extra money</h3>
				</div>
				<div class="p-3 d-flex">
					<a class="mr-auto ml-auto" href="<?php echo base_url(); ?>store/create_store"><button class="main-btn shadow mr-auto ml-auto">Build your store<i aria-hidden="true" class="fa fa-arrow-right ml-2 right_arrw"></i></button></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container mt-3">
	<div class="row">
		<div class="col-12 d-flex items_column">
			<div class="w-xl-50 p-3 d-flex justify-content-center">
				<img class="img_box" src="<?php echo base_url(); ?>/assets/images/items.jpg">
			</div>
			<div class="w-xl-50 p-3">
				<h6 class="ebay-store"><strong>eBay Store...</strong></h6>
				<div class="reasons p-4">
					<p><i class="fa fa-star-o mr-2"></i>Worldwide customers</p>
					<p><i class="fa fa-star-o mr-2"></i>Online money transfer</p>
					<p><i class="fa fa-star-o mr-2"></i>Easy selling</p>
					<p><i class="fa fa-star-o mr-2"></i>Easy to manage</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="pt-4 pb-2">
				<h4 class="text-center whtsell">What Can You Sell..?</h4>
			</div>
		</div>
		<div class="col-3">
			<div class="p-3">
				<div class="sell-col sell-col-img-1"></div>
				<h5 class="text-center mt-1 font-weight-normal">Smart Phones</h5>
			</div>
		</div>
		<div class="col-3">
			<div class="p-3">
				<div class="sell-col sell-col-img-2"></div>
				<h5 class="text-center mt-1 font-weight-normal">Laptops</h5>
			</div>
		</div>
		<div class="col-3">
			<div class="p-3">
				<div class="sell-col sell-col-img-3"></div>
				<h5 class="text-center mt-1 font-weight-normal">Vehicle Parts</h5>
			</div>
		</div>
		<div class="col-3">
			<div class="p-3">
				<div class="sell-col sell-col-img-4"></div>
				<h5 class="text-center mt-1 font-weight-normal">Fashion</h5>
			</div>
		</div>
	</div>
</div>

