$(document).ready(function(){
	var url = window.location.href;
	var url_split = url.split('/');
	var url_length = url_split.length;
	var url_parameter = url_split[url_length-1];
	$("input[name='search']").keyup(function(){
		$(".tabel").load('../admin/page/tb'+url_parameter.charAt(0).toUpperCase()+url_parameter.slice(1).toLowerCase()+'.php', {'search':$(this).val()});
	});
});