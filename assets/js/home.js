$(document).ready(function(){
	$("#fregister").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: "post",
			dataType: "json",
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messages").html('<div class="msg msg-success"><p>Registrasi Berhasil</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500);
				} else {
					$(".messages").html('<div class="msg msg-error"><p>'+response.messages+'</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500);
				}
			}
		});
		return false;
	});

	$("#flogin").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: "post",
			dataType: "json",
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messages").html('<div class="msg msg-success"><p>Berhasil Masuk</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500,function(){
						$(location).attr('href','index.php');
					});
				} else {
					$(".messages").html('<div class="msg msg-error"><p>'+response.messages+'</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500);
				}
			}
		});
		return false;
	});

});