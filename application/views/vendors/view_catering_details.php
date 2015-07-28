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
    	min-height: 100px;
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
		<h2 class="vendor-title"><?= ucfirst($details->catering_name); ?></h2>
		
			<img
                src="<?= uploads_url(); ?>vendors/images/<?= $details->featured_img; ?>"
                width=100%
                class = "img-responsive"
                data-captioner-start-closed = "false"
                role="caption"
                data-captioner-type="animated"
                title="<?= ucfirst($details->name); ?>"
                alt="
					<?= $details->cityname; ?>
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
					<h3 class="font-alt">CATERER DESCRIPTION</h3>
					<p><?= strtoupper($details->cateror_description); ?>
					</p>
				</div>

				<div class="col-md-12">
					<h3 class="font-alt">OUR SERVICES</h3>
						<div class="col-md-6 vendor-block">
							<h3 class="vendor-block-title">Catering For</h3>
							<div class="col-md-12">
								<strong><?= $details->catering_for; ?></strong>
							</div>
							<!--<div class="col-md-6">
								outdoor arena
								14,500 sqft
								200-500 people
							</div>-->
						</div>
						<div class="col-md-6 vendor-block">
							<h3 class="vendor-block-title">Our Reach </h3>
							<div class="col-md-12">
								
								<br><strong><?= $details->area_cover; ?></strong>
								
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
							
					<div class="col-md-9">
					<h3 class="vendor-block-title">Food Type</h3>
						<div class="col-md-12">
							<?php if($details->food_types == 'Both'){ ?>
							<strong>Veg and Non-veg</strong>
							<?php }else if($details->food_types == 'Veg'){ ?>
							<strong>Veg Only</strong>
							<?php }else if($details->food_types == 'Non Veg'){ ?>
							<strong>Non-veg</strong>
							<?php } ?>

						</div>
						<!--<div class="col-md-4">
							Marriage reception Rs 350/person
						</div>
						<div class="col-md-4">
							Marriage reception Rs 350/person
						</div>-->
					</div>
				</div>

				<div class="col-md-12">
							
					<div class="col-md-12 vendor-block">
					<h3 class="vendor-block-title">Additional Information</h3>
						<div class="col-md-6" style="text-align:center">
							Provide Transportation : <strong><?= $details->provide_transportation; ?></strong>
							Provide Waiter : <strong><?= $details->provide_transportation; ?></strong>
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
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<h3 class="font-alt">OUR MENU</h3>
				<table class="table"  style="text-align:center">
					<thead>
						<tr>
							<th style="text-align:center">ITEM</th>
							<th style="text-align:center">COST PER PLATE</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach($cateror_menu_details as $menu) { ?>
						<tr>
							<td><?= $menu->item_name; ?></td>
							<td><?= $menu->cost_per_plate; ?></td>
						</tr>
						<?php } ?>
					</tbody>

				</table>
		</div>
		<div class="col-md-3"></div>
	</div>

</section>
