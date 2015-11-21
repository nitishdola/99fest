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

            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                    </li> 
            <!-- END SIGN OUT -->
            
            
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


                        
                    
					<?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'defaultImageAddFrom2');	
						echo form_open_multipart("admin/upload_default_image", $form_attributes);
                           

					?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add default featured image</strong> </h3>
                            
                        </div>
                      
                        
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Type</label>
                                <div class="col-md-6 col-xs-12">                                                                                                                                     
                                    <?php 
                                    $type['-1'] = 'Select Type';
                                    $type['1'] = 'Vendor';
                                    $type['2'] = 'Event';

                                            
                                        ?>
									<?php echo form_dropdown('type', $type, -1,'class="form-control required" id="type"'); ?>
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
                                    <span class="help-block" id="help"></span>                                        
                                </div>
                            </div>


                            
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-default bbb">Clear Form</button>                                    
                            <?php echo form_submit('addSubmit', 'Submit',"class='btn' id='addDefaultSubmit'"); ?>
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>                    
        </div>