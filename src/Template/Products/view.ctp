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
                                                if (isset($product['image1_path']) && !empty($product['image1_path'])) {
                                                    echo $this->Html->image('uploaded_images/products/' . $product['image1_path'], ['id' => 'avatar2', 'class' => 'editable img-responsive', 'alt' => "Product"]);
                                                } else {
                                                    echo $this->Html->image('no-image.jpg', ['id' => 'avatar2', 'class' => 'editable img-responsive', 'alt' => "Product"]);
                                                }
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
                                                <?php if (isset($product['winner_id']) && !empty($product['winner_id'])) { ?>
                                                    <span class="label label-danger arrowed-in-right">
                                                        Sold Product
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="label label-success arrowed-in-right">
                                                        New Product
                                                    </span>
                                                <?php } ?>
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
                                                    <div class="profile-info-name"> Initial Bid </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $product['minimum_bid'] . " BDT" ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Minimum Bid </div>

                                                    <div class="profile-info-value">
                                                        <span><?php echo $product['minimum_increment'] . " BDT"; ?></span>
                                                    </div>
                                                </div>
                                                <?php if (isset($product['highest_bid']) && !empty($product['highest_bid'])) { ?>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Highest Bid </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $product['highest_bid'] . " BDT"; ?></span>
                                                        </div>
                                                    </div>
                                                <?php } if (isset($product['winner_id']) && !empty($product['winner_id'])) { ?>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Winner </div>

                                                        <div class="profile-info-value">
                                                            <span><?php echo $product['winner_id'] . " BDT"; ?></span>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <div class="hr hr-8 dotted"></div>

                                            <div style="margin-top: 20px;">
                                                <ul class="ace-thumbnails clearfix">
                                                    <?php
                                                    for ($i = 1; $i < 5; $i++) {
                                                        if (isset($product['image' . $i . '_path']) && !empty($product['image' . $i . '_path'])) {
                                                            ?>
                                                            <li class="editable img-responsive" style="width: 16%;">
                                                                <a href='<?php echo $this->request->webroot . "img/" . "uploaded_images/" . "products/" . $product['image' . $i . '_path']; ?>' data-rel="colorbox">
                                                                    <?php echo $this->Html->image('uploaded_images/products/' . $product['image' . $i . '_path'], ['style' => 'max-width: 100%;', 'alt' => "Product Image"]); ?>
                                                                    <div class="text">
                                                                        <div class="inner"><?php echo $product['title']; ?></div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>                                                    
                                                </ul>
                                            </div><!-- PAGE CONTENT ENDS -->

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

<script type="text/javascript">
    jQuery(function ($) {
        var $overflow = '';
        var colorbox_params = {
            rel: 'colorbox',
            reposition: true,
            scalePhotos: true,
            scrolling: false,
            previous: '<i class="ace-icon fa fa-arrow-left"></i>',
            next: '<i class="ace-icon fa fa-arrow-right"></i>',
            close: '&times;',
            current: '{current} of {total}',
            maxWidth: '100%',
            maxHeight: '100%',
            onOpen: function () {
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed: function () {
                document.body.style.overflow = $overflow;
            },
            onComplete: function () {
                $.colorbox.resize();
            }
        };

        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon


        $(document).one('ajaxloadstart.page', function (e) {
            $('#colorbox, #cboxOverlay').remove();
        });
    })
</script>