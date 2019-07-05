$(document).ready(function(){
	var path = window.location.href; //
	// alert(path.substring(path.lastIndexOf('/')).length);
	if(path.substring(path.lastIndexOf('/')).length != 1){
		$('li.nav-item').removeClass('active');
		$('li.nav-item a').each(function() {
			if (this.href === path) {
				$(this).addClass('active');
			}
		});
	}

	$('li.nav-item').click(function(){ // clicking nav links
		$('li.nav-item').removeClass('active');
		$(this).addClass('active');
	});

	// // Add smooth scrolling to all links
	// $(".nav-item a").on('click', function(event) {

	// 	// Make sure this.hash has a value before overriding default behavior
	// 	if (this.hash !== "") {
	// 		// Prevent default anchor click behavior
	// 		event.preventDefault();

	// 		// Store hash
	// 		var hash = this.hash;

	// 		// Using jQuery's animate() method to add smooth page scroll
	// 		// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	// 		$('html, body').animate({
	// 			scrollTop: $(hash).offset().top
	// 			}, 0, function(){
	// 				// Add hash (#) to URL when done scrolling (default click behavior)
	// 				window.location.hash = hash;
	// 		});
	// 	} // End if
	// });
});



function logo_home(){
	$('li.nav-item').removeClass('active');
	$('#nav_home').addClass('active');
}