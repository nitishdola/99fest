/* ---------------------------------------------- /*
 * Home vertical text slider 
/ ---------------------------------------------- */
$('.home-slider').flexslider({
      animation: "slide",
      directionNav: false,
      controlNav: false,
      direction: "vertical",
      slideshowSpeed: 5000,
      animationSpeed: 1000,
      smoothHeight: true,
      useCSS: false
  });

/* ---------------------------------------------- /*
 * Home section height
/* ---------------------------------------------- */

function buildHomeSection(homeSection) {
	if (homeSection.length > 0) {
		if (homeSection.hasClass('home-full-height')) {
			homeSection.height($(window).height());
		} else {
			//homeSection.height($(window).height() * 0.85);
			homeSection.height($(window).height() * 0.72);
		}
	}
}
		
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