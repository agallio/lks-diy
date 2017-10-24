$(document).ready(function(){
	var url = window.location.href;
	var url_split = url.split('/');
	var url_length = url_split.length;
	var url_parameter = url_split[url_length-1];
	if (url_parameter == "") {
		$(".sidenav a[href='beranda']").parent('li').addClass('active');
		$(".right").load('page/beranda.php');
	} else {
		$(".sidenav a[href='"+url_parameter+"']").parent('li').addClass('active');
		$(".right").load('page/'+url_parameter+'.php',function(response,status,xhr){
			if (status=='error') {
				var msg = '<p>Halaman Tidak Ditemukan</p>';
				$(".right").html(msg);
			} else {
				$(".tabel").load('../admin/page/tb'+url_parameter.charAt(0).toUpperCase()+url_parameter.slice(1).toLowerCase()+'.php');
			}
		});
	}

	$(".sidenav a").on('click',function(){
		var file = $(this).attr('href');
		$(".sidenav li").removeClass('active');
		$(".right").load('page/'+file+'.php',function(){
			$(".tabel").load('../admin/page/tb'+file.charAt(0).toUpperCase()+file.slice(1).toLowerCase()+'.php');
		});
		$(this).parent('li').addClass('active');
		window.history.pushState(null,null,file);
		return false;
	})
});