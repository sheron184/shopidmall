<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/shop.css">
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div>
				<div class="card p-3">
					<div class="card-header" style="background-color: transparent;">
						<div class="header-title">
							Shop <i class="fa fa1 fa-arrow-right"></i> <i class="fa1-1"><?php echo $category; ?></i>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12 category_bar">
								<div class="pt-3 pb-3">
									<ul class="list-group mylist">
										<?php foreach ($categories as $category):?>
											<li class="list-group-item list_item"><a class="item_link" href="<?php echo base_url() ?>shop/shop_category/<?php echo $category->id; ?>"><?php echo $category->category_name ?></a></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
							<div class="col-xl-10 col-lg-10 col-md-8 col-sm-12 col-12 pt-3">
								<div class="row">
									<?php $this->load->view($category_products) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
