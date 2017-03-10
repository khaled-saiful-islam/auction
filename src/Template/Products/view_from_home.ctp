<?php
$c_date = strtotime(date('Y-m-d H:i'));
$s_date = strtotime($product['start_date']);
$e_date = strtotime($product['end_date']);
?>
<div class="mens">
    <div class="cont span_2_of_3">
        <div class="grid images_3_of_2">
            <ul id="etalage">
                <?php
                for ($i = 1; $i < 5; $i++) {
                    if (isset($product['image' . $i . '_path']) && !empty($product['image' . $i . '_path'])) {
                        ?>
                        <li>
                            <?php echo $this->Html->image('uploaded_images/products/' . $product['image' . $i . '_path'], ['class' => "etalage_thumb_image img-responsive"]); ?>
                            <?php echo $this->Html->image('uploaded_images/products/' . $product['image' . $i . '_path'], ['class' => "etalage_source_image img-responsive"]); ?>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="desc1 span_3_of_2">
            <h4 class="blue">
                <span class="middle"><?php echo $product['title'] ?></span>
                <?php
                if (isset($loginUser['id']) && !empty($loginUser['id'])) {
                    if (in_array($product['id'], $bookmarked)) {
                        echo '<span class="label label-default arrowed-in arrowed-in-right">Bookmarked</span>';
                    } else {
                        echo $this->Html->link('<span class="label label-info arrowed-in arrowed-in-right">Bookmark</span>', array(), array('value' => $product['id'], 'id' => 'addBookmark', 'escape' => false));
                    }
                }

                if (($s_date <= $c_date && $e_date >= $c_date) && $product['isPause'] < 1) {
                    ?>
                    <span id="auction_product" class="label label-success arrowed-in arrowed-in-right"></span>
                    <?php
                } elseif (($s_date <= $c_date && $e_date >= $c_date) && $product['isPause'] > 0) {
                    ?>
                    <span class="label label-warning arrowed-in arrowed-in-right">Auction was currently stopped by Admin</span>
                    <?php
                }
                ?>                
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
                <div class="profile-info-row">
                    <div class="profile-info-name"> Current Price </div>

                    <div class="profile-info-value">
                        <span><?php echo $product['highest_bid'] . " BDT"; ?></span>
                    </div>
                </div>
            </div>
            <div class="hr hr-8 dotted"></div>
            <?php echo $this->Flash->render(); ?>
            <?php
            if (isset($loginUser['id']) && !empty($loginUser['id'])) {
                if (($s_date <= $c_date && $e_date >= $c_date) && $product['isPause'] < 1) {
                    ?>
                    <div style="margin-top: 30px;">
                        <?php echo $this->Form->create(null, array('url' => array('controller' => 'Bids', 'action' => 'add', $loginUser['id'], $product['id']), 'class' => 'form-horizontal', 'role' => 'form')) ?>
                        <div class="form-group">
                            <label style="color: #667e99; font-size: 13px;" class="col-sm-3 control-label no-padding-right" > Amount: </label>
                            <div class="col-sm-5">
                                <?php echo $this->Form->input('bid_amount', array('min' => ($product['highest_bid'] + $product['minimum_increment']), 'placeholder' => 'Bid Amount', 'label' => false, 'type' => 'number', 'required' => true)); ?>
                            </div>
                            <div class="col-sm-3">
                                <button type="Submit" class="btn btn-white btn-info btn-bold">
                                    <i class="ace-icon fa fa-legal bigger-120 blue"></i>
                                    Bid
                                </button>                   
                            </div>
                        </div>
                        <?php echo $this->Form->end() ?>
                    </div>
                    <?php
                }
            } else {
                echo $this->Html->link('Login for Bid', array('controller' => 'Users', 'action' => 'login', $product['id']), array('class' => 'custom_bid_button'));
            }
            ?>
        </div>
        <div class="clear"></div>

        <div class="clients">
            <h3 class="m_3">Similar Products: </h3>
            <ul id="flexiselDemo3">
                <li><?php echo $this->Html->image('s5.jpg', ['class' => ""]); ?><a href="#">Category</a><p>Rs 600</p></li>
                <li><?php echo $this->Html->image('s6.jpg', ['class' => ""]); ?><a href="#">Category</a><p>Rs 600</p></li>
                <li><?php echo $this->Html->image('s5.jpg', ['class' => ""]); ?><a href="#">Category</a><p>Rs 600</p></li>
                <li><?php echo $this->Html->image('s6.jpg', ['class' => ""]); ?><a href="#">Category</a><p>Rs 600</p></li>
                <li><?php echo $this->Html->image('s5.jpg', ['class' => ""]); ?><a href="#">Category</a><p>Rs 600</p></li>
            </ul>

        </div>
    </div>
    <!--<div class="clear"></div>-->
</div>
<div class="clear"></div>
</div>

<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo3").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

        $('#etalage').etalage({
            thumb_image_width: 260,
            thumb_image_height: 260,
            source_image_width: 900,
            source_image_height: 900,
            show_hint: true
        });

    });
    $('.spin-box-bid').ace_spinner({value: 0, min: 0, max: 90000, btn_up_class: 'btn-info', btn_down_class: 'btn-info'});

    $(function () {
        var end_date = '<?php echo date('F d, Y H:i', strtotime($product['end_date'])); ?>';
        var times = [
            {
                'end': new Date(end_date),
            }
        ];


        function countdown()
        {
            var now = new Date();

            $.each(times, function (key, value) {
                var left = value.end - now;
                var days = Math.floor(left / (1000 * 60 * 60 * 24));
                var hours = Math.floor((left % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((left % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((left % (1000 * 60)) / 1000);

                displayTime = '';
                if (days > 0) {
                    displayTime = "Days: " + days;
                }
                displayTime = displayTime + " Hours: " + hours + " Minutes: " + minutes + " Seconds: " +
                        seconds;

                $('#auction_product').text(displayTime)
            });

        }
        setInterval(countdown, 1000);

    });
</script>

<div id="loading_text">
    <?php echo $this->Html->image('ajax-loader.gif'); ?>
</div>

<style type="text/css">
    .col-sm-5{
        width: 35%;
    }
</style>