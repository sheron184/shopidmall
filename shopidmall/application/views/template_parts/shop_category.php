<?php foreach($products as $product): ?>
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
		<div class="card mt-3 product_card ml-auto mr-auto">
			<div class="card-header">
				 <div class="header-title">
				 	<?php echo $product->name ?>
				 </div>
			</div>
			<div class="card-body p-0">
				<img class="category_img" src="<?php echo base_url(); ?>uploads/<?php echo $product->item_pic; ?>">
			</div>
			<div class="card-footer">
				<div>
				 	<h5><?php echo $product->description ?></h5>
				</div>
				<div>
				 	<p><i>Price:</i> <?php echo $product->price ?></p>
				</div>
				<div>
				 	<p><i>Contact:</i> <?php echo $product->contact ?></p>
				</div>
				<div class="d-flex justify-content-center">
				 	<a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $product->id; ?>/<?php echo $product->category ?>" class="btn"><i class="fa fa-shopping-cart"></i></a>
				 	<a href="<?php echo base_url(); ?>buy/wishlist/<?php echo $product->id ?>/<?php echo $product->category ?>" class="btn"><i class="fa fa-heart-o"></i></a>
				 	<a href="<?php echo base_url(); ?>buy/add_most_view/<?php echo $product->id; ?>/<?php echo $product->category ?>" class="btn"><i class="fa fa-eye"></i></a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
