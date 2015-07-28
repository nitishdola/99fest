<style>
    #json-overlay {
        background-color: #111;
        opacity: 0.91;
        height: 40%;
    }
</style>
<div id="json-overlay" style="display:none"></div>
<div class="page-content" style="margin-top:6%;">
    <!-- ./page content wrapper -->
    
    <!-- page content wrapper -->
    <div class="page-content-wrap" style="padding:0 30px;">                    
        
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">City</label>
                    <div class="col-md-6 col-xs-12">                                            
                        <?php $cities[0] = 'Select city' ?>
                        <?php //echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>                               
                        <?php echo form_dropdown('city_id', $cities, $city_id,'class="form-control" id="city_id"'); ?>
                    
                        <span class="help-block"></span>                                        
                    </div>
                </div>
            </div>
        </div>

        <script>
        $('#city_id').change(function() {

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
                        window.location.href = "<?php echo base_url(); ?>vendors";
                    }
                });
            }
        });
        </script>
        <!-- page content holder -->
        <div class="page-content-holder">
            
            <div class="row">
                <div class="col-md-12 this-animate" data-animate="fadeInLeft">
                    <h1>Venues</h1>
                </div>
            </div>
            <?php if(!empty($venue_vendors)){ ?>
            <div class="row" style="margin-top:10px;">
                <?php foreach( $venue_vendors as $k => $venue) { ?>

                

                    <div class="col-md-4">
                        <div class="col-md-6">
                            <img src="<?= uploads_url(); ?>vendors/logos/<?= $venue->logo; ?>" class="img-responsive" height="280" width="280">
                        </div>
                        <div class="col-md-6">
                            <strong><?= anchor('venue/'.$venue->venue_slug, $venue->venue_name); ?></strong>
                            <p><?= ucfirst($venue->address); ?>, <?= ucfirst($venue->cityname); ?>, <?= ucfirst($venue->statename); ?></p>
                        </div>
                    </div>

                

                <?php } ?>
            </div>
            <?php }else{ ?>
                 <div class="alert alert-warning fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Oops !</strong> No venues were found.
                </div>
            <?php } ?>


            <div class="row">
                <div class="col-md-12 this-animate" data-animate="fadeInLeft">
                    <h1>Catering Services</h1>
                </div>
            </div>
            <?php if(!empty($catering_vendors)){ ?>
            <div class="row" style="margin-top:10px;">
                <?php foreach( $catering_vendors as $k => $catering) { ?>
                <div class="col-md-4">
                    <div class="col-md-6">
                        <img src="<?= uploads_url(); ?>vendors/logos/<?= $catering->logo; ?>" class="img-responsive" height="280" width="280">
                    </div>
                    <div class="col-md-6">
                        <strong><?= anchor('catering/'.$catering->catering_slug, $catering->catering_name); ?></strong>
                        <p><?= ucfirst($catering->area_cover); ?>, <?= ucfirst($catering->cityname); ?>, <?= ucfirst($venue->statename); ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php }else{ ?>
                 <div class="alert alert-warning fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Oops !</strong> No catering services were found.
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-md-12 this-animate" data-animate="fadeInLeft">
                    <h1>Photographers</h1>
                </div>
            </div>
            <?php if(!empty($photo_vendors)){ ?>
            <div class="row" style="margin-top:10px;">
                <?php foreach( $photo_vendors as $k => $photographer) { ?>
                <div class="col-md-4">
                    <div class="col-md-6">
                        <img src="<?= uploads_url(); ?>vendors/logos/<?= $photographer->logo; ?>" class="img-responsive" height="280" width="280">
                    </div>
                    <div class="col-md-6">
                        <strong><?= anchor('photographer/'.$photographer->studio_slug, $photographer->name); ?></strong>
                        <p><?= ucfirst($photographer->area_cover); ?>, <?= ucfirst($photographer->cityname); ?>, <?= ucfirst($photographer->statename); ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php }else{ ?>
                 <div class="alert alert-warning fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Oops !</strong> No photographers were found.
                </div>
            <?php } ?>

            
            
        </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->
    
</div>
