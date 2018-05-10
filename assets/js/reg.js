$(document).ready(function(){
	$("#showRegisterBtn").click(function(){
		$("#loginContainer").hide();
		$("#registerInfo").hide();
		$("#registerContainer").show();
	});

	$("#returnToLogin").click(function(){
		$("#loginContainer").show();
		$("#registerInfo").show();
		$("#registerContainer").hide();
	});
});