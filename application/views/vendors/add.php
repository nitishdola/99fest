<!--  FOr Slug Texbox  -->
<script>
function copy_data(val){
    var a = document.getElementById(val.id).value;
    document.getElementById("slug").value=a.split(' ').join('-');
}    
</script>

        
        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>                    </li>
            <!-- END TOGGLE NAVIGATION -->
            <!-- SEARCH -->
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>   
            <!-- END SEARCH -->
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                    </li> 
            <!-- END SIGN OUT -->
            <!-- MESSAGES -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-danger">4</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                        <div class="pull-right">
                            <span class="label label-danger">4 new</span>                                </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                            <span class="contacts-title">John Doe</span>
                            <p>Praesent placerat tellus id augue condimentum</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                            <span class="contacts-title">Dmitry Ivaniuk</span>
                            <p>Donec risus sapien, sagittis et magna quis</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                            <span class="contacts-title">Nadia Ali</span>
                            <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-offline"></div>
                            <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                            <span class="contacts-title">Darth Vader</span>
                            <p>I want my money back!</p>
                        </a>                            </div>     
                    <div class="panel-footer text-center">
                        <a href="pages-messages.html">Show all messages</a>                            </div>                            
                </div>                        
            </li>
            <!-- END MESSAGES -->
            <!-- TASKS -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-tasks"></span></a>
                <div class="informer informer-warning">3</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                        <div class="pull-right">
                            <span class="label label-warning">3 active</span>                                </div>
                    </div>
                    <div class="panel-body list-group scroll" style="height: 200px;">                                
                        <a class="list-group-item" href="#">
                            <strong>Phasellus augue arcu, elementum</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                            </div>
                            <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>                                </a>
                        <a class="list-group-item" href="#">
                            <strong>Aenean ac cursus</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                            </div>
                            <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>                                </a>
                        <a class="list-group-item" href="#">
                            <strong>Lorem ipsum dolor</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                            </div>
                            <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>                                </a>
                        <a class="list-group-item" href="#">
                            <strong>Cras suscipit ac quam at tincidunt.</strong>
                            <div class="progress progress-small">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                            </div>
                            <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>                                </a>                            </div>     
                    <div class="panel-footer text-center">
                        <a href="pages-tasks.html">Show all tasks</a>                            </div>                            
                </div>                        
            </li>
            <!-- END TASKS -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->                   
        
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Vendors</a></li>
            <li class="active"><a href="#">Add a vendor</a></li>
        </ul>
        <!-- END BREADCRUMB -->
        
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
        
            <div class="row">
                <div class="col-md-12">

                    <?php if($this->session->flashdata('error_message') != '') { ?>
                    
                    <div class="alert alert-danger fade in">

                        <a href="#" class="close" data-dismiss="alert">&times;</a>

                        <strong>Error!</strong> <?= $this->session->flashdata('error_message'); ?>

                    </div>

                    <?php } ?>

                    <?php if($this->session->flashdata('success_message') != '') { ?>
                    
                    <div class="alert alert-success fade in">

                        <a href="#" class="close" data-dismiss="alert">&times;</a>

                        <strong>Success !</strong> <?= $this->session->flashdata('success_message'); ?>

                    </div>

                    <?php } ?>


                        
                    
					<?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'vendoraddform');	
						echo form_open_multipart("users/do_vendor_register", $form_attributes);
                           

					?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add Vendor Information</strong> </h3>
                            
                        </div>
                      
                        
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Vendor Name</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <?php 
                                            $vendor_data = array(
                                              'name'        => 'name',
                                              'id'          => 'name',
                                              'required'    => TRUE,
                                              'placeholder' => 'Enter vendor name',
                                              'class'       => 'form-control required',
                                              'onkeyup'=>'copy_data(this)',
                                            );

                                        ?>
                                        <?php echo form_input($vendor_data);?>
                                    </div>  
                                    <div class="error"><?php echo form_error('name'); ?></div>                                          
                                    <span class="help-block">Type vendor name eg Creative Decorators Group</span>                                        </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Slug</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <?php 
                                            $slug_data = array(
                                                'name'         => 'slug',
                                                'id'           => 'slug',
                                                'readonly'     =>'readonly',
                                                'class'        => 'form-control required',
                                                'required'     => TRUE,
                                            );

                                        ?>
                                        <?php echo form_input($slug_data);?>
                                    </div>    
                                    <div class="error"><?php echo form_error('slug'); ?></div>                                         
                                    <span class="help-block"></span>                                        </div>
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
                                              'class'       => 'form-control required',
                                              'required'    => TRUE,
                                            );

                                        ?>
                                        <?php echo form_input($contact_number_data);?>
                                    </div>    
                                    <div class="error"><?php echo form_error('contact_number'); ?></div>                                         
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
                                              'placeholder' => 'Enter email id eg vendor@xyz.com',
                                              'class'       => 'form-control required',
                                              'required'    => TRUE,
                                            );

                                        ?>
                                        <?php echo form_input($email_data);?>
                                    </div> 
                                    <div class="error"><?php echo form_error('email'); ?></div>                                         

                                    <span class="help-block">Type a valid email id. <b>This email id will be used as username</b></span>                                        
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Area Cover</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                            $area_data = array(
                                              'name'        => 'address',
											  'rows' 		=> '4',
                                              'id'          => 'address',
                                              'placeholder' => 'Enter address of the vendor',
                                              'class'       => 'form-control required',
                                              'required'    => TRUE,
                                            );

                                        ?>
                                    <?php echo form_textarea($area_data);?>
                                    <div class="error"><?php echo form_error('address'); ?></div>                                         

                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">State</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
									<?php $states[0] = 'Please select a state'; ?>
									<?php echo form_dropdown('state_id', $states, 0,'class="form-control required" id="state_id"'); ?>
                                    <div class="error"><?php echo form_error('state_id'); ?></div>                                         
                                    
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">City</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <?php $cities[0] = 'Select city' ?>
									<?php //echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>								
                                    <?php echo form_dropdown('city_id', $cities, 0,'class="form-control required" id="city_id"'); ?>
                                    <div class="city_id"><?php echo form_error('state_id'); ?></div>                                         
                                    
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
											  'type' 		=> 'number',
                                              'id'          => 'pin',
                                              'placeholder' => 'Enter PIN code',
                                              'class'       => 'form-control required',
                                              'required'    => TRUE,
                                            );

                                        ?>
                                        <?php echo form_input($pin_data);?>
                                    </div>  
                                    <div class="error"><?php echo form_error('pin'); ?></div>                                         

                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">About the Vendor</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                            $about_data = array(
                                              'name'        => 'about',
                                              'rows'        => '8',
                                              'id'          => 'about',
                                              'placeholder' => 'please type here..',
                                              'class'       => 'form-control required',
                                              'required'    => TRUE,
                                            );

                                        ?>
                                    <?php echo form_textarea($about_data);?>
                                    <div class="error"><?php echo form_error('about'); ?></div>                                         

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
                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Featured Image</label>
                                <div class="col-md-6 col-xs-12">                                                                                                                                     
                                    <?php 
                                            $file_data1 = array(
                                              'name'        => 'featuredimage',
                                              'type'        => 'file',
                                              'id'          => 'featuredimage',
                                              'title'       => 'Browse File',
                                            );

                                        ?>
                                        <?php echo form_input($file_data1);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-default bbb">Clear Form</button>                                    
                            <?php echo form_submit('addSubmit', 'Submit',"class='btn' id='addVendorSubmit'"); ?>
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>                    
        </div>