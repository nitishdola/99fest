<style>
    #json-overlay {
        background-color: #111;
        opacity: 0.91;
        height: 40%;
    }
</style>
<div id="json-overlay" style="display:none"></div>
<div class="page-content" style="margin-top:6%;">
    <!-- ./page content wrapper -->
    
    <!-- page content wrapper -->
    <div class="page-content-wrap" style="padding:0 30px;">                    
        
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

                <?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'forgotPasswordForm');   
                    echo form_open_multipart("users/reset_new_password", $form_attributes);
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Chnage Password</strong> </h3>
                        
                    </div>
                    
                   
                    <div class="panel-body">                                                                        
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">New Password</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $new_data = array(
                                          'name'        => 'new',
                                          'id'          => 'new',
                                          'placeholder' => 'Enter new password',
                                          'class'       => 'form-control',
                                          'required'    => true,
                                        );

                                    ?>
                                    <?php echo form_password($new_data);?>
                                </div>                                            
                                <span class="help-block">Type new password</span>                                        
                            </div>
                        </div>

                    </div>


                    <div class="panel-body">                                                                        
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Confirm New Password</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <?php 
                                        $confirm_data = array(
                                          'name'        => 'new_confirm',
                                          'id'          => 'new_confirm',
                                          'placeholder' => 'Confirm new password',
                                          'class'       => 'form-control',
                                          'required'    => true,
                                        );

                                    ?>
                                    <?php echo form_password($confirm_data);?>
                                </div>                                            
                                <span class="help-block">Confirm new password</span>                                        
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                         <?php 
                            $email_data = array(
                              'name'        => 'email',
                              'type'          => 'hidden',
                              'required'    => true,
                              'value'       => $email,
                            );

                        ?>
                        <?php echo form_input($email_data);?>


                        <?php echo form_submit('addSubmit', 'Submit',"class='btn btn-success'"); ?>
                    </div>

                </div>
        </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->
</div>
