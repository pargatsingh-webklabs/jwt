<?php $userdata=$this->session->userdata("userdata"); ?>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <a class="toggle-nav btn pull-left margin-right-10" href="#">
            <i class="icon-reorder"></i>
        </a>
        <a class="navbar-brand " href="<?php echo BASEURL; ?>">
            <img class="logo" alt="logo" src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/logo-dashbord.png">
            <img class="logo-xs" alt="logo-xs" src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/logo-xs.png">
        </a>
        
        <ul class="nav hidden-xs">

            <li class="dropdown medium only-icon widget">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>
                    <div class="label"><!--2 --></div>
                </a>
                <ul class="dropdown-menu">
                    <!-- <li>
                        <a href="#">
                            <div class="widget-body">
                                <div class="pull-left icon">
                                    <i class="icon-user text-success"></i>
                                </div>
                                <div class="pull-left text">
                                    John Doe signed up
                                    <small class="text-muted">just now</small>
                                </div>
                            </div>
                        </a>
                    </li> -->
                    <li class="divider"></li>

                    <li class="widget-footer">
                        <a href="#">No notifications</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown dark user-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img alt="<?php echo $userdata['fname'].' '.$userdata['lname']; ?>" src="<?php echo BASEURL;?>/assets/users/profilepictures/<?php echo $userdata['image'];?>"<?php //echo BASEURL; ?>/assets/users/profilepictures/<?php //echo $userdata['image']; ?> height="23" width="23" class="img-circle">
                    <span class="user-name"><?php echo "@" . $userdata['nick_name']; ?></span>
                   <!-- <b class="caret"></b> -->
                </a>
               <!-- <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo BASEURL; ?>/account/dashboard">
                            <i class="icon-user"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="#" data-target="#change_password" data-toggle="modal">
                            <i class="icon-cog"></i>
                            Change password
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo BASEURL; ?>/users/logout">
                            <i class="icon-signout"></i>
                            Sign out
                        </a>
                    </li>
                </ul> -->
            </li>
        </ul>
        <form action="search_results.html" class="navbar-form navbar-right " method="get">
            <button class="btn btn-link icon-search" name="button" type="submit"></button>
            <div class="form-group">
                <input class="" placeholder="Search..." autocomplete="off" id="q_header" name="q" type="text" >
            </div>
        </form>
    </nav>
</header>