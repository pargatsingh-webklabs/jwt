<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="<?php echo FRONT_END_LAYOUT; ?>/assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Ticket System
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="<?php echo BASEURL; ?>">
                            <i class="material-icons">person</i>
                            <p>Add Tickets</p>
                        </a>
                    </li>
                    
                </ul>
                <ul class="nav">
                    <li class="active">
                        <a href="<?php echo BASEURL.'/home/list_tickets'; ?>">
                            <i class="material-icons">content_paste</i>
                            <p>List tickets</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Ticket System </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Logout</a>
                                    </li>
                                </ul>
                                <span>Admin</span>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
