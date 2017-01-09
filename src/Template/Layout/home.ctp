<?php
$cakeDescription = 'Auction: an auction site';

use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset() ?>
        <?php echo $this->Html->meta('icon') ?>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Auction Site</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <?php echo $this->Html->css('style.css') ?>
        <?php echo $this->Html->css('form.css') ?>

        <!-- text fonts -->
        <?php echo $this->Html->css('fonts.googleapis.com.css') ?>

        <?php echo $this->Html->css('megamenu.css') ?>
        <?php echo $this->Html->css('fwslider.css') ?>
        <?php echo $this->Html->css('bootstrap.min.css') ?>
        <?php echo $this->Html->css('font-awesome/4.5.0/css/font-awesome.min.css') ?>
        <?php echo $this->Html->css('fonts.googleapis.com.css') ?>
        <?php echo $this->Html->css('ace.min.css') ?>

        <!--[if !IE]> -->
        <?php echo $this->Html->script("jquery-2.1.4.min.js"); ?>
        <!-- <![endif]-->

        <!--[if IE]>
        <?php echo $this->Html->script("jquery-1.11.3.min.js"); ?>
        <![endif]-->

        <?php echo $this->Html->script("megamenu.js"); ?>

        <?php echo $this->Html->script("jquery-ui.min.js"); ?>

        <?php echo $this->Html->script("css3-mediaqueries.js"); ?>

        <?php echo $this->Html->script("fwslider.js"); ?> 

        <?php echo $this->Html->script("jquery.easydropdown.js"); ?> 

        <?php echo $this->Html->script("bootstrap.min.js"); ?>

        <?php $path = Router::url('/', true); ?>
        <script type="text/javascript">
            var BASEURL = '<?php echo $path; ?>';
            $(document).ready(function () {
                $(".megamenu").megamenu();
            });
        </script>
    </head>

    <body>
        <?php echo $this->element('Dashboard/navbar') ?>
        <div class="header-bottom">
            <div class="wrap">
                <div class="header-bottom-left">
                    <div class="menu">
                        <ul class="megamenu skyblue">
                            <li class="active grid"><a href="#">All Categories</a>
                                <div class="megapanel">
                                    <div class="row">
                                        <div class="col1">
                                            <div class="h_nav">
                                                <h4>Contact Lenses</h4>
                                                <ul>
                                                    <li><a href="womens.html">Daily-wear soft lenses</a></li>
                                                    <li><a href="womens.html">Extended-wear</a></li>
                                                    <li><a href="womens.html">Lorem ipsum </a></li>
                                                    <li><a href="womens.html">Planned replacement</a></li>
                                                </ul>	
                                            </div>							
                                        </div>
                                        <div class="col1">
                                            <div class="h_nav">
                                                <h4>Sun Glasses</h4>
                                                <ul>
                                                    <li><a href="womens.html">Heart-Shaped</a></li>
                                                    <li><a href="womens.html">Square-Shaped</a></li>
                                                    <li><a href="womens.html">Round-Shaped</a></li>
                                                    <li><a href="womens.html">Oval-Shaped</a></li>
                                                </ul>	
                                            </div>							
                                        </div>
                                        <div class="col1">
                                            <div class="h_nav">
                                                <h4>Eye Glasses</h4>
                                                <ul>
                                                    <li><a href="womens.html">Anti Reflective</a></li>
                                                    <li><a href="womens.html">Aspheric</a></li>
                                                    <li><a href="womens.html">Bifocal</a></li>
                                                    <li><a href="womens.html">Hi-index</a></li>
                                                    <li><a href="womens.html">Progressive</a></li>
                                                </ul>	
                                            </div>												
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a class="color4" href="#">Current Bid</a></li>				
                            <li><a class="color6" href="#">Upcoming Bid</a></li>
                            <li><a class="color7" href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div id="fwslider">
            <div class="slider_container">
                <div class="slide"> 
                    <!-- Slide image -->
                    <?php echo $this->Html->image('banner.jpg', ['alt' => ""]); ?>
                    <!-- /Slide image -->
                    <!-- Texts container -->
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text title -->
                            <h4 class="title">Aluminium Club</h4>
                            <!-- /Text title -->

                            <!-- Text description -->
                            <p class="description">Experiance ray ban</p>
                            <!-- /Text description -->
                        </div>
                    </div>
                    <!-- /Texts container -->
                </div>
                <!-- /Duplicate to create more slides -->
                <div class="slide">
                    <?php echo $this->Html->image('banner1.jpg', ['alt' => ""]); ?>
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <h4 class="title">consectetuer adipiscing </h4>
                            <p class="description">diam nonummy nibh euismod</p>
                        </div>
                    </div>
                </div>
                <!--/slide -->
            </div>
            <div class="timers"></div>
            <div class="slidePrev"><span></span></div>
            <div class="slideNext"><span></span></div>
        </div>
        <div class="main">
            <div class="wrap">
                <div class="section group">
                    <div class="cont span_2_of_3">
                        <h2 class="head">Featured Products</h2>
                        <div class="top-box">
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
                                            <?php echo $this->Html->image('pic1.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic2.jpg', ['alt' => ""]); ?>
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
                        <div class="top-box">
                            <div class="col_1_of_3 span_1_of_3">
                                <a href="single.html">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <?php echo $this->Html->image('pic3.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic4.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic5.jpg', ['alt' => ""]); ?>
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
                            <div class="clear"></div>
                        </div>	
                        <div class="top-box1">
                            <div class="col_1_of_3 span_1_of_3">
                                <a href="single.html">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <?php echo $this->Html->image('pic6.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic7.jpg', ['alt' => ""]); ?>
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
                            <div class="col_1_of_3 span_1_of_3">
                                <a href="single.html">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <?php echo $this->Html->image('pic8.jpg', ['alt' => ""]); ?>
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
                        <h2 class="head">Staff Pick</h2>
                        <div class="top-box1">
                            <div class="col_1_of_3 span_1_of_3">
                                <a href="single.html">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <?php echo $this->Html->image('pic8.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic4.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic2.jpg', ['alt' => ""]); ?>
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
                        <h2 class="head">New Products</h2>	
                        <div class="section group">
                            <div class="col_1_of_3 span_1_of_3">
                                <a href="single.html">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <?php echo $this->Html->image('pic5.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic2.jpg', ['alt' => ""]); ?>
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
                                            <?php echo $this->Html->image('pic3.jpg', ['alt' => ""]); ?>
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
                                    <?php echo $this->Html->image('t-img3.jpg', ['alt' => ""]); ?>
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
                </div>
            </div>
        </div>

        <div class="footer-home">
            <div class="footer-top">
                <div class="wrap">
                    <div class="section group example">
                        <div class="col_1_of_2 span_1_of_2">
                            <ul class="f-list">
                                <li><?php echo $this->Html->image('2.png', ['alt' => ""]); ?><span class="f-text">Free Shipping on orders over $ 100</span><div class="clear"></div></li>
                            </ul>
                        </div>
                        <div class="col_1_of_2 span_1_of_2">
                            <ul class="f-list">
                                <li><?php echo $this->Html->image('3.png', ['alt' => ""]); ?><span class="f-text">Call us! toll free-222-555-6666 </span><div class="clear"></div></li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="wrap">
                    <div class="copy">
                        <p>© 2017 <a href="#" target="_blank">Auction Site</a></p>
                    </div>
                    <div class="f-list2">
                        <ul>
                            <li class="active"><a href="about.html">About Us</a></li> |
                            <li><a href="delivery.html">Delivery & Returns</a></li> |
                            <li><a href="delivery.html">Terms & Conditions</a></li> |
                            <li><a href="contact.html">Contact Us</a></li> 
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </body>
</html>
