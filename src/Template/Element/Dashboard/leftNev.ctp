<div id="sidebar" class="sidebar responsive ace-save-state">
    <ul class="nav nav-list">
        <li class="">
            <?php echo $this->Html->link('<i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard </span>', array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false)) ?>
            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-barcode"></i>
                <span class="menu-text"> Products </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add Product
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View Product
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        History of Products
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gavel"></i>
                <span class="menu-text"> Auction </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add Auction
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View Auction
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        History of Auction
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Users </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>Add User', array('controller' => 'Users', 'action' => 'add'), array('escape' => false)) ?>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>View User', array('controller' => 'Users', 'action' => 'index'), array('escape' => false)) ?>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        History of Users
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>



