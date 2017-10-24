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
		$("#fdepeserta input[type='hidden']").val(id);
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

	$("#fdepeserta").unbind('submit').bind('submit',function(){
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

	// Lomba
	$(document).on('click',"a[modal-toggle='mo-dlomba']",function(){
		$("#fdlomba")[0].reset();
		var id = $(this).attr('data-id');
		var lomba_nama = $(this).attr('data-nama');
		$("#fdlomba input[type='hidden']").val(id);
		$("#fdlomba input[name='lomba_nama']").val(lomba_nama);
		$("#fdelomba input[type='hidden']").val(id);
	});

	$("#fclomba").unbind('submit').bind('submit',function(){
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

	$("#fdlomba").unbind('submit').bind('submit',function(){
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

	$("#fdelomba").unbind('submit').bind('submit',function(){
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

	// Juri
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
		$("#fdejuri input[type='hidden']").val(id);
	});

	$("#fcjuri").unbind('submit').bind('submit',function(){
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

	$("#fdejuri").unbind('submit').bind('submit',function(){
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
			url: '../admin/php/logout.php',
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