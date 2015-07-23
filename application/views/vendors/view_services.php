<div class="page-content">    

    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
        </li>
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
            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
        </li> 
        <!-- END SIGN OUT -->
        <!-- MESSAGES -->
        <li class="xn-icon-button pull-right">
            <a href="#"><span class="fa fa-comments"></span></a>
            <div class="informer informer-danger">4</div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                    <div class="pull-right">
                        <span class="label label-danger">4 new</span>
                    </div>
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
                    </a>
                </div>     
                <div class="panel-footer text-center">
                    <a href="pages-messages.html">Show all messages</a>
                </div>                            
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
                        <span class="label label-warning">3 active</span>
                    </div>
                </div>
                <div class="panel-body list-group scroll" style="height: 200px;">                                
                    <a class="list-group-item" href="#">
                        <strong>Phasellus augue arcu, elementum</strong>
                        <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                        </div>
                        <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                    </a>
                    <a class="list-group-item" href="#">
                        <strong>Aenean ac cursus</strong>
                        <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                        </div>
                        <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                    </a>
                    <a class="list-group-item" href="#">
                        <strong>Lorem ipsum dolor</strong>
                        <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                        </div>
                        <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                    </a>
                    <a class="list-group-item" href="#">
                        <strong>Cras suscipit ac quam at tincidunt.</strong>
                        <div class="progress progress-small">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                        </div>
                        <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                    </a>                                
                </div>     
                <div class="panel-footer text-center">
                    <a href="pages-tasks.html">Show all tasks</a>
                </div>                            
            </div>                        
        </li>
        <!-- END TASKS -->
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                     
    
    <!-- START BREADCRUMB -->
   
    <!-- END BREADCRUMB -->                
                    
    <!-- START CONTENT FRAME -->
    >
        <!-- END CONTENT FRAME LEFT -->
        
        <!-- START CONTENT FRAME BODY -->


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <?php if(@$_GET['msg']!=''){ ?>
  <center>
  <div id="sc" class="alert alert-success" style="width:500px; float:center; font-family:Segoe UI">  
  <a  onclick="$('#sc').hide()" class="close" data-dismiss="alert" style="float:right; cursor:pointer"><span id="success" >X</span></a>  
  <strong>Success!</strong> <?php echo base64_decode(@$_GET['msg']);?>.
</div>
  </center>
<?php } ?>

                                <div class="panel-heading">
                                    <h3 class="panel-title">Vendor Details</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                    
                                   <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Servce Name</th>
                                                    <th>Rate</th>
                                                    
                                                    <th >Edit</th>
                                                    <th>Remove</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody> 
                                          <?php foreach($services as $k => $v){ ?>   
                                                                              
                                                <tr id="trow_1">

                                                    <td> <?php echo $k+1; ?></td>
                                                    <td><strong><?php echo ucfirst(strtolower($v->cname)); ?></strong></td>
                                                    <td><strong><?php echo ($v->type_name); ?></strong></td>
                                                    <td><strong><?php echo($v->rate); ?></strong></td>
                                                   
                                                    
                                                    <td><button class="btn btn-default btn-rounded btn-sm"> <a  title="View Vendor" target="_blank" href=""><span class="fa fa-pencil"></span></i></a></button></td>
                                                    <td><button class="btn btn-default btn-rounded btn-sm"><a  title="Delete Vendor" target="_blank" href=""><span class="fa fa-times"></span></button></a></button>
             
                                                    </td>
                                                </tr>
                                                 <?php } ?>  
                                                
                                            </tbody>
                                        </table>
                                        <div class="panel-footer">                                
                                                     
                    
                       
                       <ul class="pagination pagination-sm pull-right">
                     
                           <li class="active"><?php //echo $links; ?></li>
                    
                    </ul>
                </div>                  
                                
                                    </div>                                

                                </div>
                            </div>                                                

                        </div>
                    </div>



        
                    <!--
                    <div class="mail-item mail-unread mail-danger">                                    
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">John Doe</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">New Windows 9 App</a>                                    
                        <div class="mail-date">Today, 10:36</div>
                    </div>
                    
                    <div class="mail-item mail-success">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">Nadia Ali</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">Check my new song</a>                                    
                        <div class="mail-date">Yesterday, 20:19</div>
                    </div>
                    
                    <div class="mail-item mail-warning">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star starred">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">Brad Pitt</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">How are you? Need some work?</a>                                    
                        <div class="mail-date">Sep 15</div>
                    </div>
                    
                    <div class="mail-item mail-info">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">Dmitry Ivaniuk</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">Can you check this docs?</a>                                    
                        <div class="mail-date">Sep 14</div>
                        <div class="mail-attachments">
                            <span class="fa fa-paperclip"></span> 11Kb
                        </div>
                    </div>
                    
                    <div class="mail-item">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star starred">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">HTC</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">New updates on your phone HD7</a>
                        <div class="mail-date">Sep 13</div>
                        <div class="mail-attachments">
                            <span class="fa fa-paperclip"></span> 58Mb
                        </div>
                    </div>
                    
                    <div class="mail-item mail-unread">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">Unknown</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">You won $15,000,000</a>
                        <div class="mail-date">Sep 13</div>
                    </div>
                    
                    <div class="mail-item mail-success">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">Nadia Ali</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">Your tickets</a>
                        <div class="mail-date">Sep 11</div>
                        <div class="mail-attachments">
                            <span class="fa fa-paperclip"></span> 1.2Mb
                        </div>
                    </div>
                    
                    <div class="mail-item mail-info">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">Dmitry Ivaniuk</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">New bug founded</a>
                        <div class="mail-date">Sep 11</div>
                    </div>
                    
                    <div class="mail-item">
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">Darth Vader</div>                                    
                        <a href="pages-mailbox-message.html" class="mail-text">Where drawings of the new spaceship?</a>
                        <div class="mail-date">Sep 10</div>
                    </div> 
                    -->                 
                    
                </div>
                 
            </div>
            
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME -->
    
</div>            
<!-- END PAGE CONTENT -->
