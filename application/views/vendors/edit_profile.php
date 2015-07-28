<!-- PAGE CONTENT -->
<div class="page-content">
    <?php echo $this->load->view('common/admin/sign_out'); ?>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                <?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'vendoraddform');  
                    echo form_open_multipart("vendors/edit_vendor_profile", $form_attributes);
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Vendor Infromation</strong> </h3>
                        
                    </div>
                    <div class="panel-body">
                    
                    
                    </div>
                    <?php //dump($_POST); ?>
                    <div class="panel-body">  
                    <label style="display:none" >Id :</label>
                    <input type="text" style="display:none" name="vid" value="<?php echo $details->vendor_id; ?>">

                   
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Vendor Name</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $vendor_data = array(
                                          'value'         => $details->name,
                                          'id'            => 'name',
                                          'name'          => 'name',
                                        
                                          'class'         => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_input($vendor_data);?>
                                </div>                                            
                             </div>
                         </div>

                       

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $contact_number_data = array(
                                          'value'        => $details->contact_number,
                                          'id'           => 'contact_number',
                                           'name'          => 'contact_number',
                                         
                                          'class'        => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_input($contact_number_data);?>
                                </div>                                            
                         </div>
                    </div>

                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email Id</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $email_data = array(
                                            'readonly'  => TRUE,
                                            'type'      => 'email',
                                            'id'        => 'email',
                                            'name'      => 'email',
                                            'class'     => 'form-control',
                                            'value'     => $details->email,    
                                        );

                                    ?>
                                    <?php echo form_input($email_data);?>
                                </div>                                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Vendor Address</label>
                            <div class="col-md-6 col-xs-12">
                                <?php 
                                        $address_data = array(
                                          'name'        => 'address',
                                          'rows'        => '5',
                                          'id'          => 'address',
                                         
                                          'value'       =>  $details->address,
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                <?php echo form_textarea($address_data);?>
                                <span class="help-block"></span>                                        
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">State</label>
                            <div class="col-md-6 col-xs-12">                                                                                            
                                <?php $states[0] = 'Please select a state'; ?>
                                <?php echo form_dropdown('state_id', $states, $details->state_id,'class="form-control" id="state_id"'); ?>
                                <span class="help-block"></span>                                        
                            </div>
                        </div>


                       <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">City</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <?php $cities[0] = 'Select city' ?>
                                <?php //echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>                               
                                <?php echo form_dropdown('city_id', $cities, $details->city_id,'class="form-control" id="city_id"'); ?>
                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Pin Code</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $pin_data = array(
                                          'name'        => 'pin',
                                          'type'        => 'text',
                                          'id'          => 'pin',
                                       
                                          'class'       => 'form-control',
                                          'value'       => $details->pin,
                                        );

                                    ?>
                                    <?php echo form_input($pin_data);?>
                                </div>                                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>
                        
                       
                        
                       
                       
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Logo</label>
                            <div class="col-md-6 col-xs-12">
                            
                                                                                                                                                                  
                                <?php if($details->logo != '') { ?>  
                                    <img src="<?php echo uploads_url().'vendors/logos/'. $details->logo;?>" width="300" height="160" class="current_image" />
                                    <?php 
                                        $pin_data = array(
                                          'name'        => 'logo_path',
                                          'type'        => 'hidden',
                                          'id'          => 'logo_path',
                                       
                                          'class'       => 'form-control',
                                          'value'       => $details->logo,
                                        );

                                    ?>
                                    <?php echo form_input($pin_data);?>
                                 <?php }else{ ?>                              
                                    <b>No logo added</b>
                                 <?php } ?>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Chnage Logo</label>
                            <div class="col-md-6 col-xs-12">
                                <?php 
                                    $logo_data = array(
                                      'name'        => 'new_avatar',
                                      'type'        => 'file',
                                      'id'          => 'new_avatar',
                                      'class'       => 'form-control',
                                    );
                                ?>
                                <?php echo form_input($logo_data);?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Featured Image</label>
                            <div class="col-md-6 col-xs-12">
                            
                                                                                                                                                                  
                                <?php if($details->featured_img != '') { ?>  
                                    <img src="<?php echo uploads_url().'vendors/images/'. $details->featured_img;?>"  class="current_image" />
                                    <?php 
                                        $featured_img_data = array(
                                          'name'        => 'featured_img_old',
                                          'type'        => 'hidden',
                                          'id'          => 'featured_img_old',
                                       
                                          'class'       => 'form-control',
                                          'value'       => $details->featured_img,
                                        );

                                    ?>
                                    <?php echo form_input($featured_img_data);?>
                                 <?php }else{ ?>                              
                                    <b>No image added</b>
                                 <?php } ?>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Chanage Featured Imge</label>
                            <div class="col-md-6 col-xs-12">
                                <?php 
                                    $featured_img_new_data = array(
                                      'name'        => 'featuredimage',
                                      'type'        => 'file',
                                      'id'          => 'featuredimage',
                                      'class'       => 'form-control',
                                    );
                                ?>
                                <?php echo form_input($featured_img_new_data);?>
                            </div>
                        </div>


                    </div>
                  
                </div>
                 <div class="panel-footer">
                        <button class="btn btn-default">Clear Form</button>                                    
                        <?php echo form_submit('addSubmit', 'Save Changes',"class='btn'"); ?>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>                    
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
</div>            
<!-- END PAGE CONTENT -->