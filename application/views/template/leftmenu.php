<?php $user_data = $this->session->all_userdata(); ?>
<?php if ($permission == 2) { ?>
    <div class="sidebar-menu">


        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="<?php echo base_url(); ?>dashboard/index">
                    <img src="<?php echo base_url(); ?>/assets/images/servicegenerator.png" height="100px" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->

            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>



            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>

        <div class="sidebar-user-info">

            <div class="sui-normal">
                <a href="#" class="user-link">
                    <img src="<?php echo base_url(); ?>uploads/<?php echo $user_data['logged_in']['id'] ?>.jpg" alt="" class="img-circle" />


                    <strong><?php
                        echo $user_data['logged_in']['name'];
                        ?></strong> <span><?php if ($user_data['logged_in']['permission'] == 0) {
                        echo "The Developer";
                    } elseif ($user_data['logged_in']['permission'] == 1) {
                        echo "The Moderator";
                    } else {
                        echo "The Admin";
                    } ?></span>
                </a>
            </div>

            <div class="sui-hover animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->				

                <a href="<?php echo base_url(); ?>user/editprofile">
                    <i class="entypo-vcard"></i>
                    Edit Profile
                </a>

                <a href="<?php echo base_url(); ?>user/changepic">
                    <i class="entypo-user"></i>
                    Change Profile Picture
                </a>

                <a href="<?php echo base_url(); ?>user/editpassword">
                    <i class="entypo-key"></i>
                    Change Password
                </a>



                <a href="<?php echo base_url(); ?>user/logout">
                    <i class="entypo-logout"></i>
                    LogOut
                </a>

                <span class="close-sui-popup">&times;</span><!-- this is mandatory -->			</div>
        </div>



        <ul id="main-menu" class="multiple-expanded">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

            <li class="active">
                <a href="<?php echo base_url(); ?>dashboard/index">
                    <i class="entypo-gauge"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>service_generator/index">
                    <i class="entypo-monitor"></i>
                    <span>Generator</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>dataviewer/index">
                    <i class="entypo-doc-text"></i>
                    <span>Data viewer</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>user_list/index">
                    <i class="entypo-users"></i>
                    <span>Users List</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>api_list/index">
                    <i class="entypo-tools"></i>
                    <span>API List</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="#">
                    <i class="entypo-docs"></i>
                    <span>Tickets</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>ticket/newticket">
                            <i class="entypo-doc"></i>
                            <span>New Ticket</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>ticket/listticket">
                            <i class="entypo-book-open"></i>
                            <span>List Ticket</span>
                        </a>
                    </li>
                    <!--                    <li>
                                            <a href="<?php //echo base_url();  ?>user/editpassword">
                                                <i class="entypo-key"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>-->
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <i class="entypo-cog"></i>
                    <span>Profile Setting</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>user/editprofile">
                            <i class="entypo-vcard"></i>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>user/changepic">
                            <i class="entypo-user"></i>
                            <span>Change Profile Picture</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>user/editpassword">
                            <i class="entypo-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>user/logout">
                    <i class="entypo-logout"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
    </li>
    </ul>

    </div>
<?php } else { ?>

    <div class="sidebar-menu">


        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="<?php echo base_url(); ?>dashboard/index">
                    <img src="<?php echo base_url(); ?>/assets/images/servicegenerator.png" height="100px" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->

            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>



            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <div class="sidebar-user-info">

            <div class="sui-normal">
                <a href="#" class="user-link">
                    <img src="<?php echo base_url(); ?>uploads/<?php echo $user_data['logged_in']['id'] ?>.jpg" alt="" class="img-circle" />

                    <strong><?php
    echo $user_data['logged_in']['name'];
    ?></strong> <span><?php if ($user_data['logged_in']['permission'] == 0) {
        echo "The Developer";
    } elseif ($user_data['logged_in']['permission'] == 1) {
        echo "The Moderator";
    } else {
        echo "The Admin";
    } ?></span>
                </a>
            </div>

            <div class="sui-hover animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->				

                <a href="<?php echo base_url(); ?>user/editprofile">
                    <i class="entypo-vcard"></i>
                    Edit Profile
                </a>

                <a href="<?php echo base_url(); ?>user/changepic">
                    <i class="entypo-user"></i>
                    Change Profile Picture
                </a>

                <a href="<?php echo base_url(); ?>user/editpassword">
                    <i class="entypo-key"></i>
                    Change Password
                </a>



                <a href="<?php echo base_url(); ?>user/logout">
                    <i class="entypo-logout"></i>
                    LogOut
                </a>

                <span class="close-sui-popup">&times;</span><!-- this is mandatory -->			</div>
        </div>



        <ul id="main-menu" class="multiple-expanded">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

            <li class="active">
                <a href="<?php echo base_url(); ?>dashboard/index">
                    <i class="entypo-gauge"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>dataviewer/index">
                    <i class="entypo-doc-text"></i>
                    <span>Data viewer</span>
                </a>

            </li>
            <li>
                <a href="<?php echo base_url(); ?>api_list/index">
                    <i class="entypo-tools"></i>
                    <span>API List</span>
                </a>
            </li>
            <li class="has-sub">
               <a href="#">
                    <i class="entypo-docs"></i>
                    <span>Tickets</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>ticket/newticket">
                            <i class="entypo-doc"></i>
                            <span>New Ticket</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>ticket/listticket">
                            <i class="entypo-book-open"></i>
                            <span>List Ticket</span>
                        </a>
                    </li>
                    <!--                    <li>
                                            <a href="<?php //echo base_url();  ?>user/editpassword">
                                                <i class="entypo-key"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>-->
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <i class="entypo-cog"></i>
                    <span>Profile Setting</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>user/editprofile">
                            <i class="entypo-vcard"></i>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>user/changepic">
                            <i class="entypo-user"></i>
                            <span>Change Profile Picture</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>user/editpassword">
                            <i class="entypo-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>user/logout">
                    <i class="entypo-logout"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
    </li>
    </ul>

    </div>

    <?php
}?>