<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <?php echo $this->Html->link('<small><i class="fa fa-leaf"></i>Auction Admin</small>', array('controller' => 'Dashboard', 'action' => 'index'), array('class' => 'navbar-brand', 'escape' => false)) ?>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <?php echo $this->Html->image('user.png', ['class' => 'nav-user-photo', 'alt' => "User's Photo"]); ?>
                        <span class="user-info">
                            <small>Welcome,</small>
                            <?php echo $loginUser['name']; ?>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="profile.html">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li><?php echo $this->Html->link('<i class="ace-icon fa fa-power-off"></i>Logout', array('controller' => 'Users', 'action' => 'logout'), array('escape' => false)) ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>











