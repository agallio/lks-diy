$(document).ready(function(){
	var url = window.location.href;
	var url_split = url.split('/');
	var url_length = url_split.length;
	var url_parameter = url_split[url_length-1];
	if (url_parameter == "") {
		$(".page").load('page/beranda.php');
	} else {
		$(".page").load('page/'+url_parameter+'.php',function(response,status,xhr){
			if (status=='error') {
				var msg = '<p>Halaman Tidak Ditemukan</p>';
				$(".page").html(msg);
			} 
		});
	}

});