$(document).ready(function(){
	arr = [];
	$(".price").each(function(){
		var text = $(this).text();
		arr.push(text);
	});
	const sum = arr.reduce(add,0);
	function add(accumulator,a){
		return parseInt(accumulator)+parseInt(a);
	}
	$(".total").text(sum);
	input_node = "<input class='total_inp d-none' type='text' name='amount'>";
	$(input_node).appendTo(".cart_form").val(sum);
	if(sum == 0){
		$(".buy_cart").removeClass("d-flex");
		$(".buy_cart").addClass("d-none");
	}else{
		$(".buy_cart").addClass("d-flex");
		$(".buy_cart").removeClass("d-none");
	}

	var total = $(".total").text();
	ids = [];
	$(".items_ids").each(function(){
		ids.push($(this).text());
	});
	categories = [];
	$(".items_categories").each(function(){
		categories.push($(this).text());
	});
	console.log(ids);
	for(var i=0;i<ids.length;i++){
		id_input = "<input class='my_input d-none' type='text' name='item_id[]'>";
		$(id_input).appendTo(".cart_form").val(ids[i]);
		category_input = "<input class=' d-none' type='text' name='item_category[]'>";
		$(category_input).appendTo(".cart_form").val(categories[i]);
	}

	var my_inputs = document.querySelectorAll(".my_input");
	var len_input = "<input type='text' class='d-none' name='items_length'>";
	$(len_input).appendTo(".cart_form").val(my_inputs.length);
	console.log(my_inputs.length);
});