$(document).ready(function(){
	$(".edit").on("click",function(){
		$("#fade").addClass("wrapper");
		$(".modal").fadeIn();
		var td = $(this).parents("td");
		var tr = $(td).parents('tr');
		var arr = [];
		myinputs = document.querySelectorAll('.arr_text');
		var all_tds = $(tr).find('td');
		for(var i=1;i<all_tds.length-1;i++){
			var text = $(all_tds[i]).text();
			arr.push(text);
		}
		for(var j=0; j<3;j++){
			$(myinputs[j]).val($(all_tds[j+1]).text());
		}		
	});
	$(".close_modal").click(function(){
		$(".modal").fadeOut();
		$("#fade").removeClass("wrapper");
	});
});

