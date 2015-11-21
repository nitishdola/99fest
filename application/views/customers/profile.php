<section class="module">
            <div class="container">

                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">
                        <hr class="divider-w mt-10 mb-20">

                        <div role="tabpanel">

                            <!-- Nav tabs start-->
                            <ul class="nav nav-tabs font-alt" role="tablist">
                                <li class="active">
                                    <a href="#support" data-toggle="tab"><span class="icon-tools-2"></span> BOOKING HISTORY</a>
                                </li>
                                <li>
                                    <a href="#edit_profile" data-toggle="tab"><span class="icon-basket"></span> ACCOUNT DETAILS</a>
                                </li>
                                <li>
                                    <?= anchor(base_url().'change-password','<span class="icon-basket"></span> CHANGE PASSWORD'); ?> 
                                </li>
                            </ul>
                            <!-- Nav tabs end -->

                            <!-- Tab panes start-->
                            <div class="tab-content">

                                <!-- Tab start -->
                                <div class="tab-pane active" id="support">
                                    <h4 class="font-alt mb-0">BOOKING HIstory</h4>
                                    <hr class="divider-w mt-10 mb-20">

                                    <!-- Accordions start -->
                                    <div class="panel-group" id="accordion">

                                        <div class="col-md-12">
                                            <h4><a href="#">Guns and Roses - PK</a></h4>
                                            <p><i class="fa fa-calendar"></i>31st July, 2016</p>
                                        </div>

                                        <div class="col-md-12">
                                            <h4><a href="#">Rihanna Show</a></h4>
                                            <p><i class="fa fa-calendar"></i>20st July, 2016</p>
                                        </div>

                                        <div class="col-md-12">
                                            <h4><a href="#">Techfest Guwahati Show</a></h4>
                                            <p><i class="fa fa-calendar"></i>20st Feb, 2016</p>
                                        </div>
                                    </div>
                                    <!-- Accordions end -->
                                </div>
                                <!-- Tab end -->

                                <!-- Tab start -->
                                <div class="tab-pane" id="edit_profile">
                                    <h4 class="font-alt mb-0">EDIT Profile</h4>
                                    <hr class="divider-w mt-10 mb-20">

                                    <!-- Accordions start -->
                                    <div class="panel-group" id="accordion">

                                        <!-- Accordion item start -->
                                        <div class="panel panel-default" style="padding:3%">

                                            <?php echo validation_errors('<div class="errors">', '</div>'); ?>
                                            <?php if(!empty($error)): echo $error; endif;?> 
                                            <?php echo form_open('customers/edit'); ?>

                                            <?php //dump($details); ?>
                                        
                                            <div class="form-group">
                                                <?php 
                                                $fname = array(
                                                    'name'        => 'first_name',
                                                    'class'       => 'form-control',
                                                    'value'       => ucfirst($details->first_name),
                                                );

                                                ?>
                                                <?php echo form_input($fname);?>
                                            </div>
                                            <div class="form-group">
                                                <?php 
                                                $lname = array(
                                                    'name'        => 'last_name',
                                                    'class'       => 'form-control',
                                                    'value'       => ucfirst($details->last_name),
                                                );

                                                ?>
                                                <?php echo form_input($lname);?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <?php 
                                                $email = array(
                                                  'class'       => 'form-control',
                                                  'readonly'    => 'readonly',
                                                  'value'       => ucfirst($details->username),
                                                );

                                                ?>
                                                <?php echo form_input($email);?>
                                            </div>

                                            <div class="form-group">
                                            
                                            <?php 
                                            $mobile = array(
                                                'name'        => 'mobile_number',
                                                'class'       => 'form-control',
                                                'value'       => $details->mobile_number,
                                            );

                                            ?>
                                            <?php echo form_input($mobile);?>
                                        </div>
                                            <label>Address<span class="text-hightlight"></span></label>
                                            <div class="form-group">
                                            <?php 
                                            $address = array(
                                            'name'      => 'address',
                                            'class'       => 'form-control',
                                            'value'       => $details->address,
                                            );

                                            ?>
                                            <?php echo form_textarea($address);?>
                                            </div>

                                            

                                             <input type="submit" class="btn btn-block btn-fest-def" value="UPDATE">
                                        
                                             <?php echo form_close(); ?>


                                        </div>
                                        <!-- Accordion item end -->

                                    </div>
                                    <!-- Accordions end -->
                                </div>
                                <!-- Tab end -->

                            </div>
                            <!-- Tab panes end-->
                        </div>


                        

                    </div>

                </div><!-- .row -->

            </div>
        </section>