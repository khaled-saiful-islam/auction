<?php echo $this->Flash->render(); ?>

<div class="cont span_2_of_3">
    <h2 class="head" style="margin-bottom: 20px;">Up Coming Products</h2>
    <div class="top-box">
        <?php
        $cnt = 0;
        foreach ($products as $product) {
            if (isset($product['image1_path']) && !empty($product['image1_path'])) {
                ?>
                <div class="col_1_of_3 span_1_of_3"> 
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <?php echo $this->Html->image('uploaded_images/products/' . $product['image1_path'], ['style' => 'width: 200px; height: 173px;', 'alt' => ""]); ?>
                        </div>
                        <div class="sale-box"><span class="on_sale title_shop">New</span></div>
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

    <h2 class="head" style="margin-bottom: 20px;"> Current Bidding Products</h2>
    <div class="top-box">
        <?php
        $cnt = 0;
        foreach ($bidding_products as $product) {
            if (isset($product['image1_path']) && !empty($product['image1_path'])) {
                ?>
                <div class="col_1_of_3 span_1_of_3"> 
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <?php echo $this->Html->image('uploaded_images/products/' . $product['image1_path'], ['style' => 'width: 200px; height: 173px;', 'alt' => ""]); ?>
                        </div>
                        <div class="sale-box1"><span class="on_sale title_shop">Bid Ongoing</span></div>	
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
</div>

<div class="rsidebar span_1_of_left">
    <div class="top-border"> </div>
    <div class="border">        
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php
                $cnt = 0;
                $sliders = $this->Common->findSlider(2);
                foreach ($sliders as $slider) {
                    echo $this->Html->image('uploaded_images/nivoSliders/' . $slider['image_path'], ['alt' => "Slider Image"]);
                    $cnt++;
                }

                if ($cnt == 0) {
                    echo $this->Html->image('a1.jpg', ['alt' => ""]);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>