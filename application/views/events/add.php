
<?php echo $map['js']; ?>
<!-- PAGE CONTENT -->
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
                    <a href="pages-tasks.html">Show all tasks</a>                            
                </div>                            
            </div>                        
        </li>
        <!-- END TASKS -->
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                   
    
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Events</a></li>
        <li class="active"><a href="#">Add a event</a></li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
				<?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'eventaddform');	
					echo form_open_multipart("events/add", $form_attributes);
				?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add Event Infromation</strong> </h3>
                        
                    </div>
                    
                    <div class="panel-body">                                                                        
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Name</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_name_data = array(
                                          'name'        => 'name',
                                          'id'          => 'name',
                                          'placeholder' => 'Enter event name',
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_input($event_name_data);?>
                                </div>                                            
                                <span class="help-block">Type event name eg Talent Hunt</span>                                        
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Start Time</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_start_time = array(
                                          'name'        => 'event_start_time',
                                          'id'          => 'event_start_time',
                                          'placeholder' => 'Event start time',
                                          'class'       => 'timepicker form-control',
                                        );

                                    ?>
                                    <?php echo form_input($event_start_time);?>
                                </div>                                            
                                <span class="help-block">Type start date</span>                                        
                            </div>
                        </div>
                        <script>
                            $('.timepicker').timepicker();
                        </script>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Categories</label>
                            <div class="col-md-6 col-xs-12">                                                                                            
                                <?php $categories[-1] = 'Please select a category'; ?>
                                <?php echo form_dropdown('categories[]', $categories, -1, 'class="selectpicker form-control " multiple="multiple" id="categories_id"'); ?>
                                <span class="help-block"></span>                                        
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Duration</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group input-append bootstrap-timepicker">
                                    
                                    <?php 
                                        $event_duration_data_hr = array(
                                          'name'        => 'event_duration_hr',
                                          'id'          => 'event_duration_hr',
                                          'placeholder' => 'Enter Duration Hour',
                                          'class'       => 'form-control',
                                          'max'         => 24,
                                          'type'        => 'number',
                                          'size'        => 2
                                        );

                                    ?>
                                    <?php echo form_input($event_duration_data_hr);?><br>

                                    <?php 
                                        $event_duration_data_min = array(
                                          'name'        => 'event_duration_minutes',
                                          'id'          => 'event_duration_minutes',
                                          'placeholder' => 'Enter Duration minutes',
                                          'class'       => 'form-control',
                                          'type'        => 'number',
                                          'size'        => 2,
                                          'max'         => 60,
                                        );

                                    ?>
                                    <?php echo form_input($event_duration_data_min);?>
                                </div>   
                                <span class="add-on"><span class="add-on"></span><i class="icon-time"></i></span>
                                                                        
                                <span class="help-block">Type event duration</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Start Date</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_date_from = array(
                                          'name'        => 'event_start_date',
                                          'id'          => 'event_start_date',
                                          'placeholder' => 'Event start date',
                                          'class'       => 'form-control datepicker',
                                        );

                                    ?>
                                    <?php echo form_input($event_date_from);?>
                                </div>                                            
                                <span class="help-block">Type start date</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event End Date</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_date_from = array(
                                          'name'        => 'event_end_date',
                                          'id'          => 'event_end_date',
                                          'placeholder' => 'Event end date',
                                          'class'       => 'form-control datepicker',
                                        );

                                    ?>
                                    <?php echo form_input($event_date_from);?>
                                </div>                                            
                                <span class="help-block">Type end date</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Venue</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $venue_data = array(
                                          'name'        => 'venue',
                                          'id'          => 'venue',
                                          'placeholder' => 'Enter Event Venue',
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_input($venue_data);?>
                                </div>                                            
                                <span class="help-block">Type Venue , eg Opera Theatre</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Venue Address</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $venue_address_data = array(
                                          'name'        => 'venue_address',
                                          'id'          => 'venue_address',
                                          'rows'        => '5',
                                          'placeholder' => 'Enter venue address',
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_textarea($venue_address_data);?>
                                </div>                                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Venue PIN</label>
                            <div class="col-md-6 col-xs-12">
                                <?php 
                                        $venue_pin_data = array(
                                          'name'        => 'venue_pin',
                                          'id'          => 'venue_pin',
                                          'placeholder' => 'Enter PIN code of the venue',
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                <?php echo form_input($venue_pin_data);?>
                                <span class="help-block"></span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"><h3>Select Venue in google map</h3></label>
                           
                            <div class="col-md-12 col-xs-12">    
                                <?php echo $map['html']; ?>
                            </div>

                            <?php 
                                $google_lat_data = array(
                                  'name'        => 'venue_lat',
                                  'type'        => 'hidden',
                                  'id'          => 'venue_lat',
                                  
                                );

                            ?>
                            <?php echo form_input($google_lat_data);?>

                            <?php 
                                $google_lng_data = array(
                                  'name'        => 'venue_lng',
                                  'type'        => 'hidden',
                                  'id'          => 'venue_lng',
                                  
                                );

                            ?>
                            <?php echo form_input($google_lng_data);?>
                        </div>

                        <script>
                            function updateDatabase(newLat, newLng) {
                                //alert(newLat+'  '+newLng);
                                $('#venue_lat').val(newLat);
                                $('#venue_lng').val(newLng);
                            }
                             

                        </script>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">State</label>
                            <div class="col-md-6 col-xs-12">                                                                                            
                                <?php $states[0] = 'Please select a state'; ?>
                                <?php echo form_dropdown('state_id', $states, 0,'class="form-control" id="state_id"'); ?>
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
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">About</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $about_event_data = array(
                                          'name'        => 'about',
                                          'id'          => 'about',
                                          'rows'        => 5,
                                          'class'       => 'summernote form-control',
                                        );
                                    ?>
                                    <?php echo form_textarea($about_event_data);?>
                                </div>                                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">FAQ</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_faq_data = array(
                                          'name'        => 'faq',
                                          'id'          => 'faq',
                                          'rows'        => 5,
                                          'class'       => 'summernote form-control',
                                        );
                                    ?>
                                    <?php echo form_textarea($event_faq_data);?>
                                </div>                                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Terms and Conditions</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_tnc_data = array(
                                          'name'        => 'tnc',
                                          'id'          => 'tnc',
                                          'rows'        => 5,
                                          'class'       => 'summernote form-control',
                                        );
                                    ?>
                                    <?php echo form_textarea($event_tnc_data);?>
                                </div>                                            
                                <span class="help-block"></span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Facebook Page</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_facebook_data = array(
                                          'name'        => 'event_facebook_id',
                                          'id'          => 'event_facebook_id',
                                          'placeholder' => 'Enter facebook Page',
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_input($event_facebook_data);?>
                                </div>                                            
                                <span class="help-block">Type event facebook page</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Twitter Page</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_twitter_data = array(
                                          'name'        => 'event_twitter_id',
                                          'id'          => 'event_twitter_id',
                                          'placeholder' => 'Enter twitter Page',
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_input($event_twitter_data);?>
                                </div>                                            
                                <span class="help-block">Type event twitter page</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Event Instagram Page</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $event_instagram_data = array(
                                          'name'        => 'event_instagram_id',
                                          'id'          => 'event_instagram_id',
                                          'placeholder' => 'Enter Instagram Page',
                                          'class'       => 'form-control',
                                        );

                                    ?>
                                    <?php echo form_input($event_instagram_data);?>
                                </div>                                            
                                <span class="help-block">Type event instagram page</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Upload Poster</label>
                            <div class="col-md-6 col-xs-12">                                                                                                                                     
                                <?php 
                                        $file_data = array(
                                          'name'        => 'poster',
                                          'type'        => 'file',
                                          'id'          => 'poster',
                                          'title'       => 'Browse File',
                                        );

                                    ?>
                                    <?php echo form_input($file_data);?>
                                <span class="help-block">IMAGE DIMENSION 1920x850</span>                                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Upload Thumbs</label>
                            <div class="col-md-6 col-xs-12">                                                                                                                                     
                                <?php 
                                        $file_data = array(
                                          'name'        => 'thumbs',
                                          'type'        => 'file',
                                          'id'          => 'thumbs',
                                          'title'       => 'Browse File',
                                        );

                                    ?>
                                    <?php echo form_input($file_data);?>
                                <span class="help-block">IMAGE DIMENSION 270x290</span>                                        
                            </div>
                        </div>

                    <div class="panel-footer">
                        <button class="btn btn-default">Clear Form</button>                                    
                        <?php echo form_submit('addSubmit', 'Submit',"class='btn'"); ?>
                    </div>

                </div>
                <?php echo form_close();?>
  
        