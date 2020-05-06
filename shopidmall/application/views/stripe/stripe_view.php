<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<div class="container">
	<div class="row">
		<p id="price"><?php echo $amount; ?></p>
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
        console.log(token);
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
        });
      }
    });
    handler.open({
      name: 'Demo Site',
      description: '2 widgets',
      amount: amount * 100
    });
  }
  var price_text = document.getElementById('price');
  var price = price_text.innerText;
  pay(price);
</script>