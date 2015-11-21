<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>slick/slick-theme.css"/>
<?php //dump($events_home_data); ?>
<style>
.carousel-inner h2 a{
	color:#FFF;
}
#json-overlay {
    background-color: #111;
    opacity: 0.91;
    height: 40%;
}
.style{
	height:0px !important;
}
.carousel .item {
  width:100%;
}
.carousel, .carousel-inner ,.item {
	height: 100%;
}
.customHeightStyle{
	height: auto !important;
}
</style>
<!-- Home start -->
<link href="<?php echo asset_url(); ?>css/events-style.css" rel="stylesheet">	

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
						<ul class="event-nav">
							<li class="">
								<a href="#" class="" data-toggle="">All Categories</a>
							</li>
							<?php foreach($event_categories as $k => $category): ?>
							<li><a href="#" class="event-cat" id="cate_<?= $category->id ?>" data-toggle=""><?= $category->name; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<?php foreach($events_home_data as $k => $event): ?>
					<?php if($event->sponsored): ?>
					<div class="event-wrap events-ind clearfix">
						<div class="col-md-3"><img src="<?php echo uploads_url().'events/thumbs/'.$event->thumb; ?>"></div>
						<div class="col-md-9">
							<div class="row clearfix">
								<div class="col-md-9">
									<h2><?php echo anchor($event->eventSlug, $event->eventName); ?></h2>
								</div>
								<!--
								<div class="col-md-3">
									<input type="button" value="SPONSORED" class="btn btn-fest-native"/>
								</div>
								-->
							</div>

							<h4><?php echo $event->venue; ?>, <?php echo $event->cityname; ?></h4>
							<h4>12 June, 2015 2.00 PM Onwards</h4>
							
							<?php echo anchor($event->eventSlug, 'BUY TICKETS', array('class'=>"btn btn-fest-native")); ?></h2>
							<p>
								<?php echo word_limiter($event->about, 60, ''); ?>
							</p>
						</div>
					</div>
				<?php endif; ?>

				<?php endforeach; ?>
					<style>
						.nopadding {
						   padding: 0 !important;
						   	margin: 0 !important;
						}
						.lesspadding {
						   padding: 0 !important;
						   	margin: 0 !important;
						   	
						}
						.lesspadding img{
							padding-left:4%;
						}
						.last-image{
							float: right;
							text-align: right;
							padding: 0 !important;
						   	margin: 0 !important;
						}
						.last-image img {
							padding-left:6%;
						}
						
					</style>
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

					<div class="event-wrap events-ind clearfix">
					<?php foreach($events_home_data as $k => $event): ?>
					<?php if(!$event->sponsored): ?>
					
						<div class="col-md-4">
							<img src="<?php echo uploads_url().'events/thumbs/'.$event->thumb; ?>">
							<div style="text-align:center">
								<h4><?php echo anchor($event->eventSlug, $event->eventName); ?></h4>
								<h6><?php echo $event->venue; ?>, <?php echo $event->cityname; ?></h6>
								<h6><?php echo date('M d', strtotime($event->event_start_date)); ?>, <?php echo date('h:i A', strtotime($event->event_start_time)); ?> onwards.</h6>
							</div>
						</div>
					
					<?php endif; ?>
					<?php endforeach; ?>
					</div>

				</div>

				<div class="col-sm-3 event-sidebar">
					Local events in
					<div class="sidebar-event-heading" id="event_city"><?php echo strtoupper($city_name); ?></div>
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
						<li><a href="#">Trending</a></li>
					</div>

					<div class="event-sidebar-show">
						<div class="event-sidebar-wrapper">
						<div class="col-md-3">
							<h4>2</h4>June
						</div>

						<div class="col-md-9">
							<img src="http://placehold.it/190x220">
							<h3>The Sunderbands</h3>
							<p>Sapphire Avenue, Gurgaon</p>
						</div>
						</div>
					</div>

					<div class="event-sidebar-show">
						<div class="event-sidebar-wrapper">
						<div class="col-md-3">
							<h4>4</h4>June
						</div>

						<div class="col-md-9">
							<img src="http://placehold.it/190x220">
							<h3>Ne Obliviscaris</h3>
							<p>IIT Guwahati</p>
						</div>
						</div>
					</div>

					<div class="event-sidebar-show">
						<div class="event-sidebar-wrapper">
							<div class="col-md-3">
								<h4>5</h4>June
							</div>

							<div class="col-md-9">
								<img src="http://placehold.it/190x220">
								<h3>Sunburn</h3>
								<p>IIT Guwahati</p>
							</div>
						</div>
					</div>
						
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