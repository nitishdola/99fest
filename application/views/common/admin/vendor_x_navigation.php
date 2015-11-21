
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    
                    <li class="xn-profile">
                        
                        <div class="profile">
                            
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $display_name; ?></div>
                                <div class="profile-data-title"><?php if($is_admin): echo 'Administrator'; endif; ?></div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                                       
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Profile</span></a>
                        <ul>
                            <li>
                                <?php echo anchor('#', '<span class="fa fa-files-o"></span> <span class="xn-text">View All Messages', 'class="no-class"') ?>
                            </li>
                            <li>
                                <?php echo anchor('vendors/profile', '<span class="fa fa-files-o"></span> <span class="xn-text">My Profile', 'class="no-class"') ?>
                            </li>
                            <li>
                                <?php echo anchor('users/change_password', '<span class="fa fa-files-o"></span> <span class="xn-text">Change Password', 'class="no-class"') ?>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Catering</span></a>
                        <ul>
                             <li>
                                <?php echo anchor('vendors/vendor_catering', '<span class="fa fa-files-o"></span> <span class="xn-text">Add Catering ', 'class="no-class"') ?>
                            </li>
                             <li>
                                <?php echo anchor('vendors/view_all_catering', '<span class="fa fa-files-o"></span> <span class="xn-text">View all catering', 'class="no-class"') ?>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Studio and Photography</span></a>
                        <ul>
                             <li>
                                <?php echo anchor('vendors/photo_studio', '<span class="fa fa-files-o"></span> <span class="xn-text">Add Studio and Photography Information ', 'class="no-class"') ?>
                            </li>
                             <li>
                                <?php echo anchor('vendors/view_all_studio', '<span class="fa fa-files-o"></span> <span class="xn-text">View all Studio and Photography', 'class="no-class"') ?>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Venue</span></a>
                        <ul>
                             <li>
                                <?php echo anchor('vendors/venue_information', '<span class="fa fa-files-o"></span> <span class="xn-text">Add Venue ', 'class="no-class"') ?>
                            </li>
                             <li>
                                <?php echo anchor('vendors/view_all_venues', '<span class="fa fa-files-o"></span> <span class="xn-text">View all Venues', 'class="no-class"') ?>
                            </li>
                            
                        </ul>
                    </li>

                    

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Images</span></a>
                        <ul>
                            <li>
                                <?php echo anchor('vendors/view_images', '<span class="fa fa-files-o"></span> <span class="xn-text">View', 'class="no-class"') ?>
                            </li>
                            <li>
                                <?php echo anchor('vendors/upload_image', '<span class="fa fa-files-o"></span> <span class="xn-text">Upload Image', 'class="no-class"') ?>
                            </li>
                             <li>
                                <?php echo anchor('vendors/vendorpanel', '<span class="fa fa-files-o"></span> <span class="xn-text">Chat with Customer', 'class="no-class"') ?>
                            </li>
                        </ul>
                    </li>                            
                </ul>
                <!-- END X-NAVIGATION -->