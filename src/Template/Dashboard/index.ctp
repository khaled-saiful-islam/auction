<div class="main-content">
    <div class="main-content-inner">
        <?php echo $this->Flash->render(); ?>
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-dashboard home-icon"></i>
                    <?php echo $this->Html->link('Dashboard', array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="space-6"></div>
                        <div class="col-sm-7 infobox-container">
                            <div class="infobox infobox-green">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-bookmark"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo $bookmark_count; ?></span>
                                    <div class="infobox-content">Bookmarks</div>
                                </div>
                            </div>

                            <div class="infobox infobox-blue">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-legal"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo $bids; ?></span>
                                    <div class="infobox-content">Participation</div>
                                </div>
                            </div>

                            <div class="infobox infobox-pink">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-shopping-cart"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo $winning_products; ?></span>
                                    <div class="infobox-content">Purchase</div>
                                </div>
                            </div>

                            <div class="infobox infobox-blue">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-user"></i>
                                </div>

                                <div class="infobox-data">
                                    <?php
                                    if ($loginUser['level'] > 20) {
                                        ?>
                                        <span class="infobox-data-number">Register User</span>
                                        <?php
                                    } elseif ($loginUser['level'] > 10) {
                                        ?>
                                        <span class="infobox-data-number">Admin</span>
                                    <?php } else {
                                        ?>
                                        <span class="infobox-data-number">Super Admin</span>
                                        <?php
                                    }
                                    ?>
                                    <div class="infobox-content">User Type</div>
                                </div>
                            </div>

                            <div class="infobox infobox-orange2">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-check-square"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo date_format($loginUser['created'],"d/m/Y"); ?></span>
                                    <div class="infobox-content">Join</div>
                                </div>
                            </div>

                            <div class="infobox infobox-red">
                                <div class="infobox-icon">
                                    <i class="ace-icon fa fa-pencil"></i>
                                </div>

                                <div class="infobox-data">
                                    <span class="infobox-data-number"><?php echo date_format($loginUser['modified'],"d/m/Y"); ?></span>
                                    <div class="infobox-content">Last Update</div>
                                </div>
                            </div>

                            <div class="space-6"></div>                            
                        </div>

                        <div class="vspace-12-sm"></div>

                        <div class="col-sm-5">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-legal"></i>
                                        On Going Bidding
                                    </h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thin-border-bottom">
                                                <tr>
                                                    <th>
                                                        <i class="ace-icon fa fa-caret-right blue"></i>Title
                                                    </th>

                                                    <th>
                                                        <i class="ace-icon fa fa-caret-right blue"></i>Latest Price
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($bidding_products as $bidding_product): ?>
                                                    <tr>
                                                        <td><b class="green"><?php echo $bidding_product['title'] ?></b></td>

                                                        <td>
                                                            <b class="red"><?php echo $bidding_product['highest_bid'] ?></b>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="hr hr32 hr-dotted"></div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-flat">
                                    <h4 class="widget-title lighter">
                                        <i class="ace-icon fa fa-bookmark orange"></i>
                                        Bookmark products
                                    </h4>

                                    <div class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thin-border-bottom">
                                                <tr>
                                                    <th>
                                                        <i class="ace-icon fa fa-caret-right blue"></i>Product Name
                                                    </th>

                                                    <th>
                                                        <i class="ace-icon fa fa-caret-right blue"></i>Latest Price
                                                    </th>

                                                    <th>
                                                        <i class="ace-icon fa fa-caret-right blue"></i>Status
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($bookmarks as $bookmark): ?>
                                                    <?php
                                                    $product = $this->Common->findProduct($bookmark['product_id']);

                                                    $c_date = strtotime(date('Y-m-d H:i'));
                                                    $s_date = strtotime($product['start_date']);
                                                    $e_date = strtotime($product['end_date']);
                                                    ?>
                                                    <tr>
                                                        <td><b class="green"><?php echo $product['title']; ?></b></td>

                                                        <td><b class="red"><?php echo $product['highest_bid']; ?></b></td>

                                                        <td>                                                
                                                            <?php if ((isset($product['winner_id']) && !empty($product['winner_id'])) && $e_date < $c_date) { ?>
                                                                <span class="label label-danger arrowed-in-right">
                                                                    Sold Product
                                                                </span>
                                                            <?php } else if (($product['isPause'] < 1) && ($s_date <= $c_date) && $e_date >= $c_date) { ?>
                                                                <span class="label label-warning arrowed-in-right">
                                                                    Auction On Going
                                                                </span>
                                                            <?php } else {
                                                                ?>
                                                                <span class="label label-success arrowed-in-right">
                                                                    New Product
                                                                </span>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->                        
                    </div><!-- /.row -->

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->