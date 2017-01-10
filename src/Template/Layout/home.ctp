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
        <?php echo $this->Html->css('fonts.googleapis.com.css') ?>
        <?php echo $this->Html->css('megamenu.css') ?>
        <?php echo $this->Html->css('fwslider.css') ?>
        <?php echo $this->Html->css('bootstrap.min.css') ?>
        <?php echo $this->Html->css('font-awesome/4.5.0/css/font-awesome.min.css') ?>
        <?php echo $this->Html->css('fonts.googleapis.com.css') ?>
        <?php echo $this->Html->css('ace.min.css') ?>
        <?php echo $this->Html->css('default.css') ?>
        <?php echo $this->Html->css('nivo-slider.css') ?>
        <?php echo $this->Html->css('etalage.css') ?>
        <?php echo $this->Html->css('custom.css') ?>

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
        <?php echo $this->Html->script("jquery.nivo.slider.js"); ?>
        <?php echo $this->Html->script("jquery.etalage.min.js"); ?>
        <?php echo $this->Html->script("jquery.flexisel.js"); ?>
        <?php echo $this->Html->script("custom.js"); ?>

        <?php $path = Router::url('/', true); ?>
        <script type="text/javascript">
            var BASEURL = '<?php echo $path; ?>';
            $(document).ready(function () {
                $(".megamenu").megamenu();
                $('#slider').nivoSlider();
            });
        </script>
    </head>

    <body>
        <?php echo $this->element('Dashboard/navbar') ?>
        <?php echo $this->element('Home/menu') ?>
        <?php echo $this->element('Home/slider') ?>
        <div class="main">
            <div class="wrap">
                <div class="section group">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <?php echo $this->element('Home/footer') ?>
    </body>
</html>
