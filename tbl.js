$(document).ready(function () {
	$('#switchtologin').click(function(){
	$('#signupmodal').modal('hide');
	$('#loginmodal').modal('show');
});
$('#switchtosignup').click(function(){
	$('#loginmodal').modal('hide');
	$('#signupmodal').modal('show');
});
$('#forgotpw').click(function(){
	$('#loginmodal').modal('hide');
	$('#forgotmodal').modal('show');
});
function checkPw() {
	var pass = $("#pass1").val();
	var confPass = $("#pass2").val();
	if (pass != confPass) {
		$("#pass1").css("border","2px solid #aa474c");
		$("#pass2").css("border","2px solid #aa474c");
	}
	else {
		$("#pass1").css("border","2px solid #4ca579");
		$("#pass2").css("border","2px solid #4ca579");
	}
}

$("#pass2").keyup(checkPw);

$(document).on('click',function(){
	$('.collapse').collapse('hide');
})
});