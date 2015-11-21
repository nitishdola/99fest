$( "#addVendorSubmit" ).click(function( e ) {
  //cancel submission
  
  var vendorName 		= $('#name').val(); 
  var slug 				= $('#slug').val(); 
  var contact_number 	= $('#contact_number').val(); 
  var email 			= $('#email').val(); 
  var address 			= $('#address').val(); 
  var city_id 			= $('#city_id').val(); 
  var state_id 			= $('#state_id').val(); 
  var pin 				= $('#pin').val(); 
  var about 			= $('#about').val(); 
  var logo 				= $('#logo').val(); 
  var featuredimage 	= $('#featuredimage').val();


  if(jQuery.trim(vendorName) == '') {
  	e.preventDefault();
  	alert('Vendor name is empty');
  	$( "#name" ).focus();
  }else if(jQuery.trim(slug) == '') {
  	e.preventDefault();
  	alert('Vendor slug is empty');
  	$( "#slug" ).focus();
  }else if(jQuery.trim(contact_number) == '') {
  	e.preventDefault();
  	alert('Vendor contact number is empty');
  	$( "#contact_number" ).focus();
  }else if(jQuery.trim(email) == '') {
  	e.preventDefault();
  	alert('Vendor email is empty');
  	$( "#email" ).focus();
  }else if(jQuery.trim(address) == '') {
  	e.preventDefault();
  	alert('Vendor address is empty');
  	$( "#address" ).focus();
  }else if(jQuery.trim(city_id) == '') {
  	e.preventDefault();
  	alert('Vendor city is empty');
  	$( "#city_id" ).focus();
  }else if(jQuery.trim(state_id) == '') {
  	e.preventDefault();
  	alert('Vendor state is empty');
  	$( "#state_id" ).focus();
  }else if(jQuery.trim(pin) == '') {
  	e.preventDefault();
  	alert('Vendor pin is empty');
  	$( "#pin" ).focus();
  }else if(jQuery.trim(about) == '') {
  	e.preventDefault();
  	alert('About vendor is empty');
  	$( "#about" ).focus();
  }else if(jQuery.trim(logo) == '') {
  	e.preventDefault();
  	alert('Vendor logo is empty');
  	$( "#logo" ).focus();
  }else if(jQuery.trim(featuredimage) == '') {
  	e.preventDefault();
  	alert('Vendor featured image is empty');
  	$( "#featuredimage" ).focus();
  }


});

//Chnage password validation
$( "#changePasswordForm" ).click(function( e ) {
  //cancel submission
  
  var old_password          = $('#old').val(); 
  var new_password          = $('#new').val(); 
  var confirm_new_password  = $('#new_confirm').val(); 


  if(jQuery.trim(old_password) == '') {
    e.preventDefault();
    alert('old password is empty');
    $( "#old" ).focus();
  }else if(jQuery.trim(new_password) == '') {
    e.preventDefault();
    alert('New Password is empty');
    $( "#new" ).focus();
  }else if(jQuery.trim(confirm_new_password) == '') {
    e.preventDefault();
    alert('Confirm password is empty');
    $( "#new_confirm" ).focus();
  }else if( jQuery.trim(confirm_new_password) != jQuery.trim(new_password) ) {
    e.preventDefault();
    alert('Password did not matched');
    $( "#new_confirm" ).focus();
  }

});

$('#defaultImageAddFrom').click(function( e ) {
  var type = $('#type').val();
  var img  = $('#featuredimage').val();

  if(type < 0) {
    e.preventDefault();
    $( "#type" ).focus();
  }else if(img == '') {
    e.preventDefault();
  }
});