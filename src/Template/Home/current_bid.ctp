<div class="mens"></div>
<?php echo $this->Flash->render(); ?>

<h2 class="head" style="margin-bottom: 20px;">Current Bidding Products</h2>
<div class="top-box">
    <?php
    $cnt = 0;
    foreach ($current_bids as $product) {
        if (isset($product['image1_path']) && !empty($product['image1_path'])) {
            ?>
            <div class="col_1_of_3 span_1_of_3"> 
                <div class="inner_content clearfix">
                    <div class="product_image">
                        <?php echo $this->Html->image('uploaded_images/products/' . $product['image1_path'], ['style' => 'width: 200px; height: 173px;', 'alt' => ""]); ?>
                    </div>
                    <div class="sale-box1">
                        <?php $bid_count = $this->Common->totalBids($product['id']); ?>
                        <span class="on_sale title_shop"><?php echo $bid_count; ?> Bid Placed</span>
                    </div>
                    <span id="product_<?php echo $product['id']; ?>" class="label label-info arrowed-in arrowed-in-right"></span>
                    <div class="price">
                        <div class="cart-left">
                            <?php echo $this->Html->link('<p class="title">' . $product['title'] . '</p>', array('controller' => 'Products', 'action' => 'viewFromHome', $product['id']), array('style' => 'text-decoration: none;', 'escape' => false)) ?>
                            <div class="price1">
                                <span class="actual"><?php echo $product['minimum_bid'] . " BDT"; ?></span>
                            </div>
                        </div>
                        <?php echo $this->Html->link('<div class="cart-right"> </div>', array('controller' => 'Products', 'action' => 'viewFromHome', $product['id']), array('escape' => false)) ?>
                        <div class="clear"></div>
                    </div>				
                </div>
            </div>
            <?php
            $cnt++;
        }
    }
    if ($cnt < 1) {
        ?>
        <h5 class="head" style="color: red;">There is no product</h5>
        <?php
    }
    ?>
    <div class="clear"></div>
</div>

<script type="text/javascript">
    $(function () {
        function setTimer(id, given_date) {
            var times = [
                {
                    'end': new Date(given_date),
                }
            ];
            setInterval(function () {
                var now = new Date();
                $.each(times, function (key, value) {
                    var left = value.end - now;
                    var days = Math.floor(left / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((left % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((left % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((left % (1000 * 60)) / 1000);
                    displayTime = '';
                    if (days > 0) {
                        displayTime = "D: " + days;
                    }
                    displayTime = displayTime + " Hrs: " + hours + " Mins: " + minutes + " Sec: " +
                            seconds;
                    $('#product_' + id).text(displayTime)
                });
            }, 1000);
        }

        '<?php foreach ($current_bids as $product) { ?>'
            var id = '<?php echo $product['id']; ?>';
            var end_date = '<?php echo date('F d, Y H:i', strtotime($product['end_date'])); ?>';
            setTimer(id, end_date);
            '<?php } ?>'
    });
</script>