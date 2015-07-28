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
<?php //dump($details); ?>
	<div class="row">
	<div class="col-md-12">
		<h2 class="vendor-title"><?= ucfirst($details->name); ?></h2>
		
			
			<img
                src="<?= uploads_url(); ?>vendors/images/<?= $details->featured_img; ?>"
                width=100%
                class = "img-responsive"
                data-captioner-start-closed = "false"
                role="caption"
                data-captioner-type="animated"
                title="<?= ucfirst($details->name); ?>"
                alt="Venue Location <strong><?= $details->address; ?>
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
					<p><?= strtoupper($details->studio_description); ?>
					</p>
				</div>

				<div class="col-md-12">
					<h3 class="font-alt">OUR SERVICES</h3>
						<div class="col-md-6 vendor-block">
							
							<div class="col-md-6">
							<h3 class="vendor-block-title">Delivery</h3>
								Complete product delivery in <?= $details->time_taken; ?>
							</div>
							<div class="col-md-6">
							<h3 class="vendor-block-title">Services</h3>
								<?php 
									$types_of_functions = explode(',', $details->types_of_function);
								?>
								<?php foreach($types_of_functions as $k => $v ) { ?>
									-<?= ucfirst($v); ?><br>
								<?php } ?>
								
							</div>
						</div>
						<div class="col-md-6 vendor-block">
							<h3 class="vendor-block-title">Our Equipments </h3>
							<div class="col-md-12">
								<?php if(!empty($equipments)) { ?>
								<?php foreach($equipments as $k => $equipment) { ?>
									<p><?= $equipment->equipment_name; ?></p>
								<?php } ?>
								<?php }else{ ?>
									<h4>NO EQUIPMENTS FOUND.</h4>
								<?php } ?>
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
							
					<div class="col-md-12 vendor-block">
					<h3 class="vendor-block-title">Pricing Style</h3>
						<div class="col-md-4">
							<p>For small events & confrences (50-150 photographs + 2-4 DVD’s)</p>
							<?php if($details->cost_picture_small == 0 && $details->cost_video_small == 0){ ?>
							<p>Charged at Rs. <?= $details->cost_picture_small; ?> per photograph and Rs. <?= $details->cost_video_small; ?>  per DVD (with editing)</p>
							<?php }else{ ?>
							<p>Charged at Rs. <?= $details->cost_picture_large; ?> per photograph and Rs. <?= $details->cost_video_large; ?>  per DVD (with editing)</p>
							<?php } ?>
						</div>
						<div class="col-md-4">
							<p>For medium size events (Marriages, reception, Celebrations)</p>
							<?php if($details->cost_picture_medium == 0 && $details->cost_video_medium == 0){ ?>
							<p>Charged at Rs. <?= $details->cost_picture_medium; ?> per photograph and Rs. <?= $details->cost_video_medium; ?>  per DVD (with editing)</p>
							<?php }else{ ?>
							<p>Charged at Rs. <?= $details->cost_picture_large; ?> per photograph and Rs. <?= $details->cost_video_large; ?>  per DVD (with editing)</p>
							<?php } ?>
						</div>
						<div class="col-md-4">
							<p>For large events (Carnivals or fests)</p>
							<?php if($details->cost_picture_large == 0 && $details->cost_video_large == 0){ ?>
								<strong>Charged on Contract basis</strong>
							<?php }else{ ?>
							<p>Charged at Rs. <?= $details->cost_picture_large; ?> per photograph and Rs. <?= $details->cost_video_large; ?>  per DVD (with editing)</p>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="col-md-12">
							
					<div class="col-md-12 vendor-block" style="text-align:center">
					<h3 class="vendor-block-title" style="text-align:center">Area Covers</h3>
						<div class="col-md-6">
							<strong><?= $details->area_cover; ?></strong>
						</div>
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
			<p>
			<button class="btn btn-warning btn-lg">REQUEST BID</button>
			</p>
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<!--GALLERY-->
		</div>
	</div>

</section>
