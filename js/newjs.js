$(function() {
	$(document).ready(function(){
		var navh = $("#header").innerHeight() ;
	var winh = $(window).height();
	$("#fullheight").height(winh - navh);
	});
	var emails = ["Your email","Muhammed@example.com","Mico@example.com"]
	$('[id*="email-"]').placeholderTypewriter({text:emails});
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
