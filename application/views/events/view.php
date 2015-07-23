<style>
span a{
	color:#FFF;
}
span a:hover{
	color:#f5f5f5;
}
span.label {
	margin: 0 8px;
}

@import "lesshat";

/*******************************************
  = LESS
*******************************************/

/* LESS - Mixins */
.clearfix() {
  
  &:before,
  &:after {
	content: "";
	display:table;
  }
  
  &:after {
	clear: both;
  }
  
}

.transition() {
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;  
}





/*******************************************
  = RATING
*******************************************/



/* RATING - Form - Item */
.rating-form .form-item {
	position: relative;
	direction: rtl;
	/*background: green;*/
	text-align: left;
	margin-top:4%;
}

.rating-form .form-legend + .form-item {
	padding-top: 10px;
}

.rating-form input[type='radio'] {
	position: absolute;
	left: -9999px;
}

/* RATING - Form - Label */
.rating-form label {
	display: inline-block;
	cursor: pointer;
}

	.rating-form .rating-star {
   		display: inline-block;
		position: relative;
	}

.rating-form input[type='radio'] + label:before {
	content: attr(data-value);
	position: absolute;
	right: 30px; top: 83px;
	font-size: 30px; font-size: 3rem;
	opacity: 0;
	direction: ltr;
	.transition();
}

.rating-form input[type='radio']:checked + label:before {
	right: 25px;
	opacity: 1;
}

.rating-form input[type='radio'] + label:after {
	content: "/ 5";
	position: absolute;
	right: 5px; top: 96px;
	font-size: 12px; 
	font-size: 1.2rem;
	opacity: 0;
	direction: ltr;
	.transition();
}

.rating-form input[type='radio']:checked + label:after {
	/*right: 5px;*/
	opacity: 1;
}

	.rating-form label .fa {
	  font-size: 18px; font-size: 1.8rem;
	  
	  .transition();
	}

	.rating-form label .fa-star-o {

	}

	.rating-form label:hover .fa-star-o,
	.rating-form label:focus .fa-star-o,
	.rating-form label:hover ~ label .fa-star-o,
	.rating-form label:focus ~ label .fa-star-o,
	.rating-form input[type='radio']:checked ~ label .fa-star-o {
	  opacity: 0;
	}

	.rating-form label .fa-star {
	  position: absolute;
	  left: 0; top: 0;
	  opacity: 0;
	}

	.rating-form label:hover .fa-star,
	.rating-form label:focus .fa-star,
	.rating-form label:hover ~ label .fa-star,
	.rating-form label:focus ~ label .fa-star,
	.rating-form input[type='radio']:checked ~ label .fa-star {
	  opacity: 1;
	}

	.rating-form input[type='radio']:checked ~ label .fa-star {
	  color: gold;
	}

	.rating-form .ir {
	  position: absolute;
	  left: -9999px;
	}

/* RATING - Form - Action */
.rating-form .form-action {
	opacity: 0;
	position: absolute;
	left: 5px; bottom: -40px;
	.transition();
}

.rating-form input[type='radio']:checked ~ .form-action {
  cursor: pointer;
  opacity: 1;
}

.rating-form .btn-reset {
	display: inline-block;
	margin: 0;
	padding: 4px 10px;
	border: 0;
	font-size: 10px; font-size: 1rem;
	background: #fff;
	color: #333;
	cursor: auto;
	border-radius: 5px;
	outline: 0;
	.transition();
}

   .rating-form .btn-reset:hover,
   .rating-form .btn-reset:focus {
	 background: gold;
   }

   .rating-form input[type='radio']:checked ~ .form-action .btn-reset {
	 cursor: pointer;
   }


/* RATING - Form - Output */
/*
.rating-form .form-output {
	display: none;
	position: absolute;
	left: 15px; bottom: -45px;
	font-size: 13px; font-size: 3rem;
	opacity: 0;
	.transition();
}

.no-js .rating-form .form-output {
	right: 5px;
	opacity: 1;
}

.rating-form input[type='radio']:checked ~ .form-output {
	right: 5px;
	opacity: 1;
}
*/

/**Round buttuns*/

.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}

</style>
<script>
	var base_url = '';
	base_url += '<?php echo base_url(); ?>';
</script>
<div class="row">
	<h2><?php echo ucfirst($event_details[0]->name); ?></h2>
	<div class="col-md-12">
		
		<img src="<?php echo uploads_url(); ?>events/posters/<?php echo $event_details[0]->poster; ?>" />

		<p><?php echo $event_details[0]->venue; ?>, <?php echo $event_details[0]->venue_address; ?></p>
		<p>Start at <?php echo date('h:i A', strtotime($event_details[0]->event_start_time)); ?></p>

		<?php foreach($event_categories as $category) { ?>
			<span class="label label-primary">
				<?php echo anchor($event_details[0]->cityname.'/events/'.strtolower(str_replace(' ','-',$category->name)),$category->name); ?>
			</span>
		<?php } ?>
	</div>

	<?php if ($this->ion_auth->logged_in()) { ?>
	<?php foreach($event_tickets as $ticket): ?>
		<div class="col-md-12">
			<div class="col-md-3"><?php echo $ticket->name; ?></div>
			<div class="col-md-5">
				<button type="button" value="<?php echo $ticket->id; ?>" class="book-event-ticket" data-toggle="modal" data-target="#bookEventTicket">Book Tickets</button>
			</div>
			<div class="col-md-3"><?php echo $ticket->rate; ?></div>
		</div>
	<?php endforeach; ?>
	<?php }else{ ?>

	<div class="col-md-12">
	    <div class="alert alert-warning">

	        <a href="#" class="close" data-dismiss="alert">&times;</a>

	        <strong>Oops !</strong> You must login to book tickets. Please <?php echo anchor(base_url().'users/login', 'Login'); ?> here

	    </div>
    </div>


	<?php } ?>
	

	


	<!--Modal-->
	<div class="modal fade bs-example-modal-lg" id="bookEventTicket" tabindex="-1" role="dialog" aria-labelledby="bookEventTicket" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="qtyLabel">Select Quantity</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row" id="event_buy_ticket_loader" style="display:none">
	        	<img src="<?php echo uploads_url(); ?>loader.gif" />
	        </div>
	        <div class="row" id="event_buy_ticket_qty">
	        	<?php 
                    $event_buy_ticket_attr= array(
                      'name'        => 'selected_ticket_id',
                      'id'          => 'selected_ticket_id',
                      'type' 		=> 'hidden',
                      'class'       => 'form-control',
                    );

                ?>
                <?php echo form_input($event_buy_ticket_attr);?>
	        	<div class="col-xs-12">
		        	<?php for($i = 1; $i <= TICKETS_PER_USER; $i++): ?>
						<button type="button" value="<?php echo $i; ?>" class="btn btn-success btn-circle btn-lg book"><?php echo $i; ?></button>
					<?php endfor; ?>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	      </div>
	    </div>
	  </div>
	</div>
    <!--/Modal-->

    <script>
    $('.book-event-ticket').click(function() {
    	$('#selected_ticket_id').val($(this).val());
    });
    $('.book').click(function() {

    	ticket_id = '';
    	ticket_id = $('#selected_ticket_id').val();

    	no_of_tickets = '';
    	no_of_tickets += $(this).val();

    	$('#event_buy_ticket_qty').hide();
    	$('#event_buy_ticket_loader').show();
    	var book_data = '';
    	book_data += '&ticket_id='+ticket_id+'&no_of_tickets='+no_of_tickets;

    	var book_url = '';
    	book_url += base_url+'events/api_book_tickets';

    	$.ajax({
    		data : book_data,
    		url  : book_url,
    		type : 'get',

    		error	: function(resp) {
    			$('#event_buy_ticket_loader').hide();
    			alert('Oops ! Something went wrong');
    		},

    		success : function(resp) {
    			window.location = base_url+'events/checkout_booking'
    			//$('#event_buy_ticket_loader').hide();
    			//$('#event_buy_ticket_qty').fadeIn();
    		}
    	});
    })
    </script>
	<div class="col-md-12">
		
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<form class="rating-form" action="#" method="post" name="rating-movie">
			  <fieldset class="form-group">
			    <div class="form-item">
			      
			      <input id="rating-5" name="rating" class="event-rating" type="radio" value="5" />
			      <label for="rating-5" data-value="5">
			        <span class="rating-star">
			          <i class="fa fa-star-o"></i>
			          <i class="fa fa-star"></i>
			        </span>
			        <span class="ir">5</span>
			      </label>
			      <input id="rating-4" name="rating" class="event-rating" type="radio" value="4" />
			      <label for="rating-4" data-value="4">
			        <span class="rating-star">
			          <i class="fa fa-star-o"></i>
			          <i class="fa fa-star"></i>
			        </span>
			        <span class="ir">4</span>
			      </label>
			      <input id="rating-3" name="rating" class="event-rating" type="radio" value="3" />
			      <label for="rating-3" data-value="3">
			        <span class="rating-star">
			          <i class="fa fa-star-o"></i>
			          <i class="fa fa-star"></i>
			        </span>
			        <span class="ir">3</span>
			      </label>
			      <input id="rating-2" name="rating" class="event-rating" type="radio" value="2" />
			      <label for="rating-2" data-value="2">
			        <span class="rating-star">
			          <i class="fa fa-star-o"></i>
			          <i class="fa fa-star"></i>
			        </span>
			        <span class="ir">2</span>
			      </label>
			      <input id="rating-1" name="rating" class="event-rating" type="radio" value="1" />
			      <label for="rating-1" data-value="1">
			        <span class="rating-star">
			          <i class="fa fa-star-o"></i>
			          <i class="fa fa-star"></i>
			        </span>
			        <span class="ir">1</span>
			      </label>
			      
			    </div>
			    
			  </fieldset>
			</form>
			     
			    
		</fieldset>
	</div>


	<div class="col-md-12">
		<?php if ($this->ion_auth->logged_in()) { ?>
			<?php echo anchor('events/write_review/'.$event_details[0]->slug, 'Write Review', 'class="btn btn-primary"'); ?>
		<?php } ?>
	</div>

	<div class="col-md-12">
		<?php echo $map['js']; ?>
		<?php echo $map['html']; ?>
	</div>



	</div>

	<script>
	$('.event-rating').click(function() {
		
		rate_value = $(this).val();
		//prepare the data 
		rating_data = '';
		rating_data = '&rate_value='+rate_value+'&event_id=<?php echo $event_details[0]->id; ?>';

		rating_url = '';
		rating_url += base_url+'events/api_rate_events';

		$.ajax({
			url 	: rating_url,
			data 	: rating_data,
			type	: 'get',

			error	: function(resp) {
				alert('Oops ! Something went wrong !');
			},

			success	: function(resp) {
				if(resp == true) {
					alert('Voted successfully !');
				}else{
					alert('You have voted already !');
				}
				
			}
		});

	});
	</script>

	<div class="col-md-12">
		<a href="#" id="about_event">About the event</a>
		<a href="#" id="tnc_event">Terms and Conditions</a>

		<div id="about">
			<h4>About the event</h4>
			<?php echo $event_details[0]->about; ?>
		</div>

		<div id="tnc" style="display:none">
		<h4>Terms and Conditions</h4>
			<?php echo $event_details[0]->tnc; ?>
		</div>
	</div>

</div>

<script>
 

$('#about_event').click(function(e) {
	e.preventDefault();
	$('#tnc').fadeOut();
	$('#about').fadeIn();
});

$('#tnc_event').click(function(e) {
	e.preventDefault();
	$('#tnc').fadeIn();
	$('#about').fadeOut();
});
</script