<div class="container mt-4">
	<div class="row">
		<div class="col-xl-12">
			<div class="p-3 d-flex flex-row">
				<h6 class="mr-2 mb-0 mt-1">Search results for: </h6> <h5 class="m-0"><?php echo $keyword ?></h5>
			</div>
			<div class="card my_card d-flex flex-row p-4">
				<?php if(!empty($search_items)): ?>
				<?php for( $i=0; $i<$len; $i++): ?>
					<div class="card w-25 m-3">
						<div class="card-header">
							<div class="header-title">
								<h6 class="text-center"><?php echo $search_items[$i][0]->name ?></h6>
							</div>
							
						</div>
						<div class="card-body p-0">
					 		<img class="category_img" src="<?php echo base_url(); ?>uploads/<?php echo $search_items[$i][0]->item_pic; ?>">
					 	</div>
					 		<div class="card-footer">
					 			<div>
					 				<h5><?php echo $search_items[$i][0]->description ?></h5>
					 			</div>
					 			<div>
					 				<p><i>Price:</i> <?php echo $search_items[$i][0]->price ?></p>
					 			</div>
					 			<div>
					 				<p><i>Contact:</i> <?php echo $search_items[$i][0]->contact ?></p>
					 			</div>
					 			<div class="d-flex justify-content-center">
					 				<a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $search_items[$i][0]->id; ?>/<?php echo $search_items[$i][0]->category; ?>" class="btn"><i class="fa fa-shopping-cart"></i></a>
					 				
					 				<a href="<?php echo base_url(); ?>buy/wishlist/<?php echo $search_items[$i][0]->id; ?>/<?php echo $search_items[$i][0]->category; ?>" class="btn"><i class="fa fa-heart-o"></i></a>
									
					 				<a href="#" class="btn"><i class="fa fa-credit-card"></i></a>
					 			</div>
					 		</div>
					</div>
				<?php endfor; ?>
				<?php else: ?>
					<div class="alert alert-danger w-100 h-50">
						<h6 class="text-center">Sorry..We couldn't find anything</h6>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>