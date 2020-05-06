<div class="container">
	 <?php if($this->session->flashdata('add_to_cart')): ?>
                <div class="alert alert-success"> 
                    <?php echo $this->session->flashdata('add_to_cart'); ?>
                </div>
            <?php endif; ?>
	<div class="p-3">
		<h4><?php echo $category ?></h4>
	</div>
	<div class="row">
		 <?php foreach ($products as $product): ?>
		 	<div class="col-3">
		 		<div class="p-3">
		 			<div class="card">
				 		<div class="card-header">
				 			<h4 class="header-title"></h4><?php echo $product->name ?></h4>
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
				 				<a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $product->id; ?>/<?php echo $category ?>" class="btn"><i class="fa fa-shopping-cart"></i></a>
				 				<a href="<?php echo base_url(); ?>buy/wishlist/<?php echo $product->id ?>/<?php echo $category ?>" class="btn"><i class="fa fa-heart-o"></i></a>
				 				<a href="<?php echo base_url(); ?>buy/add_most_view/<?php echo $product->id; ?>/<?php echo $category; ?>" class="btn"><i class="fa fa-eye"></i></a>
				 			</div>
				 		</div>
			 		</div>
		 		</div>
		 	</div>
		 <?php endforeach; ?>
	</div>
</div>