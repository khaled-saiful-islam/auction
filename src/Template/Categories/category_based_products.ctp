<div class="mens"></div>
<h2 class="head"><?php echo $category; ?></h2>
<div class="top-box">
    <?php
    foreach ($cat_products['products'] as $product) {
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
        }
    }
    ?>
    <div class="clear"></div>
</div>