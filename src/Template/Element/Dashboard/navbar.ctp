<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <?php
        if (isset($this->layout) && $this->layout == 'dashboard') {
            ?>
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>
            <?php
        }
        ?>

        <div class="navbar-header pull-left">
            <?php echo $this->Html->link('<small><i class="fa fa-legal"></i> Auction</small>', array('controller' => 'Home', 'action' => 'index'), array('class' => 'navbar-brand', 'escape' => false)) ?>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <?php
                if (isset($loginUser['id']) && !empty($loginUser['id'])) {
                    ?>
                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <?php
                            if (isset($loginUser['image_path']) && !empty($loginUser['image_path'])) {
                                echo $this->Html->image('uploaded_images/users/' . $loginUser['image_path'], ['class' => 'nav-user-photo', 'alt' => "User's Photo"]);
                            } else {
                                echo $this->Html->image('blank_image.png', ['class' => 'nav-user-photo', 'alt' => "User's Photo"]);
                            }
                            ?>
                            <span class="user-info">
                                <small>Welcome,</small>
                                <?php echo $loginUser['name']; ?>
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <?php echo $this->Html->link('<i class="ace-icon fa fa-dashboard"></i>Dashboard', array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false)) ?>
                            </li>

                            <li>
                                <?php echo $this->Html->link('<i class="ace-icon fa fa-user"></i>Profile', array('controller' => 'Users', 'action' => 'view', $loginUser['id']), array('escape' => false)) ?>
                            </li>

                            <li class="divider"></li>

                            <li><?php echo $this->Html->link('<i class="ace-icon fa fa-power-off"></i>Logout', array('controller' => 'Users', 'action' => 'logout'), array('escape' => false)) ?></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <div class="cssmenu">
                        <ul>                        
                            <li><?php echo $this->Html->link('Log In', array('controller' => 'Users', 'action' => 'login')) ?></li> /
                            <li><?php echo $this->Html->link('Sign Up', array('controller' => 'Users', 'action' => 'login')) ?></li>
                        </ul>
                    </div> 
                    <?php
                }
                ?>               
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>











