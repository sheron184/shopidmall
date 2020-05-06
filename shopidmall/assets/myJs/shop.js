function get_products(category_id){
	$.ajax({
          url:"<?php echo base_url(); ?>shop/shop_category",
          method: 'post',
          data: { category_id:category_id },
          dataType: "json",
          success: function( response ) {
            console.log(response.data);
            $('#token_response').append( '<br />' + JSON.stringify(response.data));
          }
    });
}
/*
var pressTimer;
$(document).ready(function(){
  clearTimeout(pressTimer);
  return false;
}).mousedown(function(){
  pressTimer = window.setTimeout(function(){
    $(".long_click").click(function(){
      alert('hello');
    })
  },1000);
  return false;
});
*/