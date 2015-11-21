<style>
    #small-loader {
        display: none;
    }
</style>
    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- SIGN OUT -->
        <li class="xn-icon-button pull-right">
            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                    </li> 
        <!-- END SIGN OUT -->
        
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                   
    
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Events</a></li>
        <li class="active"><a href="#">Add a event manager</a></li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <?php if($this->session->userdata('msg') != '')
                echo $this->session->userdata('msg');
                ?>
            </div>
            <div class="col-md-12">
				<?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'vendoraddform');	
					echo form_open_multipart("users/do_event_manager_register", $form_attributes);
				?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add Event Manager Infromation</strong> </h3>
                        
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php if(validation_errors()): ?>
                            <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                            <?php endif; ?>
                            <?php if(!empty($error)): ?> 
                                <div class="alert alert-warning">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="panel-body">                                                                        
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Company Name</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $company_data = array(
                                          'name'        => 'company_name',
                                          'id'          => 'company_name',
                                          'placeholder' => 'Enter company name',
                                          'class'       => 'form-control',
                                          'required'    => TRUE,
                                        );

                                    ?>
                                    <?php echo form_input($company_data);?>
                                </div>                                            
                                <span class="help-block">Type event management company name eg Creative Wedding Planners</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Contact Name</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $contact_data = array(
                                          'name'        => 'contact_name',
                                          'id'          => 'contact_name',
                                          'placeholder' => 'Enter contact name',
                                          'class'       => 'form-control',
                                          'required'    => TRUE,
                                        );

                                    ?>
                                    <?php echo form_input($contact_data);?>
                                </div>                                            
                                <span class="help-block">Event manager name</span>                                        
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $contact_number_data = array(
                                          'name'        => 'contact_number',
                                          'id'          => 'contact_number',
                                          'placeholder' => 'Enter contact number',
                                          'class'       => 'form-control',
                                          'required'    => TRUE,
                                        );

                                    ?>
                                    <?php echo form_input($contact_number_data);?>
                                </div>                                            
                                <span class="help-block">Type contact number</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email Id</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $email_data = array(
                                          'name'        => 'email',
										  'type' 		=> 'email',
                                          'id'          => 'email',
                                          'placeholder' => 'Enter email id eg event.manager@xyz.com',
                                          'class'       => 'form-control',
                                          'required'    => TRUE,
                                        );

                                    ?>
                                    <?php echo form_input($email_data);?>
                                </div>                                            
                                <span class="help-block">Type a valid email id. <b>This email id will be used as username</b></span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Company Address</label>
                            <div class="col-md-6 col-xs-12">
                                <?php 
                                        $address_data = array(
                                          'name'        => 'address',
										  'rows' 		=> '5',
                                          'id'          => 'address',
                                          'placeholder' => 'Enter address of the event management company',
                                          'class'       => 'form-control',
                                          'required'    => TRUE,
                                        );

                                    ?>
                                <?php echo form_textarea($address_data);?>
                                <span class="help-block"></span>                                        
                            </div>
                        </div>
						
						 <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">State</label>
                            <div class="col-md-6 col-xs-12">                                                                                            
								<?php $states[-1] = 'Please select a state'; ?>
								<?php echo form_dropdown('state_id', $states, -1,'class="form-control" id="state_id"'); ?>
                                <span class="help-block"></span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">City</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <?php $cities[0] = 'Select city' ?>
								<?php //echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>								
                                <?php echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>
                                
                                <span class="help-block"></span>                                        
                            </div> <img src="<?php echo asset_url(); ?>img/small-loader.gif" id="small-loader" /> 
                        </div>

                        

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Pin Code</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $pin_data = array(
                                          'name'        => 'pin',
										  'type' 		=> 'number',
                                          'id'          => 'pin',
                                          'placeholder' => 'Enter PIN code',
                                          'class'       => 'form-control',
                                          'required'    => TRUE,
                                        );

                                    ?>
                                    <?php echo form_input($pin_data);?>
                                </div>                                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>
                    
                       
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Upload Logo</label>
                            <div class="col-md-6 col-xs-12">                                                                                                                                     
								<?php 
                                        $file_data = array(
                                          'name'        => 'logo',
										  'type' 		=> 'file',
                                          'id'          => 'logo',
										  'title'		=> 'Browse File',
                                        );

                                    ?>
                                    <?php echo form_input($file_data);?>
                                <span class="help-block"></span>                                        
                            </div>
                        </div>
                        <!--
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Checkbox</label>
                            <div class="col-md-6 col-xs-12">                                                                                                                                        
                                <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/> Checkbox title</label>
                                <span class="help-block">Checkbox sample, easy to use</span>                                        </div>
                        </div>
                        -->
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default">Clear Form</button>                                    
                        <?php echo form_submit('addSubmit', 'Submit',"class='btn'"); ?>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>                    
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
</div>            