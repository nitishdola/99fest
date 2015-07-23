<div class="page-content">
    
    <!-- page content wrapper -->
    <div class="page-content-wrap bg-light">
        <!-- page content holder -->
        <div class="page-content-holder no-padding">
            <!-- page title -->
            <div class="page-title">                            
                <h1>Profile</h1>
                <!-- breadcrumbs -->
                
                <!--<ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Contacts</li>
                </ul>
                -->               
                <!-- ./breadcrumbs -->
            </div>
            <!-- ./page title -->
        </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->
    
                   
   
    <!-- ./page content wrapper -->
    
    <!-- page content wrapper -->
    <div class="page-content-wrap">                    
        
        <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>                    
        
        <!-- page content holder -->
        <div class="page-content-holder">
        
            <div class="row">
                <div class="col-md-12 this-animate" data-animate="fadeInLeft">
                    
                    <div class="text-column">
                        <h4>Edit Details</h4>
                    </div>

                    <?php echo validation_errors('<div class="errors">', '</div>'); ?>
					<?php if(!empty($error)): echo $error; endif;?> 
					<?php echo form_open('customers/edit'); ?>
                    
                    <div class="row">

                    	<?php //dump($details); ?>
                    	<div class="form-group">
                            <label>First Name <span class="text-hightlight"></span></label>
                            <?php 
                            $fname = array(
                            	'name' 		=> 'first_name',	
                              	'class'     => 'form-control',
                              	'value'		=> ucfirst($details->first_name),
                            );

                            ?>
                            <?php echo form_input($fname);?>
                        </div>

                        <div class="form-group">
                            <label>Last Name <span class="text-hightlight"></span></label>
                            <?php 
                            $lname = array(
                            	'name' 		=> 'last_name',	
                              	'class'       => 'form-control',
                              	'value'		=> ucfirst($details->last_name),
                            );

                            ?>
                            <?php echo form_input($lname);?>
                        </div>

                        <div class="form-group">
                            <label>Email<span class="text-hightlight"></span></label>
                            <?php 
                            $email = array(
                              	'name' 		=> 'email',		
                              	'readonly' 	=> true,	
                              	'class'     => 'form-control',
                              	'value'		=> $details->username,
                            );

                            ?>
                            <?php echo form_input($email);?>
                        </div>

                        <div class="form-group">
                            <label>Mobile<span class="text-hightlight"></span></label>
                            <?php 
                            $mobile = array(
                            	'name' 		=> 'mobile_number',	
                             	'class'     => 'form-control',
                              	'value'		=> $details->mobile_number,
                            );

                            ?>
                            <?php echo form_input($mobile);?>
                        </div>

                        <div class="form-group">
                            <label>Address<span class="text-hightlight"></span></label>
                            <?php 

                            $address = array(
                            	'name'		=> 'address',
                              	'class'       => 'form-control',
                              	'value'		=> $details->address,
                            );

                            ?>
                            <?php echo form_textarea($address);?>
                        </div>


						<?php echo form_hidden('id', $details->customer_profile_id); ; ?>

						
						<?php echo form_submit('editSubmit', 'EDIT',"class='btn btn-primary btn-lg'"); ?>
						
						

                    </div>

                    <?php echo form_close(); ?>


                    
                </div>
            </div>
            
        </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->
    
</div>
