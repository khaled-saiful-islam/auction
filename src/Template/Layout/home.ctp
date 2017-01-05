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
        <script type="text/javascript">$(document).ready(function () {
                $(".megamenu").megamenu();
            });
        </script>

        <?php echo $this->Html->css('fwslider.css') ?>

        <!--[if !IE]> -->
        <?php echo $this->Html->script("jquery-2.1.4.min.js"); ?>
        <!-- <![endif]-->

        <!--[if IE]>
        <?php echo $this->Html->script("jquery-1.11.3.min.js"); ?>
        <![endif]-->

        <?php echo $this->Html->script("css3-mediaqueries.js"); ?>

        <?php echo $this->Html->script("fwslider.js"); ?> 

        <?php echo $this->Html->script("jquery.easydropdown.js"); ?> 

        <?php $path = Router::url('/', true); ?>
        <script type="text/javascript">
            var BASEURL = '<?php echo $path; ?>';
        </script>
    </head>

    <body>
        <div class="header-top">
            <div class="wrap"> 
                <div class="header-top-left">
                    <div class="box">
                        <select tabindex="4" class="dropdown">
                            <option value="" class="label" value="">Language :</option>
                            <option value="1">English</option>
                            <option value="2">French</option>
                            <option value="3">German</option>
                        </select>
                    </div>
                    <div class="box1">
                        <select tabindex="4" class="dropdown">
                            <option value="" class="label" value="">Currency :</option>
                            <option value="1">$ Dollar</option>
                            <option value="2">€ Euro</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="cssmenu">
                    <ul>
                        <li class="active"><a href="login.html">Account</a></li> |
                        <li><a href="checkout.html">Wishlist</a></li> |
                        <li><a href="checkout.html">Checkout</a></li> |
                        <li><a href="login.html">Log In</a></li> |
                        <li><a href="register.html">Sign Up</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>
