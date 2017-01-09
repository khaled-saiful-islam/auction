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
    </body>
</html>
