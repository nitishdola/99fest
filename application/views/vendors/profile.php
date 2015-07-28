<div class="page-content">
    
    <?php echo $this->load->view('common/admin/sign_out'); ?>

    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
     
         
    
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Vendor Information</strong> </h3>
                       
                    </div>
                    <div class="panel-body">
                    
                       <strong><?= anchor(base_url().'vendors/profile/edit', 'EDIT INFO'); ?></strong> 
                    </div>
                    <?php //dump($details); ?>
                    <div class="panel-body profile-data">                                                                        
                        
                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> Vendor Name</h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <p>
                                <?= $details->name; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> Contact Number</h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <p>
                                <?= $details->contact_number; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> Email</h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <p>
                                <?= $details->username; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> Area Cover</h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <p>
                                <?= $details->address; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> State</h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <p>
                                <?= $details->statename; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> City</h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <p>
                                <?= $details->cityname; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> PIN Code </h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <p>
                                <?= $details->pin; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> Logo </h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <?php if($details->logo != '') { ?>  
                                    <img src="<?php echo uploads_url().'vendors/logos/'. $details->logo;?>" width="300" height="160" />
                                 <?php }else{ ?>                              
                                    <b>No logo added</b>
                                 <?php } ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="profile-title"> Featured Image </h3>
                            </div>
                            <div class="col-md-6 profile-details">
                                <?php if($details->featured_img != '') { ?>  
                                    <img src="<?php echo uploads_url().'vendors/images/'. $details->featured_img;?>" width="300" height="160" />
                                 <?php }else{ ?>                              
                                    <b>No image added</b>
                                 <?php } ?>
                            </div>
                        </div>


                    </div>
                  
                </div>
                
            </div>
        </div>                    
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
</div>            