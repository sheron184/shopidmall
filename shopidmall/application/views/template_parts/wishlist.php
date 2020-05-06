<div class="container">
	<div class="row">
		<?php for ($i=0; $i <$items_len ; $i++): ?>
			<?php foreach ($wishlist_items[$i] as $item): ?>
			 	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			 		<div class="p-3">
			 			<div class="card my_card">
					 		<div class="card-header">
					 			<h4 class="header-title"></h4><?php echo $item->name ?></h4>
					 		</div>
					 		<div class="card-body p-0">
					 			<img class="category_img" src="<?php echo base_url(); ?>uploads/<?php echo $item->item_pic; ?>">
					 		</div>
					 		<div class="card-footer">
					 			<div>
					 				<h5><?php echo $item->description ?></h5>
					 			</div>
					 			<div>
					 				<p><i>Price:</i> <?php echo $item->price ?></p>
					 			</div>
					 			<div>
					 				<p><i>Contact:</i> <?php echo $item->contact ?></p>
					 			</div>
					 			<div class="d-flex justify-content-center">
					 				<a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $item->id; ?>/<?php echo $items_categories[$i]; ?>" class="btn"><i class="fa fa-shopping-cart"></i></a>
					 				<!--
					 				<a href="<?php echo base_url(); ?>buy/wishlist/<?php echo $item->id ?>/<?php echo $category ?>" class="btn"><i class="fa fa-heart-o"></i></a>
									-->
					 				<a href="#" class="btn"><i class="fa fa-credit-card"></i></a>
					 			</div>
					 		</div>
				 		</div>
			 		</div>
			 	</div>
			 <?php endforeach; ?>
		<?php endfor; ?>
	</div>
</div>