$(document).ready(function(){
	$(document).on('click',"a[modal-toggle]",function(){
		var id = $(this).attr("modal-toggle");
		$("."+id+"").show();
		return false;
	});
	$(document).on('click',"button[modal-toggle]",function(){
		var id = $(this).attr("modal-toggle");
		$("."+id+"").show();
	});
	$("body").on('click',function(e){
		var target = $(e.target),article;
		if (target.is(".modal")) {
			$(".modal").hide();
		}
	});
});