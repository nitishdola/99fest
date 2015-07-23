<!-- PAGE CONTENT -->
    <div class="page-content">



    <!--  FOr Slug Texbox  -->
 

        
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
            <li><a href="#">Service</a></li>
            <li class="active"><a href="#"> Venue Information</a></li>
        </ul>
        <!-- END BREADCRUMB -->
        
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
        
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    $form_attributes = array('class' => 'form-horizontal', 'id' => 'vendoraddform');  
                    echo form_open_multipart("vendor_stores/register_venue_information", $form_attributes);
                           

                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add Venue Information</strong> </h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                       
                        
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Venue Name</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <?php 
                                            $venue_data = array(
                                              'name'        => 'venue_name',
                                              'id'          => 'venue_name',
                                              'placeholder' => 'Enter venue name',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );

                                        ?>
                                        <?php echo form_input($venue_data);?>
                                    </div>                                            
                                    <span class="help-block"></span>                                        </div>
                            </div>

                               <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                            $address_data = array(
                                              'name'        => 'venue_address',
                                              'rows'        => '5',
                                              'id'          => 'venue_address',
                                              'placeholder' => 'Enter address',
                                              'class'       => 'form-control',
                                            );

                                        ?>
                                    <?php echo form_textarea($address_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                           

                           <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <?php 
                                            $contact_data = array(
                                              'name'        => 'venue_number',
                                              'id'          => 'venue_number',
                                              'placeholder' => 'Enter contact number',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );

                                        ?>
                                        <?php echo form_input($contact_data);?>
                                    </div>                                            
                                    <span class="help-block"></span>                                        </div>
                            </div>

                           <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email Id</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <?php 
                                            $email_data = array(
                                              'name'        => 'email',
                                              'type'        => 'email',
                                              'id'          => 'email',
                                              'placeholder' => 'Enter email id eg vendor@xyz.com',
                                              'class'       => 'form-control',
                                            );

                                        ?>
                                        <?php echo form_input($email_data);?>
                                    </div>                                            
                                    
                                </div>
                            </div>

                                <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Capacity</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                             $capacity_data = array(
                                              'name'        => 'venue_capacity',
                                              'id'          => 'venue_capacity',
                                              'placeholder' => 'Enter venue capacity',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );


                                        ?>
                                    <?php echo form_input($capacity_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>


                               <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Venue Types</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="venu_types" class="selectpicker">
                                          <option value="Veg">Hotel</option>
                                          <option value="Non Veg">Open Ground</option>
                                           <option value="Both">Function Hall</option>
                                           <option value="Non Veg">Restaurant</option>
                                           <option value="Both">Auditorium</option>
                                          
                                          
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                             <div class="form-group" >                                        
                                        <label class="col-md-3 col-xs-12 control-label">Per Day</label>
                                        <div class="col-md-2" id="item_1">
                                             <?php 
                                                $perday_data = array(
                                                  'name'        => 'perday',
                                                  'id'          => 'perday',
                                                  'placeholder' => 'Rs.',
                                                  'class'       => 'form-control',
                                                );

                                            ?>
                                    <?php echo form_input($perday_data);?>
                                    </div>


                                  <label class="col-md-3 col-xs-12 control-label">Per Plate</label>
                                        <div class="col-md-2" id="item_1">
                                             <?php 
                                    $perplate_data = array(
                                      'name'        => 'perplate',
                                      'id'          => 'perplate',
                                      'placeholder' => '$',
                                      'class'       => 'form-control',
                                    );

                                    ?>
                                    <?php echo form_input($perplate_data);?>
                                    </div>
                                </div>
                              
                             
                                <div class="form-group" id="menu">                                        
                                       <label class="col-md-3 col-xs-12 control-label">Per Hour</label>
                                        <div class="col-md-2" id="item_1">
                                             <?php 
                                    $perhour_data = array(
                                      'name'        => 'perhour',
                                      'id'          => 'perhour',
                                      'placeholder' => '$',
                                      'class'       => 'form-control',
                                    );

                                    ?>
                                    <?php echo form_input($perhour_data);?>
                                    </div>


                                  <label class="col-md-3 col-xs-12 control-label">Hall Rent</label>
                                        <div class="col-md-2" id="item_1">
                                             <?php 
                                    $hallrent_data = array(
                                      'name'        => 'hallrent',
                                      'id'          => 'hallrent',
                                      'placeholder' => '$',
                                      'class'       => 'form-control',
                                    );

                                    ?>
                                    <?php echo form_input($hallrent_data);?>
                                    </div>
                                </div>
                                     

                              <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Description About Venue</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                            $description_data = array(
                                              'name'        => 'venue_description',
                                              'rows'        => '5',
                                              'id'          => 'venue_description',
                                              'placeholder' => 'Description',
                                              'class'       => 'form-control',
                                            );

                                        ?>
                                    <?php echo form_textarea($description_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Upload Diagrams</label>
                                <div class="col-md-6 col-xs-12">                                                                                                                                     
                                    <?php 
                                            $file_data = array(
                                              'name'        => 'logo',
                                              'type'        => 'file',
                                              'id'          => 'logo',
                                              'title'       => 'Browse File',
                                            );

                                        ?>
                                        <?php echo form_input($file_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                                         
                                          
                                     
                            <!-- checbox function is not working-->
                               <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Venue Suited For</label>
                                <div class="col-md-6 col-xs-12">     
                                                                                                                   
                           <?php foreach($cateror_service_types as $k => $v){ ?>  
                                           <div class="col-md-7">                                    
                                            <label class="check"><input type="checkbox"  name="function[]"  value='<?php echo ($v->name); ?>' class="icheckbox"/> <?php echo ($v->name); ?></label>
                                                                                      
                                        </div>
                                         <?php } ?>
                                          
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>


                               <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Rooms</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="rooms" class="selectpicker">
                                          <option value="0">Available</option>
                                          <option value="1">Not Available</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                                <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">A/C</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="ac" class="selectpicker">
                                          <option value="0">Yes</option>
                                          <option value="1">No</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                              <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Parking</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="parking" class="selectpicker">
                                          <option value="0">Yes</option>
                                          <option value="1">No</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>


                                <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Parking Capacity</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                             $parking_capacity_data = array(
                                              'name'        => 'parking_capacity',
                                              'id'          => 'parking_capacity',
                                              'placeholder' => 'Enter parking capacity',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );


                                        ?>
                                    <?php echo form_input($parking_capacity_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">WiFi</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="wifi" class="selectpicker">
                                          <option value="0">Yes</option>
                                          <option value="1">No</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                           
                           <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Alcohol</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="alcohol" class="selectpicker">
                                          <option value="0">Yes</option>
                                          <option value="1">No</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>





                            <div class="form-group" type="hidden">
                                <label class="col-md-3 col-xs-12 control-label">catering</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="catering" id='venue_catering' class="selectpicker" value="select a Option">
                                          <option value="Yes">Yes</option>
                                          <option value="No">No</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                        

                        <div  id="venue_catering_menu_item">
                            
                                <div class="form-group" >                                        
                                        <label class="col-md-3 col-xs-12 control-label">Item  Name</label>
                                        <div class="col-md-2" id="item_1">
                                             <?php 
                                    $item3_data = array(
                                      'name'        => 'item_name_3',
                                      'type'        => 'text',
                                      'id'          => 'item_name_3',
                                      'placeholder' => 'Burger',
                                      'class'       => 'form-control',
                                    );

                                    ?>
                                    <?php echo form_input($item3_data);?>
                                    </div>


                                    <label class="col-md-2 col-xs-3 control-label">price per plate</label>
                                    <div class="col-md-2" id="item_price_1">
                                        <?php 
                                            $price3_data = array(
                                              'name'        => 'item_price_3',
                                              'type'        => 'number',
                                              'id'          => 'item_price_3',
                                              'placeholder' => '80',
                                              'class'       => 'form-control',
                                            );

                                            ?>
                                        <?php echo form_input($price3_data);?>
                                    </div>
                                            
                                </div>
                              
                             
                                <div class="form-group" id="menu">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Item  Name</label>
                                        <div class="col-md-2" id="item1_1">
                                             <?php 
                                    $item1_data = array(
                                      'name'        => 'item_name_1',
                                      'type'        => 'text',
                                      'id'          => 'item_name_1',
                                      'placeholder' => 'Pizza',
                                      'class'       => 'form-control',
                                    );

                                    ?>
                                    <?php echo form_input($item1_data);?>
                                    </div>


                                    <label class="col-md-2 col-xs-3 control-label">price per plate</label>
                                    <div class="col-md-2" id="item_price1_1">
                                        <?php 
                                            $price1_data = array(
                                              'name'        => 'item_price_1',
                                              'type'        => 'number',
                                              'id'          => 'item_price_1',
                                              'placeholder' => '180',
                                              'class'       => 'form-control',
                                            );

                                            ?>
                                        <?php echo form_input($price1_data);?>
                                    </div>
                                            
                                </div>

                            
                                <div id="myform" id="menu_1">
                                    <div class="form-group" id="menu">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Item  Name</label>
                                        <div class="col-md-2" id="item2_1">
                                            <?php 
                                            $item2_data = array(
                                              'name'        => 'item_name_2',
                                              'type'        => 'text',
                                              'id'          => 'item_name_2',
                                              'placeholder' => 'Biriyani',
                                              'class'       => 'form-control',
                                            );

                                            ?>
                                            <?php echo form_input($item2_data);?>
                                        </div>


                                        <label class="col-md-2 col-xs-3 control-label">price per plate</label>
                                        <div class="col-md-2" id="item_price2_1">
                                            <?php 
                                                $price2_data = array(
                                                  'name'        => 'item_price_2',
                                                  'type'        => 'number',
                                                  'id'          => 'item_price_2',
                                                  'placeholder' => '200',
                                                  'class'       => 'form-control',
                                                );

                                                ?>
                                            <?php echo form_input($price2_data);?>
                                        </div>
                                            
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
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-3">
                                    <button id="addlink" class="btn btn-primary btn-min">Add New</button>
                                </div>
                                <div class="col-md-5">
                                    <button id="removelink" style="display:none" class="btn btn-danger btn-small">Remove</button>
                                    
                                </div>
                            </div>



                              <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Outside Catering</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="outsidecatering" class="selectpicker">
                                          <option value="0">Yes</option>
                                          <option value="1">No</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                               <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Hall Dimensions(Optional)</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                             $hall_dimensions_data = array(
                                              'name'        => 'hall_dimensions',
                                              'id'          => 'hall_dimensions',
                                              'placeholder' => 'Enter Hall Dimension',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );


                                        ?>
                                    <?php echo form_input($hall_dimensions_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Decoration Service</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="decorationservice" class="selectpicker" id="decoration_service">
                                          <option value="Yes">Yes</option>
                                          <option value="No">No</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                            <div id="decoration" >
                                  <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Cost</label>
                                  <div class="col-md-6 col-xs-12">
                                    <?php 
                                             $cost_data = array(
                                              'name'        => 'Cost',
                                              'id'          => 'cost',
                                              'placeholder' => 'Enter Rate',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );


                                        ?>
                                    <?php echo form_input($cost_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Outside Decoration </label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select name="outsidedecoration" class="selectpicker">
                                          <option value="0">Allowed</option>
                                          <option value="1">Not Allowed</option>  
                                      </select>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Distance From Airport</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                             $parking_capacity_data = array(
                                              'name'        => 'airport',
                                              'id'          => 'airport',
                                              'placeholder' => 'Enter Distance',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );


                                        ?>
                                    <?php echo form_input($parking_capacity_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Distance From Bus Stand</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                             $bus_data = array(
                                              'name'        => 'bus_stand',
                                              'id'          => 'bus_stand',
                                              'placeholder' => 'Enter Distance',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );


                                        ?>
                                    <?php echo form_input($bus_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Website(If any)</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                             $website_data = array(
                                              'name'        => 'website',
                                              'id'          => 'website',
                                              'placeholder' => 'Enter Distance',
                                              'class'       => 'form-control',
                                              'onkeyup'=>'copy_data(this)',
                                            );


                                        ?>
                                    <?php echo form_input($website_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                          <label class="col-md-2 col-xs-3 control-label"></label>
                                    <div class="col-md-2" id="item_price2_1">
                                        <?php 
                                            $price3_data = array(
                                              'name'        => 'counter',
                                              'type'        => 'hidden',
                                              'id'          => 'vendor_menu_counter',
                                              'value' => 3,
                                              'class'       => 'form-control',
                                            );

                                            ?>
                                        <?php echo form_input($price3_data);?>
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
    <!-- END PAGE CONTENT -->
</div>
        <!-- END PAGE CONTAINER -->