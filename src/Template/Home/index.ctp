
<div class="cont span_2_of_3">
    <h2 class="head">Featured Products</h2>
    <div class="top-box">
        <div class="col_1_of_3 span_1_of_3"> 
            <div class="inner_content clearfix">
                <div class="product_image">
                    <?php echo $this->Html->image('pic.jpg', ['alt' => ""]); ?>
                </div>
                <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                <div class="price">
                    <div class="cart-left">
                        <?php echo $this->Html->link('<p class="title">Product 1</p>', array('controller' => 'Products', 'action' => 'view'), array('escape' => false)) ?>
                        <div class="price1">
                            <span class="actual">$12.00</span>
                        </div>
                    </div>
                    <div class="cart-right"> </div>
                    <div class="clear"></div>
                </div>				
            </div>
        </div>
        <div class="col_1_of_3 span_1_of_3">
            <a href="single.html">
                <div class="inner_content clearfix">
                    <div class="product_image">
                        <?php echo $this->Html->image('pic.jpg', ['alt' => ""]); ?>
                    </div>
                    <div class="price">
                        <div class="cart-left">
                            <p class="title">Lorem Ipsum simply</p>
                            <div class="price1">
                                <span class="actual">$12.00</span>
                            </div>
                        </div>
                        <div class="cart-right"> </div>
                        <div class="clear"></div>
                    </div>				
                </div>
            </a>
        </div>
        <div class="col_1_of_3 span_1_of_3">
            <a href="single.html">
                <div class="inner_content clearfix">
                    <div class="product_image">
                        <?php echo $this->Html->image('pic.jpg', ['alt' => ""]); ?>
                    </div>
                    <div class="sale-box1"><span class="on_sale title_shop">Sale</span></div>	
                    <div class="price">
                        <div class="cart-left">
                            <p class="title">Lorem Ipsum simply</p>
                            <div class="price1">
                                <span class="reducedfrom">$66.00</span>
                                <span class="actual">$12.00</span>
                            </div>
                        </div>
                        <div class="cart-right"> </div>
                        <div class="clear"></div>
                    </div>				
                </div>
            </a>
        </div>
        <div class="clear"></div>
    </div>	

    <h2 class="head">New Products</h2>	
    <div class="section group">
        <div class="col_1_of_3 span_1_of_3">
            <a href="single.html">
                <div class="inner_content clearfix">
                    <div class="product_image">
                        <?php echo $this->Html->image('pic.jpg', ['alt' => ""]); ?>
                    </div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
                        <div class="cart-left">
                            <p class="title">Lorem Ipsum simply</p>
                            <div class="price1">
                                <span class="actual">$12.00</span>
                            </div>
                        </div>
                        <div class="cart-right"> </div>
                        <div class="clear"></div>
                    </div>				
                </div>
            </a>
        </div>
        <div class="col_1_of_3 span_1_of_3">
            <a href="single.html">
                <div class="inner_content clearfix">
                    <div class="product_image">
                        <?php echo $this->Html->image('pic.jpg', ['alt' => ""]); ?>
                    </div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
                        <div class="cart-left">
                            <p class="title">Lorem Ipsum simply</p>
                            <div class="price1">
                                <span class="actual">$12.00</span>
                            </div>
                        </div>
                        <div class="cart-right"> </div>
                        <div class="clear"></div>
                    </div>				
                </div>
            </a>
        </div>
        <div class="col_1_of_3 span_1_of_3">
            <a href="single.html">
                <div class="inner_content clearfix">
                    <div class="product_image">
                        <?php echo $this->Html->image('pic.jpg', ['alt' => ""]); ?>
                    </div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
                        <div class="cart-left">
                            <p class="title">Lorem Ipsum simply</p>
                            <div class="price1">
                                <span class="actual">$12.00</span>
                            </div>
                        </div>
                        <div class="cart-right"> </div>
                        <div class="clear"></div>
                    </div>				
                </div>
            </a>
        </div>
        <div class="clear"></div>
    </div>			 						 			    
</div>
<div class="rsidebar span_1_of_left">
    <div class="top-border"> </div>
    <div class="border">
        <?php echo $this->Html->css('default.css') ?>
        <?php echo $this->Html->css('nivo-slider.css') ?>
        <?php echo $this->Html->script("jquery.nivo.slider.js"); ?>
        <script type="text/javascript">
            $(window).load(function () {
                $('#slider').nivoSlider();
            });
        </script>
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php echo $this->Html->image('t-img1.jpg', ['alt' => ""]); ?>
                <?php echo $this->Html->image('t-img2.jpg', ['alt' => ""]); ?>
                <?php echo $this->Html->image('t-img1.jpg', ['alt' => ""]); ?>
            </div>
        </div>
    </div>
    <div class="top-border"> </div>
    <div class="sidebar-bottom">
        <h2 class="m_1">Newsletters<br> Signup</h2>
        <p class="m_text">Lorem ipsum dolor sit amet, consectetuer</p>
        <div class="subscribe">
            <form>
                <input name="userName" type="text" class="textbox">
                <input type="submit" value="Subscribe">
            </form>
        </div>
    </div>
</div>
<div class="clear"></div>