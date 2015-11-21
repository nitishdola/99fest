<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <!-- TOGGLE NAVIGATION -->
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <!-- END TOGGLE NAVIGATION -->
    <!-- SIGN OUT -->
    <li class="xn-icon-button pull-right">
        
        <?php echo anchor('/logout','<span class="fa fa-sign-out"></span>'); ?></a>                        
    </li> 
    <!-- END SIGN OUT -->
    
    
</ul>
<!-- END X-NAVIGATION VERTICAL -->                     

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li class="active">Dashboard</li>
</ul>
<!-- END BREADCRUMB -->                       

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    
    
    <div class="row">
        <div class="col-md-4">
            
            <!-- START SALES & EVENTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Upcoming events</h3>
                        
                    </div>
                   
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END SALES & EVENTS BLOCK -->
            
        </div>
        <div class="col-md-4">
            
            <!-- START USERS ACTIVITY BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Recent Event Managers</h3>
                        
                    </div>                                    
                                                        
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                </div>                                    
            </div>
            <!-- END USERS ACTIVITY BLOCK -->
            
        </div>
        <div class="col-md-4">
            
            <!-- START VISITORS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Recent Vendors</h3>
                        
                    </div>
                    
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END VISITORS BLOCK -->
            
        </div>
    </div>
    
</div>