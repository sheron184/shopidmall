$(document).ready(function(){
	$(".buyit_now").click(function(){
		$("#fade").addClass("wrapper");
		$(".paypal_view").removeClass("d-none");
	});
	$(".quantity").on("change",function(){
		var price = $('.hidden_price').text();
		//console.log(price);
		var quantity = $(".quantity").val();
		//console.log(quantity);
		var total = quantity * price ;
		$(".price").text(total);
		$(".total_amount").val(total);
	});
});
