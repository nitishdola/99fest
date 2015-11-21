<ul class="x-navigation">
    <li class="xn-logo">
        <a href="index.html">ATLANT</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="xn-profile">
     
        <div class="profile">
          
            <div class="profile-data">
                <div class="profile-data-name"><?php echo $display_name; ?></div>
                
            </div>
          
        </div>                                                                        
    </li>
    <li class="xn-title">Navigation</li>
    <li class="active">
        <?php echo anchor('/','<span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span>'); ?></a>                        
    </li>                    
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">EVENTS</span></a>
        <ul>
            <li><?php echo anchor('events/view-all','<span class="fa fa-image"></span> View All Events</a>') ?>
           
            
            <li class="xn-openable">
                <a href="#"><span class="fa fa-clock-o"></span> Event Manager</a>
                <ul>
                    <li><?php echo anchor('/event-managers/view-all','<span class="fa fa-image"></span> View All</a>') ?></li>
                    <li><?php echo anchor('/add-event-manager','<span class="fa fa-image"></span> Add</a>') ?></li>
                </ul>
            </li>                            
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Vendors</span></a>
        <ul>
            <li><?php echo anchor('/vendors/view','<span class="fa fa-image"></span> View All</a>') ?></li>
            
            <li><?php echo anchor('/vendors/add','<span class="fa fa-image"></span> Add New Vendor</a>') ?></li>
        
        </ul>
    </li>
    <li class="xn-title">Components</li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">States</span></a>                        
        <ul>
            <li><?php echo anchor('/states/add','<span class="fa fa-heart"></span> Add</a>') ?></li>                           
            <li><a href="#"><span class="fa fa-cogs"></span> View</a></li>
        </ul>
    </li> 
    <li class="xn-openable">
        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Cities</span></a>                        
        <ul>
            <li><?php echo anchor('/cities/add','<span class="fa fa-heart"></span> Add</a>') ?></li>                                                       
            <li><a href="#"><span class="fa fa-cogs"></span> View</a></li>
        </ul>
    </li> 

    <li class="xn-openable">
        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Default Images</span></a>                        
        <ul>
            <li><?php echo anchor('/add-default-image','<span class="fa fa-heart"></span> Add</a>') ?></li>                                                       
            <li><?php echo anchor('/view-default-images','<span class="fa fa-heart"></span> View</a>') ?></li>                                                       
        </ul>
    </li> 


    <li>
        <?php echo anchor('event_categories/add', '<span class="fa fa-files-o"></span> <span class="xn-text">Add a category', 'class="no-class"') ?>
    </li>
</ul>