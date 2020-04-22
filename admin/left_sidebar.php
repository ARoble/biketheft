<div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                  
                    <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0"><?php echo  $_SESSION['admin_full_name'] ?></h6>
                        <span class="pro-user-desc">Badge No: <?php echo  $_SESSION['badge_no'] ?></span>
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">
                            <a href="edit_profile.php" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>Edit Account</span>
                            </a>

							<a href="change_password.php" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>Change Password</span>
                            </a>
							
							
                            <div class="dropdown-divider"></div>

                            <a href="logout.php" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="index.php">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
							<li>
                                <a href="reported_bikes.php">
                                    <i data-feather="list"></i>
                                    <span> Reported bike theft </span>
                                </a>
                            </li>
							 <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="user"></i>
                                    <span> Users </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="user_list.php">User List</a>
                                    </li>
                                    <li>
                                        <a href="add_user.php">Add new</a>
                                    </li>
                                </ul>
                            </li>
							<li>
                                <a href="send_emails.php">
                                    <i data-feather="send"></i>
                                    <span> Send Emails </span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>