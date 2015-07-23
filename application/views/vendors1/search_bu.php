<style>
.btn-facebook{
    background: #3B5998;
    color:#FFF;
}
.btn-facebook:hover{
    background: #3B5998;
    color:#FFF;
}
.btn-google{
    background: #DD4B39;
    color:#FFF;
}
.btn-google:hover{
    background: #DD4B39;
    color:#FFF;
}
</style>

            
<!-- page content -->
<!--<div class="row">
 <form action ="<?=base_url()?>messages/example" method="post" id="searchform">
        Search:&nbsp;<input type="text" name="searchterm" id="searchterm"  />&nbsp;
        <input type="submit" value="Search >>" id="submit" />
       
    </form>
   
    </div>-->


     <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder padding-v-20">
                        
                       
                        
                    </div>
                    <!-- ./page content holder -->
                </div>





<div class="page-content">
 <div class="row">
                <div class="col-md-12">
                    <?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'vendoraddform');  
                        echo form_open_multipart("users/do_vendor_register", $form_attributes);
                           

                    ?>
                      <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">City</label>
                                <div class="col-md-2 col-xs-12">                                            
                                    <?php $cities[0] = 'Select city' ?>
                                    <?php //echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>                               
                                    <?php echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>
                                    
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                               
                             <?php echo form_close();?>
                             </div>
                           </div>  


 <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
    <div class="page-content-holder padding-v-20">
        
      <!-- <form action ="<?=base_url()?>messages/example" method="post" id="searchform">
        Search:&nbsp;<input type="text" name="searchterm" id="searchterm"  />&nbsp;
        <input type="submit" value="Search >>" id="submit" />
    </form>-->
    

    <div class="row">
    <?php if(!empty($vendors)) { ?>

        <?php foreach( $vendors as $vendor ) { ?>

        
            <div class="col-md-12">
                <div class="col-md-4">
                    <img src="<?php echo uploads_url(); ?>vendors/logos/<?php echo $vendor->featured_img; ?>"  width="300" height="160"  />
                   
                </div>
                <div class="col-md-7">
                    <h2><?php echo anchor('vendors/view/'.$vendor->slug, $vendor->name); ?></h2>
                    <p><?php echo $vendor->address; ?></p>
                      <p><?php echo word_limiter($vendor->about,50); ?></p>
                    <p><?php echo $vendor->cityname; ?>, <?php echo $vendor->statename; ?></p>
                </div>
            </div>
        <?php } ?>
    
    <?php } else { ?>
        <div class="col-md-12">
            No results foud !
        </div>
    <?php } ?>

    </div>
    <!-- ./page content holder -->
</div>
    
    
    
</div>
<!-- ./page content -->
            
            