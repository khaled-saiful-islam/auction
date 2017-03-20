<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-users home-icon"></i>
                    <?php
                    if ($user['level'] < 21) {
                        echo $this->Html->link('Users', array('controller' => 'Users', 'action' => 'index'), array('escape' => false));
                    } else {
                        echo $this->Html->link('Users', array());
                    }
                    ?>
                </li>
                <li class="active">View User</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>User Profile</h1>
            </div><!-- /.page-header -->
            <?php echo $this->Flash->render(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="user-profile">
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-18">
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        <i class="green ace-icon fa fa-user bigger-120"></i>
                                        Profile
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#activity_histories">
                                        <i class="blue ace-icon fa fa-history bigger-120"></i>
                                        Activity Histories
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content no-border padding-24">
                                <div id="home" class="tab-pane in active">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-2 center">
                                            <span class="profile-picture">
                                                <?php
                                                if (isset($user['image_path']) && !empty($user['image_path'])) {
                                                    echo $this->Html->image('uploaded_images/users/' . $user['image_path'], ['id' => 'avatar2', 'class' => 'editable img-responsive', 'alt' => "User's Photo"]);
                                                } else {
                                                    echo $this->Html->image('blank_image.png', ['id' => 'avatar2', 'class' => 'editable img-responsive', 'alt' => "User's Photo"]);
                                                }
                                                ?>
                                            </span>

                                            <div class="space space-4"></div>

                                            <?php
                                            if ($user['level'] > 20 && $loginUser['level'] < 11) {
                                                echo $this->Html->link('<i class="ace-icon fa fa-plus-circle bigger-120"></i><span>Make as an Admin</span>', array(), array('value' => $user->id, 'id' => 'makeAdmin', 'class' => 'btn btn-sm btn-block btn-success', 'escape' => false));
                                            }
                                            echo $this->Html->link('<i class="ace-icon fa fa-edit bigger-110"></i><span>Profile Edit</span>', array('controller' => 'Users', 'action' => 'edit', $user->id, 'view'), array('class' => 'btn btn-sm btn-block btn-primary', 'escape' => false));
                                            ?>                                           
                                        </div><!-- /.col -->

                                        <div class="col-xs-12 col-sm-9">
                                            <h4 class="blue">
                                                <span class="middle"><?php echo $user['name'] ?></span>

                                                <?php
                                                if ($user['level'] > 20) {
                                                    ?>
                                                    <span class="label label-success arrowed-in-right">
                                                        User
                                                    </span>
                                                    <?php
                                                } else if ($user['level'] > 10) {
                                                    ?>
                                                    <span class="label label-warning arrowed-in-right">
                                                        Admin
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="label label-danger arrowed-in-right">
                                                        Super Admin
                                                    </span>
                                                    <?php
                                                }
                                                ?>
                                            </h4>

                                            <div class="profile-user-info">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Email </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $user['email'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Location </div>

                                                    <div class="profile-info-value">
                                                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                        <span><?php echo $user['address'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Cell Phone </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $user['phone_number'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Joined </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo date_format($user['created'], "d/m/Y H:i:s") ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hr hr-8 dotted"></div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- /#home -->

                                <div id="activity_histories" class="tab-pane">
                                    <div class="page-header">
                                        <h1>View Bids</h1>
                                    </div><!-- /.page-header -->
                                    <table class="table  table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product Title</th>
                                                <th>Bid Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($bids as $bid): ?>
                                                <?php $product = $this->Common->findProduct($bid['product_id']); ?>
                                                <tr>
                                                    <td><b class="green"><?php echo h($product['title']); ?></b></td>
                                                    <td><b class="red"><?php echo h($bid['bid_amount']); ?></b></td>
                                                    <td><?php echo date_format($bid['created'], "d/m/Y H:i:s"); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <div class="page-header">
                                        <h1>View Products</h1>
                                    </div><!-- /.page-header -->
                                    <table class="table  table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product Title</th>
                                                <th>Code</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($winning_products as $winning_product): ?>
                                                <tr>
                                                    <td><b class="green"><?php echo h($winning_product['title']); ?></b></td>
                                                    <td><b class="red"><?php echo h($winning_product['code']); ?></b></td>
                                                    <td><b class="blue"><?php echo h($winning_product['highest_bid']); ?></b></td>
                                                    <td><?php echo date_format($winning_product['modified'], "d/m/Y H:i:s"); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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