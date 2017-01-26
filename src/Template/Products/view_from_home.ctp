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
            <h3 class="m_3"><?php echo $product['title'] ?></h3>
            <p class="m_5"><?php echo $product['minimum_bid'] . " BDT" ?></p>
            <div class="btn_form">
                <form>
                    <input type="submit" value="Bid" title="">
                </form>
            </div>
            <span class="m_link"><?php echo $this->Html->link('login to save in wishlist', array('controller' => 'Users', 'action' => 'login')) ?></span>
            <p class="m_text2"><?php echo $product['details'] ?></p>
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
            thumb_image_width: 360,
            thumb_image_height: 360,
            source_image_width: 900,
            source_image_height: 900,
            show_hint: true
        });

    });
</script>