$(document).ready(function(){
	// Peserta
	$(document).on('click',"a[modal-toggle='mo-dpeserta']",function(){
		$("#fdpeserta")[0].reset();
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-nama');
		var no = $(this).attr('data-no');
		var tgl = $(this).attr('data-tgl');
		var kls = $(this).attr('data-kls');
		var sekolah = $(this).attr('data-sekolah');
		var username = $(this).attr('data-username');
		var lomba = $(this).attr('data-lomba');
		$("#fdpeserta input[type='hidden']").val(id);
		$("#fdpeserta input[name='nama']").val(nama);
		$("#fdpeserta input[name='no']").val(no);
		$("#fdpeserta input[name='tgl']").val(tgl);
		$("#fdpeserta input[name='sekolah']").val(sekolah);
		$("#fdpeserta select[name='kelas']").val(kls);
		$("#fdpeserta input[name='username']").val(username);
		$("#fdpeserta select[name='lomba']").val(lomba);
		$("#feppeserta input[type='hidden']").val(id);
	});

	$("#fdpeserta").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: 'post',
			dataType: 'json',
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messages").html('<div class="msg msg-success"><p>Ubah Data Berhasil. Silakan Login Kembali</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500,function(){
						location.reload(true);
					});
				} else {
					$(".messages").html('<div class="msg msg-error"><p>'+response.messages+'</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500);
				}
			}
		});
		return false;
	});

	$("#feppeserta").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: 'post',
			dataType: 'json',
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messagesdel").html('<div class="msg msg-success"><p>Ubah Data Berhasil</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500,function(){
						location.reload(true);
					});
				} else {
					$(".messagesdel").html('<div class="msg msg-error"><p>'+response.messages+'</p></div>');
					$(".messages").fadeTo(1500,500).slideUp(500);
				}
			}
		});
		return false;
	});

	// Logout
	$(document).on('click',"a[href='logout']",function(){
		$.ajax({
			url: '../peserta/php/logout.php',
			type: "post",
			dataType: "json",
			success: function(response){
				if(response.success==true){
					window.location.replace('../');
				}
			}
		});
	return false;
	});

});