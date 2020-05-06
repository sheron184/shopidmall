<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/for_paypal.css">
<link href="<?php echo base_url(); ?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script>
	paypal.Buttons().render('body');
	var PAYPAL_CLIENT = 'PAYPAL_LIVE_CLIENT';
	var PAYPAL_SECRET = 'PAYPAL_LIVE_SECRET';
	var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
</script>
<section class="cancle">
	<p class="text-danger text-center">If you are not buying please make sure you cancle the order.</p>
	<a href="<?php echo base_url() ?>pay/delete_one_item_payment/<?php echo $new_payment_id ?>" class="btn btn-danger ml-auto mr-auto">Cancle</a>
</section>

