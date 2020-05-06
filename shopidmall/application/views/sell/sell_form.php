<div class="container">
	<div class="row">
		<div class="col-xl-8 ml-auto mr-auto mt-4 mb-4">
			<div class="shadow-sm">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title">Create Post</h4>
					</div>
					<?php echo form_open_multipart('sell/do_upload'); ?>
						<div class="card-body d-flex">
							<div class="w-50 sell_form">
								<div class="form-group">
									<label>Category</label>
									<select id="category" name="category" class="select form-control">
										<option class="form-control">Electronics</option>
										<option class="form-control">Fashion</option>
										<option class="form-control">Sports</option>
										<option class="form-control">Vehicle_Parts</option>
									</select>
								</div>
								<div class="form-group">
									<label>Item Name</label>
									<input type="text" name="name" class="form-control" placeholder="Item Name..">
								</div>
								<div class="form-group">
									<label>Price</label>
									<input type="int" name="price" class="form-control" placeholder="Price..">
								</div>
								<div class="form-group">
									<label>Contact</label>
									<input type="text" name="contact" class="form-control" placeholder="Contact..">
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea type="text" name="description" class="form-control" placeholder="Description.."></textarea>
								</div>
								<div class="form-group">
									<input type="file" name="item_pic" size="20" class="p-1" />
								</div>
							</div>
							<div class="d-flex justify-content-center align-items-center w-50">
								<img style="width: 200px;" src="<?php echo base_url(); ?>assets/images/cart.jpg">
							</div>
						</div>
						<div class="card-footer">
							<div class="d-flex justify-content-center">
								<input type="submit" class="btn btn-warning create_post" value="Create" name="submit">
								<a href="#" class="btn btn-primary ml-2 next">Next <i class="fa fa-arrow-right text-white"></i></a>
								<a href="#" class="finish-btn">Finish</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>