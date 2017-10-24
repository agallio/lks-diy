$(document).ready(function(){
	// Profil Juri
	$(document).on('click',"a[modal-toggle='mo-djuri']",function(){
		$("#fdjuri")[0].reset();
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-nama');
		var username = $(this).attr('data-username');
		var lomba = $(this).attr('data-lomba');
		$("#fdjuri input[type='hidden']").val(id);
		$("#fdjuri input[name='juri_nama']").val(nama);
		$("#fdjuri input[name='juri_username']").val(username);
		$("#fdjuri select[name='lomba']").val(lomba);
		$("#fepjuri input[type='hidden']").val(id);
	});

	$("#fdjuri").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: 'post',
			dataType: 'json',
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messages").html('<div class="msg msg-success"><p>Ubah Data Berhasil</p></div>');
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

	$("#fepjuri").unbind('submit').bind('submit',function(){
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

	// Nilai
	$(document).on('click',"a[modal-toggle='mo-dnilai']",function(){
		$("#fdnilai")[0].reset();
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-nama');
		var lomba = $(this).attr('data-lomba');
		var nilai = $(this).attr('data-nilai');
		$("#fdnilai input[type='hidden']").val(id);
		$("#fdnilai select[name='peserta']").val(nama);
		$("#fdnilai select[name='lomba']").val(lomba);
		$("#fdnilai input[name='nilai'").val(nilai);
		$("#fdenilai input[type='hidden']").val(id);
	});	

	$(document).on("click","select[name='peserta']",function(){
		var id = $(this).val();
		$.ajax({
			url: '../admin/php/getlombaid.php',
			type: 'post',
			dataType: 'json',
			data: { 'id': id },
			success: function(response) {
				if (response.success) {
					$("select[name='lomba']").val(response.lomba_id);
				}
			}
		});
	});

	$("#fcnilai").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: 'post',
			dataType: 'json',
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messages").html('<div class="msg msg-success"><p>Tambah Data Berhasil</p></div>');
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
	
	$("#fdnilai").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: 'post',
			dataType: 'json',
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messages").html('<div class="msg msg-success"><p>Ubah Data Berhasil</p></div>');
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

	$("#fdenilai").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".messages").html('');
		$.ajax({
			url: form.attr('action'),
			type: 'post',
			dataType: 'json',
			data: form.serialize(),
			success: function(response) {
				if (response.success) {
					$(".messagesdel").html('<div class="msg msg-success"><p>Hapus Data Berhasil</p></div>');
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
			url: '../juri/php/logout.php',
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