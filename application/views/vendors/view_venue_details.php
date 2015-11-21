<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<style>
    h2.vendor-title{
    	font-size: 22px;
    	color:#050054;
    	text-align: center;
    	font-family: 'Oswald', sans-serif;
    }
    .vendor-first-module{
    	
    }
    h3.font-alt {
    	font-size: 15px;
    	color:#555;
    	font-weight: bold;
    }
    h3.vendor-block-title{
    	color:#66C5FF !important;
    	font-weight: bold;
    	font-size: 14px;
    }
    .vendor-block{
    	border: 1px solid #E5E5E5;
    	min-height: 150px;
    	margin-top:1%;
    }
    .vendor-sidebar{
    	text-align: center;
    	color: #F0904E;
    }
    .vendor-sidebar h4{
    	color:#454545;
    	font-size: 13px;
    	font-weight: bold;
    }
    .vendor-sidebar-offer-page{
    	padding:10px 0;
    	background: #e5e5e5;
    	margin-bottom: 10px;
    }	
</style>
<!-- Home start -->
<section id="home" class="home-parallax" style="margin-top:4%;">

	<div class="row">
	<div class="col-md-12">
		<h2 class="vendor-title"><?= ucfirst($details->venue_name); ?></h2>
		
			
			<img
                src="<?= uploads_url(); ?>vendors/images/<?= $details->featured_img; ?>"
                width=100%
                class = "img-responsive"
                data-captioner-start-closed = "false"
                role="caption"
                data-captioner-type="animated"
                title="<?= ucfirst($details->name); ?>"
                alt="Venue Location <strong><?= $details->venueaddress; ?>
					, <?= $details->cityname; ?>
					, <?= $details->statename; ?></strong>
                "
            >
        </div>

		</div>
	</div>

</section >
<!-- Home end -->
<section class="first-module vendor-first-module vendor-first-module">
		<div class="row">
			<div class="col-sm-9">

				<div class="col-md-12">
					<h3 class="font-alt">VENUE DESCRIPTION</h3>
					<p><?= strtoupper($details->venue_description); ?>
					</p>
				</div>

				<div class="col-md-12">
					<h3 class="font-alt">OUR SERVICES</h3>
						<div class="col-md-6 vendor-block">
							<h3 class="vendor-block-title">Hall Capacity</h3>
							<div class="col-md-12">
								<?= $details->capacity; ?>
							</div>
							<!--<div class="col-md-6">
								outdoor arena
								14,500 sqft
								200-500 people
							</div>-->
						</div>
						<div class="col-md-6 vendor-block">
							<h3 class="vendor-block-title">VENUE LOCATION </h3>
							<div class="col-md-12">
								<?= $details->venueaddress; ?>
								<br><?= $details->cityname; ?>
								<br><?= $details->statename; ?>
							</div>
							<!--<div class="col-md-6">
								Theme based
								decoration offered
								starting from
								Rs. 12000/-
							</div>-->
						</div>
						
				</div>

				<div class="col-md-12">
							
					<div class="col-md-9 vendor-block">
					<h3 class="vendor-block-title">Venue Type</h3>
						<div class="col-md-12">
							<strong><?= strtoupper($details->venue_type_name); ?></strong>
							<p>(Also suited for <strong><?= $details->venue_suited_for; ?></strong>)</p>
							<?php if($details->per_day != ''): ?>
								<div class="col-md-3">
									Per Day : <strong><?= number_format($details->per_day,2,".",","); ?></strong>
								</div>
							<?php endif; ?>

							<?php if($details->per_plate != ''): ?>
								<div class="col-md-3">
									Per Plate : <strong><?= number_format($details->per_plate,2,".",","); ?></strong>
								</div>
							<?php endif; ?>

							<?php if($details->per_hour != ''): ?>
								<div class="col-md-3">
									Per Hour : <strong><?= number_format($details->per_hour,2,".",","); ?></strong>
								</div>
							<?php endif; ?>

							<?php if($details->hall_rent != ''): ?>
								<div class="col-md-3">
									Rent : <strong><?= number_format($details->hall_rent,2,".",","); ?></strong>
								</div>
							<?php endif; ?>

						</div>
						<!--<div class="col-md-4">
							Marriage reception Rs 350/person
						</div>
						<div class="col-md-4">
							Marriage reception Rs 350/person
						</div>-->
					</div>

					<div class="col-md-3 vendor-block">
						<h3 class="vendor-block-title">Food catering</h3>
						<?php if(!empty($venue_catering_details)) { ?>
						<?php foreach($venue_catering_details as $k => $catering) { ?>
							<?= $catering->item_name; ?>, <?= number_format($catering->price,2,".",","); ?><br>
						<?php } ?>
						<?php }else{ ?>
							<p>No Catering detail found.</p>
						<?php } ?>
					</div>
				</div>

				<div class="col-md-12">
							
					<div class="col-md-10 vendor-block">
					<h3 class="vendor-block-title" style="text-align:center">Additional Information</h3>
						<div class="col-md-6">
							<p>A/C : <strong><?php if($details->ac){ echo "YES"; } else{ echo "NO"; }?></strong></p>
							<p>WiFi : <strong><?php if($details->wifi){ echo "YES"; } else{ echo "NO"; }?></strong></p>
							<p>Alcohol : <strong><?php if($details->alcohol){ echo "YES"; } else{ echo "NO"; }?></strong></p>
							<p>Catering : <strong><?= $details->catering; ?></strong></p>
							<p>Outside Categring : <strong><?php if($details->outside_catering){ echo "YES"; } else{ echo "NO"; }?></strong></p>
							
							
						</div>

						<div class="col-md-6">
							<p>Decoration Service : <strong><?php if($details->decoration_service){ echo "YES"; } else{ echo "NO"; }?></strong></p>
							<?php if($details->decoration_service) { ?>
							<p>Decoration Service Cost : <strong><?= $details->cost; ?></strong></p>
							<?php } ?>
							<p>Hall Dimension : <strong><?= $details->hall_dimensions; ?></strong> sq ft 	</p> 

							<p>Distance from Airport : <strong><?= $details->distance_airport; ?></strong></p> Km
							<p>Distance from Bus Stand : <strong><?= $details->distance_bus_stand; ?></strong></p> Km
							
							
						</div>
						
					</div>

					<div class="col-md-2 vendor-block">
						<h3 class="vendor-block-title">Parking</h3>
						<?= $details->parking; ?><br>
						<?= $details->parking_capacity; ?> cars
					</div>
				</div>

		</div>

		<div class="col-sm-3 vendor-sidebar">
			<div class="vendor-sidebar-offer-page">
				<h3 class="vendor-block-title">Our Special offers</h3>
				<?php if(!empty($offers)) { ?>
					<?php foreach($offers as $k => $offer) { ?>
					<p>
					<h4><?= $offer->title; ?></h4>
						<?= $offer->description; ?>
					</p>
					<?php } ?>
					
				<?php } ?>
				
			</div>

			<p>
			<button class="btn btn-success btn-lg">Contact Us <br><?= $details->contact_number; ?></button>
			</p>
			<!--
			<p>
			<button class="btn btn-warning btn-lg">REQUEST BID</button>
			</p>
			-->
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<!--GALLERY-->
		</div>
	</div>

</section>
