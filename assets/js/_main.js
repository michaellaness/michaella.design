// -- Set Dynamic Heights and CSS -- //
function resizeDiv() {
	vpw = $(window).width();
	vph = $(window).height();
}

$(document).ready(function(){
	resizeDiv();


	$('#menu-toggle').click(function(event) {
		event.preventDefault();

		$(this).toggleClass('nav-active');
		$('#page').toggleClass('nav-active');
		$('#site-navigation').toggleClass('nav-active');
	});

});

window.onresize = function() {
	resizeDiv();
};


// Smooth Scroll
$(function() {
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});
