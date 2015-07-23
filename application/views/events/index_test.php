<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>slick/slick-theme.css"/>
<!-- Home start -->
<link href="<?php echo asset_url(); ?>css/events-style.css" rel="stylesheet">	
<style>
h3 a{
	color:#EF8B45;
}
</style>
<div>
	<div id="json-overlay" style="display:none"></div>
<section id="home" class="customHeightStyle home-section home-parallax home-fade bg-dark-30" data-background="">
	<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
	<ol class="carousel-indicators">
	  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	  <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<div class="carousel-inner">
	  
	<?php foreach($events_home_data as $k => $event): ?>
	  <div class="item <?php if($k == 0){ ?> active <?php } ?>"> <img src="<?php echo uploads_url().'events/posters/'.$event->poster; ?>" style="width:100%" data-src="" alt="<?php echo $event->eventName; ?>" class="img-responsive"> 
	    <div class="container">
	    	<div class="carousel-caption">
		    	<div class="col-md-12">
		    		<div class="col-md-4">
		    			<img src="<?php echo uploads_url().'events/thumbs/'.$event->thumb; ?>" class="featured-img img-responsive">
		    		</div>

		    		<div class="col-md-8">
		    			<h2><?php echo anchor('/'.$event->eventSlug, $event->eventName); ?></h2>
		    			<p><?php echo date('M d', strtotime($event->event_start_date)); ?>, <?php echo date('h:i A', strtotime($event->event_start_time)); ?> onwards.</p>
						<div class="col-md-8"><?php echo $event->venue; ?>, <?php echo $event->cityname; ?></div>
						<!--<div class="col-md-4"><div class="col-md-4"><input type="button" value="SPONSORED" class="btn btn-fest-native"/></div></div>-->
		    		</div>
		    	</div>
		    </div>
	    </div>
	  </div>
	<?php endforeach; ?>
	

	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left"></span>
	</a>

	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right"></span>
	</a>

    </div>
</section >
<!-- Home end -->

<!-- Wrapper start -->
<div class="main">
	<!-- Event list start -->
	<section class="first-module">
		<div class="container">

			<div class="row">

				<div class="col-sm-9">
					<div class="collapse navbar-collapse" id="event-collapse">
						<ul class="event-nav" id="event-nav">
							<li class="">
								<a href="#" class="select_cat" id="cat_0" data-toggle="">All Categories</a>
							</li>
							<?php foreach($event_categories as $k => $category): ?>
							<li><a href="#" class="select_cat" id="cat_<?= $category->id; ?>" data-toggle="" ><?= $category->name; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div id="all-events">

						<div id="sponsored_events">

						</div>
						
						
						<h4>TRENDING EVENTS</h4> 
						<div class="slider autoplay">

							<?php foreach($events_home_data as $k => $event): ?>
								<?php $current_image = $k+1; ?>
							<div class="col-md-3
								<?php if ($current_image == 1) { ?> 
									nopadding 
								<?php }else if ( $current_image%3 == 0) { ?> 
									last-image
								<?php }else{ ?> 
									lesspadding 
								<?php } ?>" 
							>
								<img src="<?php echo uploads_url().'events/thumbs/'.$event->thumb; ?>" class="img-responsive" >
								<div class="events-desc 
								<?php if ($current_image == 1) { ?> 
								e2
								<?php }else if ( $current_image%3 == 0) { ?> 
								e3
								<?php }else{ ?> 
								e1
								<?php } ?>" 
								>
									<h2><?php echo anchor('/'.$event->eventSlug, $event->eventName); ?></h2>
									<p><?php echo $event->venue; ?>, <?php echo $event->cityname; ?></p>
									
								</div>
							</div>
							<?php endforeach; ?>

						</div>
						
						<div id="non_sponsored1">
							<div class="event-wrap events-ind clearfix" id="non_sponsored"></div>
						</div>

					</div>
					<div id="load_more_item_container"  style="text-align:center">
						<a href="#" class="btn btn-primary btn-small" id="load_more_events">Load More Events</a>
					</div>

					<div class="alert alert-danger alert-dismissable" id="noresult" style="display:none;">
					   <button type="button" class="close" data-dismiss="alert" 
					      aria-hidden="true">
					      &times;
					   </button>
					   No more results !
					</div>

					

				</div>
				

				<div class="col-sm-3 event-sidebar">
					<?php if(isset($city_name) && $city_name != ''): ?>
					Local events in
					<div class="sidebar-event-heading" id="event_city"><?php echo strtoupper($city_name); ?></div>
					<?php endif; ?>
					<a href="#" class="light-anchor" id="chnge_location">Change Location</a>
					<div class="form-group" id="locations" style="display:none">
					  	<div class="col-md-12">
					  		<?php $cities[-1] = 'Select City'; ?>
					  		<?php echo form_dropdown('city_id', $cities, -1, 'class="form-control" id="cities"') ?>
					  	</div>
					</div>
				
					<script>
						$('#chnge_location').click(function(e) {
							e.preventDefault();
							$(this).hide();
							$('#event_city').hide()
							$('#locations').fadeIn();
						});

						$('#cities').change(function() {
							if($(this).val() > 0) {
								$('#json-overlay').show();
								var data = '';
								data += '&city_id='+$(this).val();
								url_to_call = '';
								url_to_call += '<?php echo base_url(); ?>events/api_set_default_city';

								$.ajax({
									data : data,
									url  : url_to_call,
									type : 'get',

									error : function(resp) {
										$('#json-overlay').hide();
										alert('Something went wrong');
									},
									success : function(resp) {
										$('#json-overlay').hide();
										window.location.href = "<?php echo base_url(); ?>events";
									}
								});
							}
						});
					</script>
					<style>
					.event-sidebar-menu {
						padding:20px 0;
					}
					.event-sidebar-menu li {
						list-style: none;
						display: inline;
					}
					.event-sidebar-menu a{
						color:#777;
					}
					a.active{
						color:#444;
					}
					.event-sidebar-show h3{
						font-size: 1.2em;
						color: #EF8B45;
						font-weight: bold;
					}
					.event-sidebar-show p {
						font-size: 0.84em;
						color:#555;
					}
					</style>
					<div class="event-sidebar-menu">
						
						<li><a href="#" class="active">Upcoming</a></li>
						<!--<li><a href="#">Trending</a></li>-->
					</div>
					<?php if(!empty($upcoming_events)){ ?>
						<?php foreach( $upcoming_events as $k => $u_event) { ?>
						<div class="event-sidebar-show">
							<div class="event-sidebar-wrapper">
							<div class="col-md-3">
								<h4><?= date('d', strtotime($u_event->event_start_date)); ?></h4><?= date('M', strtotime($u_event->event_start_date)); ?>
							</div>

							<div class="col-md-9">
								<img src="<?= uploads_url() ?>events/thumbs/<?= $u_event->thumb; ?>" class="img-responsive">
								<h3><?= anchor($u_event->eventSlug,$u_event->eventName); ?></h3>
								<p><?= $u_event->venue. ', '.$u_event->cityname ?></p>
							</div>
							</div>
						</div>

						<?php } ?>
					

					<?php }else{ ?>
						<h4>No Upcoming events</h4>
					<?php } ?>

					
						
				</div>

			</div><!-- .row -->

		</div><!-- .container -->

	</section>
	<!-- About end -->

	<!-- Divider -->
	<hr class="divider-w">
	<!-- Divider -->

</div>
</div>
<script src="<?php echo asset_url(); ?>slick/slick.js"></script>
<script src="<?php echo asset_url(); ?>js/events.js"></script>

<script>
var offset = 0; 

var selected_category = '';
var category;
var upload_url = '';
var base_url   = '';
var search_type;
upload_url 	+= '<?= uploads_url(); ?>';
base_url 	+= '<?= base_url(); ?>';
$(document).ready( function() {
	get_events({
		category : 'all',
		offset   : offset
	});
});

function get_events(params) {
	$('#spinner').show();
	$('#noresult').hide();
	$('#all-events').hide();
	$('#load_more_events').hide();

	//e.preventDefault();

	//page_num = params.page_number || page_num;
    //page_size = params.page_size || page_size;
    //sort_by = params.sortby || sort_by;
    //var check_scroll_search = params.scroll_search || false;
    //var cancel_prev_request = params.cancel_prev_request || false;

    category = params.category || 'all';
    offset 	 = params.offset || 0;
    search_type = params.search_type || '';

	var url_to_call = '';
	var data = '';

	url_to_call += "<?= base_url(); ?>events/api_get_events";
	data += '&category_id='+category;

	if(offset != '') {
		data += '&offset='+offset;
	}

	$.ajax({
		data : data,
		url  : url_to_call,
		type : "get",
		dataType : "json",

		error : function(resp) {
			$('#spinner').hide();
			$('#all-events').show();
		},
		success : function(resp) {
			$('#spinner').hide();
			$('#all-events').show();
			render_ui(resp,search_type);
		}
	});
}

function render_ui(resp,search_type) {

	//render sponsored events
	if(search_type == '') {
		render_sponsored_ui(resp.sponsored);
	}
	if(resp.non_sponsored.last_reached == true) {
		
		$('#load_more_item_container').hide();
		$('#noresult').show();
	}else{
		$('#load_more_events').show();
	}
	
	render_non_sponsored_ui(resp.non_sponsored); 
}

function render_sponsored_ui(spon_resp) {
		var s_html = '';
	
	jQuery.each(spon_resp, function(index, s_event) {

		s_html += '<div class="event-wrap events-ind clearfix">';
		s_html += '<div class="col-md-3"><img src="'+upload_url+'events/thumbs/'+s_event.thumb+'"></div>';
		s_html += '<div class="col-md-9">';
		s_html += '<div class="row clearfix">';
		s_html += '<div class="col-md-9">';
		s_html += '<h2><a href="'+base_url+s_event.slug+'">'+s_event.name+'</a></h2>';
		s_html += '</div>';
		s_html += '</div>'; //clearfix*/

		s_html += '<h4>'+s_event.venue+','+s_event.cityname+'</h4>';
		s_html += '<h4>'+s_event.event_start_date+' '+s_event.event_start_time+' Onwards</h4>';
		s_html += '<h2><a href="'+base_url+s_event.slug+'" class="btn btn-fest-native">BUY TICKETS</a></h2>';
		s_html += '<p>';
		//s_html += s_event.about.substr(0, 60);
		s_html += '</p>';
		s_html += '</div>';
		s_html += '</div>';

		$('#sponsored_events').html(s_html);
	});
}


function render_non_sponsored_ui(non_spon_resp) {
	var ns_html = '';
	//alert(non_spon_resp[0].ns_event.slug);
	//ns_html += '<div class="event-wrap events-ind clearfix">';
	jQuery.each(non_spon_resp, function(index, ns_event) {
		if(index != 'last_reached'){
			ns_html += '<div class="col-md-4" style="height:400px;">';
			ns_html += '<a href="'+base_url+ns_event.slug+'">'+'<img src="'+upload_url+'events/thumbs/'+ns_event.thumb+'"></a>';
			ns_html += '<div style="text-align:center">';
			ns_html += '<h4><a href="'+base_url+ns_event.slug+'">'+ns_event.name+'</a></h4>';
			ns_html += '<h6>'+ns_event.venue+','+ns_event.cityname+'</h6>';
			ns_html += '<h6>'+ns_event.event_start_date+' '+ns_event.event_start_time+' Onwards</h6>';
			ns_html += '</div>';
			ns_html += '</div>';
		}
		
	});
	//ns_html += '</div>';
	
	$('#non_sponsored').append(ns_html);
	
}


$('#load_more_events').click(function(e) {
	e.preventDefault();

	

	offset = offset + 6;
	search_type = 'ns';

	category = 'all';
	if(selected_category != '') {
		category = selected_category;
	}

	get_events({
		category : category,
		offset   : offset,
		search_type : search_type
	});
	
});

$('.select_cat').click(function(e) {

	e.preventDefault();

	$("#event-nav>li a").removeClass("cat_selected");
	$(this).addClass('.cat_selected');
	category_id = this.id;
	var string = category_id;
    var arr = string.split('_');

    offset = 0;
   	
   	category_id = arr[1];
   	selected_category = category_id;

   	$('#non_sponsored').empty();
   	search_type = 'ns';

   	get_events({
		category : selected_category,
		offset   : offset,
		search_type : search_type
	});
});	

</script>