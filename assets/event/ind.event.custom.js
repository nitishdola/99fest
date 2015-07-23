$(document).ready(function(){
	/* scrollspy */
	$('body').scrollspy({
		target: '.sidenav'
	});

	$('#agreetnc').click(function() {
	    check = $("#agreetnc").is(":checked");
	    if(check) {
	    	$('#buy-ticket').removeAttr('disabled');	
	    }else{
	    	$('#buy-ticket').attr('disabled','disabled');	
	    }
	 });

	$('.thumbs img').each(function() {
        var maxWidth = 220; // Max width for the image
        var maxHeight = 130;    // Max height for the image
        var ratio = 0;  // Used for aspect ratio
        var width = $(this).width();    // Current image width
        var height = $(this).height();  // Current image height

        // Check if the current width is larger than the max
        if(width > maxWidth){
            ratio = maxWidth / width;   // get ratio for scaling image
            $(this).css("width", maxWidth); // Set new width
            $(this).css("height", height * ratio);  // Scale height based on ratio
            height = height * ratio;    // Reset height to match scaled image
            width = width * ratio;    // Reset width to match scaled image
        }

        // Check if current height is larger than max
        if(height > maxHeight){
            ratio = maxHeight / height; // get ratio for scaling image
            $(this).css("height", maxHeight);   // Set new height
            $(this).css("width", width * ratio);    // Scale width based on ratio
            width = width * ratio;    // Reset width to match scaled image
            height = height * ratio;    // Reset height to match scaled image
        }
    });


	$('select').change(function() {
		total_val = 0;
		$('select.book_ticket').each(function() {
			//alert($(this).val());
			var mystr 	= $(this).val();
			var myarr 	= mystr.split("_");
			
			var qty 	= mystr[0];
			var price	= mystr[1];	

			var qty = myarr[0];
			var price = myarr[1];

			if(!isNaN(qty*price)) {
				total_val = parseInt(total_val)+(qty*price);
			}
	      	
	      	
		});
		$('.total-amount-box').text(total_val.toFixed(2));
    });

    $("#buy-ticket-form").submit(function(e){
	    total_val = $('.total-amount-box').text();
	    if(total_val == '') {
	    	e.preventDefault();
	    	alert('Please select at least one ticket');
	    }
	});
	/* smooth scroll with nicescroll in sidenav */
	$('.sidenav').niceScroll({
		cursorcolor: '#333',
		cursorwidth: '4',
		cursorborder: '1px solid #333',
		cursoropacitymax: 0,               
		spacebarenabled: false,       
		scrollspeed: 150,
		autohidemode: true,
		horizrailenabled: false,
		cursorborderradius: 4,
		zindex: 1060
	});

	/* animation of page scrolling */
	$('.sidenav .navbar-nav li:not(.dropdown) a, .scroll-down, .btn-totop').on('click', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
		    scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});

	$(".sidenav").getNiceScroll().resize();

	/* header image with backstretch */
	var poster = $('#poster_path').val();
	$('#header').backstretch(poster);
	/* short profession, hoby, etc. with typed */
	$(".typed").typed({
        strings: ["Professional Graphic Designer.", "Crazy Chocolate Lover.", "Pretty Awesome Writer."],
        typeSpeed: 50,
        backDelay: 500,
        loop: true,
        loopCount: false,
  	});

  	/* work carousel */
  	$('#portfolio').carousel({ interval: false });

  	/* map contact with gmap3 */
  	$("#map").gmap3({
	    map:{
		    options:{
		      center:[-7.865240, 110.387098],
		      zoom: 14
		    }
		  },
		  marker:{
		    values:[
		      {latLng:[-7.865240, 110.387098], data:"<h3 class='text-center font-kaushan'>Dianalabs.</h3><p><strong>East Imogiri St.</strong><br>Bantul. Yogyakarta. Indonesia<br> hello@dianalabs.com</p> <p>MON - SAT : 08.00 AM - 03.00 PM</p>", options:{/*icon: "http://maps.google.com/mapfiles/marker.png"*/} },
		    ],
		    options:{
		      draggable: false,
		      //animation: { animation: bounce},
		    },
		    events:{
		      mouseover: function(marker, event, context){
		        var map = $(this).gmap3("get"),
		          infowindow = $(this).gmap3({get:{name:"infowindow"}});
		        if (infowindow){
		          infowindow.open(map, marker);
		          infowindow.setContent(context.data);
		        } else {
		          $(this).gmap3({
		            infowindow:{
		              anchor:marker, 
		              options:{content: context.data}
		            }
		          });
		        }
		      },
		    }
		  }
	  });

	/* masonry layout */
	var $container = $('.container-masonry');
	// initialize
	$container.masonry();

	/* popup image with magnific popup */
	$('.image-popup').magnificPopup({
		removalDelay: 300,
		mainClass: 'mfp-with-zoom',
		type: 'image',
		image: { titleSrc: 'title' },
		zoom: {
		    enabled: true, 
		    duration: 300, 
		    easing: 'ease-in-out',
		    opener: function(openerElement) {
		      return openerElement.is('img') ? openerElement : openerElement.find('img');
		    }
		}
	});
	/* gallery image popup with magnific popup*/
	$('.image-popup-gallery').magnificPopup({
		removalDelay: 300,
		mainClass: 'mfp-fade',
		type: 'image',
		gallery: { enabled: true },
		image: { titleSrc: 'title' },
		zoom: {
		    enabled: true, 
		    duration: 300, 
		    easing: 'ease-in-out',
		    opener: function(openerElement) {
		      return openerElement.is('img') ? openerElement : openerElement.find('img');
		    }
		}
	});

	/* button scroll top */
	var $scroll = $(window).scrollTop();
	if($(window).scrollTop() > 300){
		$('.btn-totop').removeClass('btn-totop-hide');
	}else{
		$('.btn-totop').addClass('btn-totop-hide');
	}

	$(window).scroll(function(){
		if($(window).scrollTop() > 300){
		console.log('hae');
		  $('.btn-totop').removeClass('btn-totop-hide');
		}else{
		  $('.btn-totop').addClass('btn-totop-hide');
		}
	});


})