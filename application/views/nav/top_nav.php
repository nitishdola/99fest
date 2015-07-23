<!-- nav mobile bars -->
<div class="navigation-toggle">
    <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
</div>
<!-- ./nav mobile bars -->

<!-- navigation -->
<ul class="navigation">
    <li>
        <a href="#">Home</a>
        <ul>
            <li><a href="index.html">With Slider</a></li>
            <li><a href="index-default.html">Default</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Pages</a>
        <ul>
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="pricing.html">Pricing</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Blog</a>
        <ul>
            <li><a href="blog-grid.html">Blog Grid</a></li>
            <li><a href="blog-post.html">Blog Post</a></li>                                
        </ul>
    </li>
    <li>
        <a href="#">Portfolio</a>
        <ul>
            <li><a href="portfolio-with-title.html">Portfolio With Title</a></li>
            <li><a href="portfolio-2column.html">Portfolio 2 Column</a></li>
            <li><a href="portfolio-3column.html">Portfolio 3 Column</a></li>
            <li><a href="portfolio-4column.html">Portfolio 4 Column</a></li>
        </ul>
    </li>
    <li><a href="../html/index.html">Admin Template</a></li>
    <!--<li><a href="<?php //echo site_url('auth/login') ?>">Sign In</a></li>-->
    <?php if($login) { ?>
    <li><a href="#">Hello <?php echo ucfirst($display_name); ?></a>
        <ul>
            <?php if($is_customer) { ?>
            <li><a href="portfolio-with-title.html">Bookings</a></li>
            <li><?php echo anchor('customers/profile', 'Profile', 'class="no-class"') ?></li>
            <?php } ?>

            <?php if($is_admin) { ?>
            <li><?php echo anchor('/admin', 'Admin Profile', 'class="no-class"') ?></li>
            <?php } ?>

            <li>
            <?php echo anchor('users/logout', 'Log Out', 'class="no-class"') ?></li>
        </ul>
    </li>
    <?php }else{ ?>
    <li><a href="#" data-toggle="modal" data-target="#loginModal">Sign In</a></li>
    <?php } ?>
    
</ul>
<!-- ./navigation -->  