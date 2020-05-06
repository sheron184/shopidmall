<script src="<?php echo base_url(); ?>/assets/myJs/cart.js" type="text/javascript"></script>
<div class="container">
	<?php if($this->session->flashdata('delete')): ?>
        <div class="alert alert-success"> 
            <?php echo $this->session->flashdata('delete'); ?>
        </div>
    <?php endif; ?>
	<div class="row">
		<div class="col-12 card shadow-sm mt-4 p-0 my_card">
			<div>
				<div class="">
					<table class="table mb-0 table-borderless table-responsive-md">
						<thead class="thead-light">
							<tr>
								<th>Item</th>
								<th>Item name</th>
								<th>Description</th>
								<th>Condition</th>
								<th>Contact</th>
								<th>Price</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i=0; $i <$items_len ; $i++): ?>
								<?php foreach ($carts_it[$i] as $item): ?>
							<tr class="cart_row">
								<td><img style="width: 50px;height:50px;" class="category_img" src="<?php echo base_url(); ?>uploads/<?php echo $item->item_pic; ?>"></td>
								<td><?php echo $item->name  ?></td>
								<td><?php echo $item->description  ?></td>
								<td><?php echo "New"  ?></td>
								<td><?php echo $item->contact  ?></td>
								<td class="price"><?php echo $item->price  ?></td>
								<td><a href="<?php echo base_url(); ?>cart/delete_cart_item/<?php echo $cart_data[$i]->id; ?>"><i class="fa fa-trash"></i></a></td>
							</tr>
							<p class="items_ids d-none"><?php echo $item->id ?></p>
							<p class="items_categories d-none"><?php echo $item->category ?></p>
								<?php endforeach; ?>
							<?php endfor; ?>
							<tr class="border-bottom">
								<td class="border-right" colspan="4" align="center">Total</td>
								<td align=""></td>
								<td class="text-danger d-flex flex-row">$<p class="total"></p></td>
								<td></td>
							</tr>
						</tbody>
					</table>
					<div class="p-3 d-flex justify-content-end buy_cart">
						<form class="cart_form" method="POST" action="<?php echo base_url() ?>pay/add_cart_payment">
							<input class="btn btn-outline-danger" type="submit" name="submit" value="Buy these items">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>