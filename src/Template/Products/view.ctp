<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-barcode home-icon"></i>
                    <?php echo $this->Html->link('Products', array('controller' => 'Products', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">View Product</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>Product Details</h1>
            </div><!-- /.page-header -->
            <?php echo $this->Flash->render(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="user-profile">
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-18">
                                <li class="active">
                                    <a data-toggle="tab" href="#details">
                                        <i class="green ace-icon fa fa-folder-open bigger-120"></i>
                                        Details
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#product_histories">
                                        <i class="blue ace-icon fa fa-history bigger-120"></i>
                                        Product Histories
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content no-border padding-24">
                                <div id="home" class="tab-pane in active">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-2 center">
                                            <span class="profile-picture">
                                                <?php
                                                echo $this->Html->image('no-image.jpg', ['id' => 'avatar2', 'class' => 'editable img-responsive', 'alt' => "User's Photo"]);
                                                ?>
                                            </span>

                                            <div class="space space-4"></div>

                                            <?php
                                            echo $this->Html->link('<i class="ace-icon fa fa-edit bigger-110"></i><span>Product Edit</span>', array('controller' => 'Products', 'action' => 'edit', $product->id, 'view'), array('class' => 'btn btn-sm btn-block btn-primary', 'escape' => false));
                                            ?>                                           
                                        </div><!-- /.col -->

                                        <div class="col-xs-12 col-sm-9">
                                            <h4 class="blue">
                                                <span class="middle"><?php echo $product['title'] ?></span>

                                                <span class="label label-success arrowed-in-right">
                                                    <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                                                    New Product
                                                </span>
                                            </h4>

                                            <div class="profile-user-info">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Code </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $product['code'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Description </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $product['details'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Joined </div>

                                                    <div class="profile-info-value">
                                                        <span>2010/06/20</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Last Online </div>

                                                    <div class="profile-info-value">
                                                        <span>3 hours ago</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hr hr-8 dotted"></div>

                                            <div class="profile-user-info">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Website </div>

                                                    <div class="profile-info-value">
                                                        <a href="#" target="_blank">www.alexdoe.com</a>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                                    </div>

                                                    <div class="profile-info-value">
                                                        <a href="#">Find me on Facebook</a>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                                                    </div>

                                                    <div class="profile-info-value">
                                                        <a href="#">Follow me on Twitter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- /#home -->

                                <div id="activity_histories" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<div id="loading_text">
    <?php echo $this->Html->image('ajax-loader.gif'); ?>
</div>