
<div class="mens">
    <div class="cont span_2_of_3">
        <div class="grid images_3_of_2">
            <ul id="etalage">
                <li>
                    <a href="optionallink.html">
                        <?php echo $this->Html->image('s-img.jpg', ['class' => "etalage_thumb_image img-responsive"]); ?>
                        <?php echo $this->Html->image('s1.jpg', ['class' => "etalage_source_image img-responsive"]); ?>
                    </a>
                </li>
                <li>
                    <?php echo $this->Html->image('s-img.jpg', ['class' => "etalage_thumb_image img-responsive"]); ?>
                    <?php echo $this->Html->image('s1.jpg', ['class' => "etalage_source_image img-responsive"]); ?>
                </li>
                <li>
                    <?php echo $this->Html->image('s-img.jpg', ['class' => "etalage_thumb_image img-responsive"]); ?>
                    <?php echo $this->Html->image('s1.jpg', ['class' => "etalage_source_image img-responsive"]); ?>
                </li>
                <li>
                    <?php echo $this->Html->image('s-img.jpg', ['class' => "etalage_thumb_image img-responsive"]); ?>
                    <?php echo $this->Html->image('s1.jpg', ['class' => "etalage_source_image img-responsive"]); ?>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="desc1 span_3_of_2">
            <h3 class="m_3">Product 1</h3>
            <p class="m_5">Rs. 888 <span class="reducedfrom">Rs. 999</span></p>
            <div class="btn_form">
                <form>
                    <input type="submit" value="Bid" title="">
                </form>
            </div>
            <span class="m_link"><a href="#">login to save in wishlist</a> </span>
            <p class="m_text2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit </p>
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