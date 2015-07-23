
        
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
			<?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'ticketaddform');	
				echo form_open("events/post_review", $form_attributes);
			?>
            <div class="panel panel-default">
                <h3 class="panel-title"><strong>Add Event Infromation</strong> </h3>
                
                <div class="panel-body">  

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Title</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php 
                                    $review_title_data = array(
                                      'name'        => 'title',
                                      'id'          => 'title',
                                      'placeholder' => 'Enter title',
                                      'class'       => 'form-control',
                                    );

                                ?>
                                <?php echo form_input($review_title_data);?>
                            </div>                                            
                            <span class="help-block"></span>                                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Review</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php 
                                    $review_data = array(
                                      'name'        => 'review',
                                      'id'          => 'review',
                                      'placeholder' => '',
                                      'class'       => 'form-control',
                                    );

                                ?>
                                <?php echo form_textarea($review_data);?>
                            </div>                                            
                            <span class="help-block"></span>                                        
                        </div>
                    </div>

                   
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>  
                    <?php 
                        $slug_data = array(
                          'name'        => 'slug',
                          'id'          => 'slug',
                          'type'        => 'hidden',
                          'class'       => 'form-control',
                          'value'       => $slug,
                        );

                    ?>
                    <?php echo form_input($slug_data);?>                                  
                    <?php echo form_submit('addSubmit', 'Submit',"class='btn'"); ?>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>                    
</div>  