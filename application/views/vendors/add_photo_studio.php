<!-- PAGE CONTENT -->
    <div class="page-content">
    <script>
var counter = 3;
$(document).ready(function() {

      });
    
    
 
</script>



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
            <li class="active"><a href="#"> Cateror Information</a></li>
        </ul>
        <!-- END BREADCRUMB -->
        
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
        
            <div class="row">
                <div class="col-md-12">
					<?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'vendoraddform');	
						echo form_open_multipart("vendor_stores/add_photo_studio", $form_attributes);
                           

					?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add Studio Information</strong> </h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                      
                       
                        
                        
                        </div>
                        
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Name</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <?php 
                                            $name_data = array(
                                              'name'        => 'name',
                                              'id'          => 'name',
                                              'placeholder' => 'Enter studio name',
                                              'class'       => 'form-control',
                                            );

                                        ?>
                                        <?php echo form_input($name_data);?>
                                    </div>                                            
                                    <span class="help-block"></span>                                        </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Descritpion</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                            $description_data = array(
                                              'name'        => 'studio_description',
                                              'rows'        => '5',
                                              'id'          => 'studio_description',
                                              'placeholder' => 'Enter Descritpion',
                                              'class'       => 'form-control',
                                            );

                                        ?>
                                    <?php echo form_textarea($description_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>


                               <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                            $address_data = array(
                                              'name'        => 'address',
                                              'rows'        => '5',
                                              'id'          => 'address',
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
                                              'name'        => 'contact_number',
                                              'id'          => 'contact_number',
                                              'placeholder' => 'Enter contact number',
                                              'class'       => 'form-control',
                                             
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
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>

                                <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Area Cover</label>
                                <div class="col-md-6 col-xs-12">
                                    <?php 
                                            $area_data = array(
                                              'name'        => 'area',
                                              'rows'        => '4',
                                              'id'          => 'area',
                                              'placeholder' => 'Enter area',
                                              'class'       => 'form-control',
                                            );

                                        ?>
                                    <?php echo form_textarea($area_data);?>
                                    <span class="help-block"></span>                                        
                                </div>
                            </div>
                                           
                                          
                                     
                            <!-- checbox function is not working-->
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Types Of function</label>
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
                            <label class="col-md-3 col-xs-12 control-label">Product Delivery Time</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <?php 
                                            $time_data = array(
                                              'name'        => 'time',
                                              'id'          => 'time',
                                              'placeholder' => 'In 2-8 weeks',
                                              'class'       => 'form-control',
                                            );

                                        ?>
                                        <?php echo form_input($time_data);?>
                                    </div>                                            
                                    <span class="help-block"></span>                                       
                                 </div>
                            </div>

                            <div style="background:#e8e8e8; padding:10px;">
                                <h3>Add special offers(upto three)</h3>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Special Offer title</label>
                                    <div class="col-md-6 col-xs-12">
                                        <?php 
                                                 $offer_date = array(
                                                  'name'        => 'offer_title1',
                                                  'id'          => 'offer_title1',
                                                  'placeholder' => 'Offer title eg B’day Parties!',
                                                  'class'       => 'form-control',
                                                  
                                                );


                                            ?>
                                        <?php echo form_input($offer_date);?>
                                        <span class="help-block"></span>                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Special Offer Details</label>
                                    <div class="col-md-6 col-xs-12">
                                        <?php 
                                                 $offer_date_details = array(
                                                  'name'        => 'offer_details1',
                                                  'id'          => 'offer_details1',
                                                  'placeholder' => 'eg Starting from Rs. 450 per person. Including catering & decorations services.',
                                                  'class'       => 'form-control',
                                                    'rows'      => 3
                                                );


                                            ?>
                                        <?php echo form_textarea($offer_date_details);?>
                                        <span class="help-block"></span>                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Special Offer title</label>
                                    <div class="col-md-6 col-xs-12">
                                        <?php 
                                                 $offer_date = array(
                                                  'name'        => 'offer_title2',
                                                  'id'          => 'offer_title2',
                                                  'placeholder' => 'Offer title eg B’day Parties!',
                                                  'class'       => 'form-control',
                                                  
                                                );


                                            ?>
                                        <?php echo form_input($offer_date);?>
                                        <span class="help-block"></span>                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Special Offer Details</label>
                                    <div class="col-md-6 col-xs-12">
                                        <?php 
                                                 $offer_date_details = array(
                                                    'name'        => 'offer_details2',
                                                    'id'          => 'offer_details2',
                                                    'placeholder' => 'eg Starting from Rs. 450 per person. Including catering & decorations services.',
                                                    'class'       => 'form-control',
                                                    'rows'      => 3
                                                );


                                            ?>
                                        <?php echo form_textarea($offer_date_details);?>
                                        <span class="help-block"></span>                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Special Offer title</label>
                                    <div class="col-md-6 col-xs-12">
                                        <?php 
                                                 $offer_date = array(
                                                  'name'        => 'offer_title3',
                                                  'id'          => 'offer_title3',
                                                  'placeholder' => 'Offer title eg B’day Parties!',
                                                  'class'       => 'form-control',
                                                  
                                                );


                                            ?>
                                        <?php echo form_input($offer_date);?>
                                        <span class="help-block"></span>                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Special Offer Details</label>
                                    <div class="col-md-6 col-xs-12">
                                        <?php 
                                                 $offer_date_details = array(
                                                  'name'        => 'offer_details3',
                                                  'id'          => 'offer_details3',
                                                  'placeholder' => 'eg Starting from Rs. 450 per person. Including catering & decorations services.',
                                                  'class'       => 'form-control',
                                                  'rows'      => 3
                                                );


                                            ?>
                                        <?php echo form_textarea($offer_date_details);?>
                                        <span class="help-block"></span>                                        
                                    </div>
                                </div>

                            </div>


                            <div  id="equipments">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Our Equipments</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <?php 
                                                $equip_data = array(
                                                  'name'        => 'equipment_1',
                                                  'id'          => 'equipment_1',
                                                  'placeholder' => 'Equipments',
                                                  'class'       => 'form-control',
                                                );

                                            ?>
                                            <?php echo form_input($equip_data);?>
                                        </div>                                            
                                        <span class="help-block"></span>                                       
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-3">
                                        <button id="addEquip" class="btn btn-primary btn-min">Add More Equipment</button>
                                    </div>
                                    <div class="col-md-5">
                                        <button id="removeEquip" style="display:none" class="btn btn-danger btn-small">Remove</button>
                                    </div>
                                </div>

                            </div>

                            <script>
                            var equip_counter = 1;
                            $('#addEquip').click(function(e) {

                                e.preventDefault();
                                equip_counter++;
                                if(equip_counter > 1) {
                                    $('#removeEquip').show();
                                }


                                $('#equip_counter').val(equip_counter);
                                var html = '';

                                html += '<div class="form-group" id="e_'+equip_counter+'">';
                                html += '<label class="col-md-3 col-xs-12 control-label">Our Equipments</label>';
                                html += '<div class="col-md-6 col-xs-12">';                                           
                                html += '<div class="input-group">';
                                html += '<span class="input-group-addon"><span class="fa fa-pencil"></span></span>';
                                html += '<input type="text" name="equipment_'+equip_counter+'"  placeholder="Equipments" class="form-control"  />';
                                html += '</div>';                                         
                                html += '<span class="help-block"></span>';                                     
                                html += '</div>';
                                html += '</div>';
                

                                $('#equipments').append(html);

                            });

                            $('#removeEquip').click(function(e) {
                                e.preventDefault();
                                $('#e_'+equip_counter).remove();
                                equip_counter--;
                                if(equip_counter < 2) {
                                    $('#removeEquip').hide();
                                }
                            });
                            </script>


                            <div style="background:#e8e8e8; padding:20px">
                                <p><strong>For small events & confrences(50-150 photographs + 2-4 DVD’s)</strong></p>
                                <label class="check"><input type="checkbox" id="contract_small" name="contract_small" value="1">Check if charged on contract basis</label>                                       
                                <div class="form-group">
                                     <label class="col-md-3 col-xs-12 control-label">Cost per Picture</label>
                                     <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <?php 
                                                $cost_picture = array(
                                                  'name'        => 'cost_picture_small',
                                                  'id'          => 'cost_picture_small',
                                                  'placeholder' => 'Enter cost',
                                                  'class'       => 'form-control',
                                                 
                                                );

                                            ?>
                                            <?php echo form_input($cost_picture);?>
                                        </div>                                            
                                        <span class="help-block"></span>                                       
                                     </div>
                                </div>



                                 <div class="form-group">
                                

                                     <label class="col-md-3 col-xs-12 control-label">Cost per Video</label>
                                     <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <?php 
                                                $cost_video = array(
                                                  'name'        => 'cost_video_small',
                                                  'id'          => 'cost_video_small',
                                                  'placeholder' => 'Enter cost',
                                                  'class'       => 'form-control',
                                                  
                                                );

                                            ?>
                                            <?php echo form_input($cost_video);?>
                                        </div>                                            
                                        <span class="help-block"></span>                                       
                                     </div>
                                </div>


                                <script>

                                    $('#contract_small').click(function() {
                                        if($('#contract_small').is(":checked")) {
                                            $('#cost_picture_small').prop('readonly', true);
                                            $('#cost_video_small').prop('readonly', true);
                                        }else{
                                            $('#cost_picture_small').prop('readonly', false);
                                            $('#cost_video_small').prop('readonly', false);
                                        }
                                    });
                                </script>

                            </div>

                            <div style="background:#e8e8e8; padding:20px">

                            <p><strong>For medium size events(Marriages, reception, Celebrations)</strong></p>
                            <label class="check"><input type="checkbox" id="contract_medium" value="1" name="contract_medium">Check if charged on contract basis</label>                                       

                                <div class="form-group">
                                     <label class="col-md-3 col-xs-12 control-label">Cost per Picture</label>
                                     <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <?php 
                                                $cost_picture = array(
                                                  'name'        => 'cost_picture_medium',
                                                  'id'          => 'cost_picture_medium',
                                                  'placeholder' => 'Enter cost',
                                                  'class'       => 'form-control',
                                                 
                                                );

                                            ?>
                                            <?php echo form_input($cost_picture);?>
                                        </div>                                            
                                        <span class="help-block"></span>                                       
                                     </div>
                                </div>

                                 <div class="form-group">
                                     <label class="col-md-3 col-xs-12 control-label">Cost per Video</label>
                                     <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <?php 
                                                $cost_video = array(
                                                  'name'        => 'cost_video_medium',
                                                  'id'          => 'cost_video_medium',
                                                  'placeholder' => 'Enter cost',
                                                  'class'       => 'form-control',
                                                );

                                            ?>
                                            <?php echo form_input($cost_video);?>
                                        </div>                                            
                                        <span class="help-block"></span>                                       
                                     </div>
                                </div>

                                <script>

                                    $('#contract_medium').click(function() {
                                        if($('#contract_medium').is(":checked")) {
                                            $('#cost_picture_medium').prop('readonly', true);
                                            $('#cost_video_medium').prop('readonly', true);
                                        }else{
                                            $('#cost_picture_medium').prop('readonly', false);
                                            $('#cost_video_medium').prop('readonly', false);
                                        }
                                    });
                                </script>

                            </div>

                            <div style="background:#e8e8e8; padding:20px">
                            <p><strong>For large events(Carnivals or fests)</strong></p>
                                <label class="check"><input type="checkbox" id="contract_large" value="1" name="contract_large">Check if charged on contract basis</label>                                       
                                
                                <div class="form-group">
                                     <label class="col-md-3 col-xs-12 control-label">Cost per Picture</label>
                                     <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <?php 
                                                $cost_picture = array(
                                                  'name'        => 'cost_picture_large',
                                                  'id'          => 'cost_picture_large',
                                                  'placeholder' => 'Enter cost',
                                                  'class'       => 'form-control',
                                                );

                                            ?>
                                            <?php echo form_input($cost_picture);?>
                                        </div>                                            
                                        <span class="help-block"></span>                                       
                                     </div>
                                </div>

                                 <div class="form-group">
                                     <label class="col-md-3 col-xs-12 control-label">Cost per Video</label>
                                     <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <?php 
                                                $cost_video = array(
                                                  'name'        => 'cost_video_large',
                                                  'id'          => 'cost_video_large',
                                                  'placeholder' => 'Enter cost',
                                                  'class'       => 'form-control',
                                                  'onkeyup'=>'copy_data(this)',
                                                );

                                            ?>
                                            <?php echo form_input($cost_video);?>
                                        </div>                                            
                                        <span class="help-block"></span>                                       
                                     </div>
                                </div>

                                <script>

                                    $('#contract_large').click(function() {
                                        if($('#contract_large').is(":checked")) {
                                            $('#cost_picture_large').prop('readonly', true);
                                            $('#cost_video_large').prop('readonly', true);
                                        }else{
                                            $('#cost_picture_large').prop('readonly', false);
                                            $('#cost_video_large').prop('readonly', false);
                                        }
                                    });
                                </script>

                            </div>
                        

                        <div class="panel-footer">
                            <?php 
                                $equip_counter_data = array(
                                    'name'        => 'equip_counter',
                                    'id'          => 'equip_counter',
                                    'type' => 'hidden',
                                    'value' => 1,
                                );

                            ?>
                            <?php echo form_input($equip_counter_data);?>
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