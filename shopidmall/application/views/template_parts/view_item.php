<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<div class="container card shadow-sm mt-3">
	<div class="row">
		<div class="col-6">
			<div class="p-4">
				<div>
					<img class="item_img" src="<?php echo base_url(); ?>uploads/<?php echo $item[0]->item_pic; ?>">
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="p-4">
				<div class="border-bottom">
					<h4><?php echo $item[0]->name; ?></h4>
				</div>
				<div class="mt-2">
					<p>Condition: <i>New</i></p>
					<form action="<?php echo base_url(); ?>pay/add_one_item_payment/<?php echo $item[0]->id ?>" method="POST">
						<div class="form-group d-flex">
							<label> Quantity:</label>
							<input value="1" style="width: 80px;" type="number" class="form-control ml-2 quantity" name="quantity">
						</div>
						<p>About Item: <i><?php echo $item[0]->description; ?></i></p>
						<p class="d-none hidden_price"><?php echo $item[0]->price; ?></p>
						<p>Price: $<i class="text-danger price"><?php echo $item[0]->price; ?></i></p>
						<input type="text" name="amount" class="total_amount" value="<?php echo $item[0]->price; ?>">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-danger<?php echo $item[0]->price; ?>">Add To Cart</a>
							<!--<input class="btn btn-success ml-2" type="submit" name="submit" value="Buy It Now">-->
							<button type="submit" class="btn btn-success ml-2">Buy It Now</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>
<script type="text/javascript">
  function pay(amount) {
    var handler = StripeCheckout.configure({
      key: 'pk_test_5f6jfFP2ZV5U9TXQYG0vtqFJ00eFVWNoRX', // your publisher key id
      locale: 'auto',
      token: function (token) {
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
        console.log('Token Created!!');
        console.log(token)
        $('#token_response').html(JSON.stringify(token));
  
        $.ajax({
          url:"<?php echo base_url(); ?>stripe/payment",
          method: 'post',
          data: { tokenId: token.id, amount: amount },
          dataType: "json",
          success: function( response ) {
            console.log(response.data);
            $('#token_response').append( '<br />' + JSON.stringify(response.data));
          }
        })
      }
    });
    handler.open({
      name: 'Demo Site',
      description: '2 widgets',
      amount: amount * 100
    });
  }
</script>