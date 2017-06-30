$(document).ready(function (argument) {
	$("#contactForm").submit(function(){
		
		$("#name").attr("disabled","true");
		$("#email").attr("disabled","true");
		$("#message").attr("disabled","true");
		$("#btnx").attr("disabled","true");


	});

	$("#gu").change(function(){
		var n = $( "#gu:checked" ).length;

		$.post("./_support/server/update_guest.php",{"gu":n});
	
	});
});