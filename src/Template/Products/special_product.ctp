
<div class="mens"></div>
<?php echo $this->Flash->render(); ?>

<h2 class="head" style="margin-bottom: 20px;">Special Products</h2>
<div class="top-box">
    <?php
    $cnt = 0;
    foreach ($specialProducts as $product) {
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
                        <?php echo $this->Html->link('<div class="cart-right"> </div>', array('controller' => 'Products', 'action' => 'viewFromSpecial', $product['id']), array('escape' => false)) ?>
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