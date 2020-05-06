<div class="w-50 p-3">
	<?php echo form_open_multipart('admin/create_category'); ?>
	<div class="form-group">
		<label>Category Name</label>
		<input class="form-control" type="text" name="category_name" placeholder="Category Name..">
	</div>
	<div class="form-group">
		<label>Category Picture</label>
		<input class="form-control p-1" type="file" name="category_pic">
	</div>
	<input type="submit" name="submit" value="Upload">
</div>
