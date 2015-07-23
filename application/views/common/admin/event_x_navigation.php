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
        <?php echo anchor('/event_managers/profile','<span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span>'); ?></a>                        
    </li> 
    <li class="xn-openable">
        <a href="#"><span class="fa fa-clock-o"></span> Events</a>
        <ul>
            <li><?php echo anchor('/events/add','<span class="fa fa-image"></span>Add Event</a>') ?></li>
            <li><?php echo anchor('#','<span class="fa fa-image"></span> View All Events</a>') ?></li>
            <li><?php echo anchor('/events/create_tickets','<span class="fa fa-image"></span> Add Tickets</a>') ?></li>
            <li><?php echo anchor('/event_managers/add_sponsors','<span class="fa fa-image"></span> Add Sponsors</a>') ?></li>
            
        </ul>
    </li>                    
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Gallery</span></a>
        <ul>
            <li><?php echo anchor('event_managers/event_image_gallery_upload','<span class="fa fa-image"></span> Upload Image</a>') ?> 
            <li><?php echo anchor('event_managers/event_video_gallery_upload','<span class="fa fa-image"></span> Upload Videos</a>') ?>                                                  
        </ul>
    </li>
     
</ul>