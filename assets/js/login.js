
		
/* -----------------------------------------------/*
* Home Animation
* -------------------------------------------------*/
var $bgobj = $('#home');

$bgobj.mousemove(function(event) {
	var docW = $(window).width();
	var docH = $(window).height();

	var diffX = (docW/2) - event.pageX;
	var diffY = (docH/2) - event.pageY;

	var posDiffX = Math.abs(diffX) / 10;
	var posDiffY = Math.abs(diffY) / 10;

	var blurDiff = posDiffX > posDiffY ? posDiffX : posDiffY;

	//operate on shadow
	$('.well').css({
		'box-shadow': (diffX/10) + 'px ' + (diffY/10) + 'px ' + blurDiff/2 + 'px rgba(0, 0, 0, 0.28)',
		'-webkit-box-shadow': (diffX/10) + 'px ' + (diffY/10) + 'px ' + blurDiff/2 + 'px rgba(0, 0, 0, 0.28)',
		'-mox-box-shadow': (diffX/10) + 'px ' + (diffY/10) + 'px ' + blurDiff/2 + 'px rgba(0, 0, 0, 0.28)'
	});

    TweenLite.to($bgobj, .5, {css:{'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"}});
});

function effectsHomeSection(homeSection, scrollTopp) {
	if (homeSection.length > 0) {
		var homeSHeight = homeSection.height();
		var topScroll = $(document).scrollTop();
		if ((homeSection.hasClass('home-parallax')) && ($(scrollTopp).scrollTop() <= homeSHeight)) {
			homeSection.css('top', (topScroll * 0.98));
		}
		if (homeSection.hasClass('home-fade') && ($(scrollTopp).scrollTop() <= homeSHeight)) {
			var caption = $('.caption-content');
			caption.css('opacity', (1 - topScroll/homeSection.height() * 1));
		}
	}
}

$('#showSignUpForm').click(function(e) {
	e.preventDefault();
	$('#loginForm').hide();
	$('#signupForm').slideDown();
});

$('#showLoginForm').click(function(e) {
	e.preventDefault();
	$('#signupForm').hide();
	$('#loginForm').slideDown();
});