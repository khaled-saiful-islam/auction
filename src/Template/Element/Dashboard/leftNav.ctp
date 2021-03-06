<?php $user = $this->Common->findUser($loginUser['id']); ?>
<div id="sidebar" class="sidebar responsive ace-save-state">
    <ul class="nav nav-list">
        <?php if (($user['type'] == 1 && $user['payment'] == 0) || ($user['type'] > 1 && $user['payment'] != 0)) { ?>
            <li class="">
                <?php echo $this->Html->link('<i class="menu-icon fa fa-home"></i><span class="menu-text"> Home </span>', array('controller' => 'Home', 'action' => 'index'), array('escape' => false)) ?>
                <b class="arrow"></b>
            </li>        
            <li class="">
                <?php echo $this->Html->link('<i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard </span>', array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false)) ?>
                <b class="arrow"></b>
            </li>
        <?php } ?>

        <?php if ($loginUser['level'] <= 20) { ?>
            <li class="<?php echo (isset($leftNavActive['category']) && $leftNavActive['category']) ? "active open" : "" ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-tag"></i>
                    <span class="menu-text"> Categories </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <?php if ($loginUser['level'] <= 10) { ?>
                        <li class="<?php echo (isset($leftNavActive['categoryAdd']) && $leftNavActive['categoryAdd']) ? "active" : "" ?>">
                            <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Add Category', array('controller' => 'Categories', 'action' => 'add'), array('escape' => false)) ?>
                            <b class="arrow"></b>
                        </li>
                    <?php } ?>

                    <li class="<?php echo (isset($leftNavActive['categoryIndex']) && $leftNavActive['categoryIndex']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>View Categories', array('controller' => 'Categories', 'action' => 'index'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>

                                                                                            <!--                    <li class="<?php echo (isset($leftNavActive['categoryAll']) && $leftNavActive['categoryAll']) ? "active" : "" ?>">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>All Categories', array('controller' => 'Categories', 'action' => 'all'), array('escape' => false)) ?>
                                                                                                                    <b class="arrow"></b>
                                                                                                                </li>-->
                </ul>
            </li>
        <?php } ?>

        <?php if ($loginUser['level'] < 21) { ?>
            <li class="<?php echo (isset($leftNavActive['product']) && $leftNavActive['product']) ? "active open" : "" ?>">    
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-barcode"></i>
                    <span class="menu-text"> Products </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="<?php echo (isset($leftNavActive['productAdd']) && $leftNavActive['productAdd']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Add Product', array('controller' => 'Products', 'action' => 'add'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>

                    <li class="<?php echo (isset($leftNavActive['productIndex']) && $leftNavActive['productIndex']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>View Products', array('controller' => 'Products', 'action' => 'index'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        <?php } ?>

        <?php if ($loginUser['level'] < 21) { ?>
            <li class="<?php echo (isset($leftNavActive['user']) && $leftNavActive['user']) ? "active open" : "" ?>">    
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text"> Users </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="<?php echo (isset($leftNavActive['userAdd']) && $leftNavActive['userAdd']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Add User', array('controller' => 'Users', 'action' => 'add'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>

                    <li class="<?php echo (isset($leftNavActive['userIndex']) && $leftNavActive['userIndex']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>View Users', array('controller' => 'Users', 'action' => 'index'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <?php if ($loginUser['level'] > 20) { ?>
            <?php if (($user['type'] == 1 && $user['payment'] == 0) || ($loginUser['type'] > 1 && $user['payment'] != 0)) { ?>
                <li class="<?php echo (isset($leftNavActive['bookmark']) && $leftNavActive['bookmark']) ? "active" : "" ?>">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-bookmark"></i><span class="menu-text"> Bookmarks </span>', array('controller' => 'Bookmarks', 'action' => 'index'), array('escape' => false)) ?>
                    <b class="arrow"></b>
                </li>
                <?php
            }
        }
        ?>

        <?php if ($loginUser['level'] < 21) { ?>
            <li class="<?php echo (isset($leftNavActive['settings']) && $leftNavActive['settings']) ? "active open" : "" ?>">    
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-cogs"></i>
                    <span class="menu-text"> Settings </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="<?php echo (isset($leftNavActive['sliderAdd']) && $leftNavActive['sliderAdd']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Add Slider', array('controller' => 'Sliders', 'action' => 'add'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>

                    <li class="<?php echo (isset($leftNavActive['sliderIndex']) && $leftNavActive['sliderIndex']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>View Sliders', array('controller' => 'Sliders', 'action' => 'index'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>

                    <li class="<?php echo (isset($leftNavActive['nivoSliderAdd']) && $leftNavActive['nivoSliderAdd']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Add Nivo Slider', array('controller' => 'Sliders', 'action' => 'addNivoSlider'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>

                    <li class="<?php echo (isset($leftNavActive['nivoSliderIndex']) && $leftNavActive['nivoSliderIndex']) ? "active" : "" ?>">
                        <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>View Nivo Sliders', array('controller' => 'Sliders', 'action' => 'nivoIndex'), array('escape' => false)) ?>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        <?php } ?>
    </ul><!-- /.nav-list -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>



