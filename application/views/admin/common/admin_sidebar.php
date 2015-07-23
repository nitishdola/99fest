<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.html">ADMIN</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="assets/images/users/avatar.jpg" alt=""/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo asset_url(); ?>admin/assets/images/users/avatar.jpg" alt=""/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $display_name; ?></div>
                    <div class="profile-data-title"><?php if($is_admin): echo 'Administrator'; endif; ?></div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>                                                                        
        </li>
        <li class="xn-title">Navigation</li>
        <li class="active">
            <a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
        </li>                    
        <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Messages</span></a>
            <ul>
                <li>
                    <?php echo anchor('/messages/View', '<span class="fa fa-files-o"></span> <span class="xn-text">View All Messages', 'class="no-class"') ?>
                </li>
                <li>
                    <?php echo anchor('messages/send', '<span class="fa fa-files-o"></span> <span class="xn-text">Send', 'class="no-class"') ?>
                </li>
                <li>
                    <?php echo anchor('messages/address_book', '<span class="fa fa-files-o"></span> <span class="xn-text">Address Book', 'class="no-class"') ?>
                </li>
            </ul>
        </li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Vendor</span></a>
            <ul>
                <li>
                    <?php echo anchor('/vendors/view', '<span class="fa fa-files-o"></span> <span class="xn-text">View All Vendors', 'class="no-class"') ?>
                </li>
                <li>
                    <?php echo anchor('vendors/add', '<span class="fa fa-files-o"></span> <span class="xn-text">Add a Vendor', 'class="no-class"') ?>
                </li>
                <li><a href="pages-address-book.html"><span class="fa fa-users"></span>Add vendor category</a></li>
                
            </ul>
        </li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Events</span></a>
            <ul>
                <li>
                    <a href="pages-gallery.html"><span class="fa fa-image"></span> View all events</a>

                </li>
                <li>
                    <?php echo anchor('add-event-manager', '<span class="fa fa-user"></span> <span class="xn-text">Add Event Manager', 'class="no-class"') ?>
                </li>
                <li><a href="pages-address-book.html"><span class="fa fa-users"></span>Add event category</a></li>
            </ul>
        </li>
         <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Master Entry</span></a>
            <ul>
                <li>
                    <?php echo anchor('/states/add', '<span class="fa fa-files-o"></span> <span class="xn-text">Add a State', 'class="no-class"') ?>
                </li>
                <li>
                    <?php echo anchor('cities/add', '<span class="fa fa-files-o"></span> <span class="xn-text">Add a City', 'class="no-class"') ?>
                </li>
                <li>
                    <?php echo anchor('event_categories/add', '<span class="fa fa-files-o"></span> <span class="xn-text">Add a category', 'class="no-class"') ?>
                </li>
               
                
            </ul>
        </li>
                                            
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->