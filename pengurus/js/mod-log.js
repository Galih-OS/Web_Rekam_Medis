$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Mengambil variable value dari link, coba perhatikan script html yang "<a href="">
		var loginBox = $(this).attr('href');

		//Fade in the Popup dan menambahkan tombol "close". Check <div>" yang memiliki id "loginbox" itu tampilan di popup nya.
		$(loginBox).fadeIn(300);
		
		//Setting alignment center padding dan border (ini untuk posisi popup nya)
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Ini agar tampilan menjadi mask 
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// Ketika menekan icon "x" (Close), Popup langsung tertutup.
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});