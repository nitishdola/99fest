<?php
session_start();
$_SESSION['username'] = "johndoe" // Must be already set
?>
 <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>js/chat.js"></script>
 <link href="<?php echo asset_url(); ?>css/chat.css" rel="stylesheet">
 <link href="<?php echo asset_url(); ?>css/screen.css" rel="stylesheet">
<style>
.btn-facebook{
    background: #3B5998;
    color:#FFF;
}
.btn-facebook:hover{
    background: #3B5998;
    color:#FFF;
}
.btn-google{
    background: #DD4B39;
    color:#FFF;
}
.btn-google:hover{
    background: #DD4B39;
    color:#FFF;
}

  @media only screen and (max-width : 540px) 
            {
                .chat-sidebar
                {
                    display: none !important;
                }
                
                .chat-popup
                {
                    display: none !important;
                }
            }
            
            body
            {
                background-color: #e9eaed;
            }
            
            .chat-sidebar
            {
                width: 200px;
                position: fixed;
                height: 82%;
                right: 0px;
                bottom: 0px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #e9eaed;
                border: 1px solid rgba(29, 49, 91, .3);
            }
            
            .sidebar-name 
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }
            
            .sidebar-name span
            {
                padding-left: 5px;
            }
            
            .sidebar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }
            
            .sidebar-name:hover
            {
                background-color:#e1e2e5;
            }
            
            .sidebar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }
            
    </style>
 







            
<!-- page content -->
<!--<div class="row">
 <form action ="<?=base_url()?>messages/example" method="post" id="searchform">
        Search:&nbsp;<input type="text" name="searchterm" id="searchterm"  />&nbsp;
        <input type="submit" value="Search >>" id="submit" />
       
    </form>
   
    </div>-->
    


     <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder padding-v-20">
                        
                      
                        
                    </div>
                    <!-- ./page content holder -->
                </div>

     <div class="modal fade"   id="messageModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="loginModalLabel">Message Panel</h4>
          </div>
          <div class="modal-body">
            

            <div class="row" id="login">

           <form>   
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Subject</label>
                <div class="col-md-8 col-xs-12">                                            
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <?php 
                            $subject = array(
                              'name'        => 'subject',
                              'id'          => 'subject',
                              'placeholder' => 'Type Your Subject ',
                              'class'       => 'form-control',
                            );

                        ?>
                        <?php echo form_input($subject);?>
                    </div>                                            
                    <span class="help-block"></span>                                        
                </div>
            </div>

            <div class="form-group">
                 <label class="col-md-3 col-xs-12 control-label">Message</label>
                      <div class="col-md-6 col-xs-12">
                            <?php 
                                    $messages = array(
                                      'name'        => 'message',
                                      'rows'        => '4',
                                      'id'          => 'message',
                                      'placeholder' => 'Type Your  Message',
                                      'class'       => 'form-control',
                                    );

                                ?>
                            <?php echo form_textarea($messages);?>
                         <span class="help-block"></span>                                        
                      </div>
                </div>
                <?php $customerId = $this->ion_auth->get_user_id();?>

                    <?php 
                    $vendor_id = array(
                        'type'  => 'hidden',
                        'name'  => 'vendor_id',
                        'id'    => 'vendor_id'
                    );
                    ?>
                    <?php echo form_input($vendor_id); ?>
                    <input type="button" value="Send" class="btn btn-primary" id="sendMessage"></button>
                     <div id="remove_loader" style="display:none;">
                          <img id="loading-image"  src="<?php echo asset_url().'img/remove_loders.gif';?>" alt="Removig from cart, please wait..." />
                        </div>
                   
                   </form>
                 

                </div>

                
            </div>

          </div>
          
        </div>
      </div>
    </div>






 <div class="content-frame">
   <div class="content-frame-top">                        
         <div class="page-title">   
        
        
                    <h3></span> View Cart</h3>
                </div>                                      
          </div>
 <div class="content-frame-body content-frame-body-left">
    <div class="panel panel-default">
        <div class="panel-body">
        <div class="chat-sidebar">
         <?php if(!empty($details)) { ?>

                  <?php foreach( $details as $k => $data ) { ?>   
         
            <div class="sidebar-name">
                <!-- Pass username and display name to register popup -->
                <?php $vendor_name = $data["name"];

                $vendor_name = str_replace(' ', '', $vendor_name); ?>   

                 
                          
                <a href="javascript:void(0)"  onclick="javascript:chatWith('<?php echo $vendor_name?>')"><?php echo $data['name']; ?></a>
                    
                    <span></span>
                
            </div>
            <script type="text/javascript">

            </script>

           
        
              <?php } ?>    
          <?php } ?>  
           </div>      
          
                <?php if(!empty($details)) { ?>

                  <?php foreach( $details as $k => $data ) { ?>          
                     <div class="col-md-7" id="bid_<?php echo $k; ?>">
                        <div id="content_<?php echo $k; ?>">
                          <p><?php echo 'Name:    '?><?php echo $data['name']; ?></p>
                          <p><?php echo 'Price:    '?><?php echo $data['price']; ?></p>
                          <p><div><a href="#" data-toggle="modal" class="message-vendor" data-target="#messageModal" id="<?php echo $data['id']?> ">Messages</a>
                          <a href="#" class="remove_vendor" id="remove_<?php echo $k; ?>">Remove</a></div></p>
                        </div>

                        <div id="remove_loader_<?php echo $k; ?>" style="display:none;">
                        <img id="loading-image"  src="<?php echo asset_url().'img/remove_loders.gif';?>" alt="Removig from cart, please wait..." />
                        </div>
                 </div>

            
        <?php } ?>
    
    <?php } else { ?>
        <div class="col-md-12">
            No results found !
        </div>
    <?php } ?>
     

            
         </div>
      </div>
    </div>

    
    
</div>
 
         
    <!-- ./page content holder -->
</div>
    
    
    
</div>
<!-- ./page content -->