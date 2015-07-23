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
 


 <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
    <div class="page-content-holder padding-v-20">
        
      <!-- <form action ="<?=base_url()?>messages/example" method="post" id="searchform">
        Search:&nbsp;<input type="text" name="searchterm" id="searchterm"  />&nbsp;
        <input type="submit" value="Search >>" id="submit" />
    </form>-->
    

    <div class="row">
    <?php if(!empty($details)) { ?>

        <?php foreach( $details as $vendor ) { ?>

        
            <div class="col-md-12">
                <div class="col-md-4">
                    <img src="<?php echo uploads_url(); ?>vendors/logos/<?php echo $vendor->featured_img; ?>"  width="300" height="160"  />
                   
                </div>
                <div class="col-md-7">
                    <h2><?php echo anchor('vendors/view_details/'.$vendor->slug, $vendor->name); ?></h2>
                    <p><?php echo 'About:    '?><?php echo word_limiter($vendor->about,50); ?></p>
                    <p><?php echo 'Contact Number:    '?><?php echo $vendor->contact_number; ?></p>
                    <p><?php echo 'Pin:    '?><?php echo $vendor->pin; ?></p>
                    <p><?php echo 'Address:    '?><?php echo $vendor->cityname; ?></p><p><?php echo $vendor->statename; ?></p>
                    <p><?php echo 'Added On:    '?><?php echo $vendor->added_on; ?></p>
                  

                     <li><a href="<?php echo base_url();?>vendors/add_bid/<?php echo $vendor->vendor_id;?>">Add To Bid</a></li>
                   
                
                </div>
            </div>
        <?php } ?>
    
    <?php } else { ?>
        <div class="col-md-12">
            No results found !
        </div>
    <?php } ?>

    </div>
    <!-- ./page content holder -->
</div>
    
    
    
</div>
<!-- ./page content -->
            
            