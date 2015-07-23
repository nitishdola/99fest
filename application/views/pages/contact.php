<style>
  #map-canvas {
    width: 100%;
    height: 400px;
    border:1px solid #d8d8d8;
    padding:3%;
  }
</style>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  function initialize() {
    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
      center: new google.maps.LatLng(26.135317, 91.803061),
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="json-overlay" style="display:none"></div>
<section class="module">
	<div class="container">
		<div class="row" style="padding:4%">

			<div class="col-sm-6 col-sm-offset-3">

				<h2 class="module-title font-alt">Get in touch</h2>

			</div>

		</div><!-- .row -->

		<div class="row">
			<div class="col-md-6">

				<form id="contact-form" role="form" novalidate="">

					<div class="form-group">
						<label class="sr-only" for="cname">Name</label>
						<input type="text" id="cname" class="form-control" name="cname" placeholder="Name*" required="" data-validation-required-message="Please enter your name.">
						<p class="help-block text-danger"></p>
					</div>

					<div class="form-group">
						<label class="sr-only" for="cemail">Your Email</label>
						<input type="email" id="cemail" name="cemail" class="form-control" placeholder="Your E-mail*" required="" data-validation-required-message="Please enter your email address.">
						<p class="help-block text-danger"></p>
					</div>

					<div class="form-group">
						<label class="sr-only" for="cemail">Contact Number</label>
						<input type="text" id="cnumber" name="contact_number" class="form-control" placeholder="Your Contact number*" required="" data-validation-required-message="Please enter your contact number.">
						<p class="help-block text-danger"></p>
					</div>

					<div class="form-group">
						<textarea class="form-control" id="cmessage" name="cmessage" rows="7" placeholder="Message*" required="" data-validation-required-message="Please enter your message."></textarea>
						<p class="help-block text-danger"></p>
					</div>

					<div class="text-center">
						<button type="button" id="submit" class="btn btn-block btn-round btn-d">Submit</button>
					</div>

				</form>

						<!-- Ajax response -->
						<div id="contact-response" class="ajax-response font-alt"></div>

			</div>

			<div class="col-md-6" style="text-align:center; font-weight:700;">
				<p>House No. 1, RukminigGoan,</p>
                <p>Ghana Kanta Kumar Path,</p>
               	<p>Six mile, Guwahati-22</p>
			</div>

		</div><!-- .row -->	

		<div class="row" style="margin-top:3%">
			<div class="col-md-12" id="map-canvas"></div>
		</div>
	</div>
</section>


<script>
$('#submit').click(function() {

	var data = '';
	var url_to_call = '';

	name = $('#cname').val();
	email = $('#cemail').val();
	number = $('#cnumber').val();
	message = $('#cmessage').val();

	if(name == '') {
		sweetAlert("Oops...", "Contact name is empty!", "error");
	}else if(email == '') {
		sweetAlert("Oops...", "Email is empty!", "error");
	}else if(number == '') {
		sweetAlert("Oops...", "Number is empty!", "error");
	}else if(message == '') {
		sweetAlert("Oops...", "Message is empty!", "error");
	}else{
		$('#json-overlay').show();
		
		data += '&name='+name+'&email='+email+'&number='+number+'&message='+message;

		url_to_call += '<?php echo base_url(); ?>messages/send';

		$.ajax({
			data : data,
			type : 'get',
			url  : url_to_call,

			error : function(resp) {
				$('#json-overlay').hide();
				sweetAlert("Oops...", "Something went wrong !", "error");
			},
			success : function(resp) {
				$('#json-overlay').hide();
				if(resp) {
					swal("Message sent!", "Your message has been submitted successfully :)", "success")
				}else{
					sweetAlert("Oops...", "Unable to submit :(", "error");
				}
			}
		});
	}

});
</script>
				