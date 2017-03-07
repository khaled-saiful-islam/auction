<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CakePHP: the rapid development php framework';

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

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <?php echo $this->Html->css('bootstrap.min.css') ?>
        <?php echo $this->Html->css('font-awesome/4.5.0/css/font-awesome.min.css') ?>

        <!-- text fonts -->
        <?php echo $this->Html->css('fonts.googleapis.com.css') ?>

        <!-- ace styles -->
        <?php echo $this->Html->css('ace.min.css') ?>

        <!-- Custom -->
        <?php echo $this->Html->css('custom.css') ?>

        <!--[if lte IE 9]>
        <?php echo $this->Html->css('ace-part2.min.css') ?>
        <![endif]-->

        <?php echo $this->Html->css('ace-rtl.min.css') ?>

        <!--[if lte IE 9]>
        <?php echo $this->Html->css('ace-ie.min.css') ?>
        <![endif]-->

        <!--[if !IE]> -->
        <?php echo $this->Html->script("jquery-2.1.4.min.js"); ?>
        <!-- <![endif]-->

        <!--[if IE]>
        <?php echo $this->Html->script("jquery-1.11.3.min.js"); ?>
        <![endif]-->

        <?php echo $this->Html->script("bootstrap.min.js"); ?>       

        <?php echo $this->Html->script("bootbox.js"); ?>       

        <?php echo $this->Html->script("loginJS.js"); ?>
        
        <?php echo $this->Html->script("jquery.maskedinput.min.js"); ?> 

        <?php $path = Router::url('/', true); ?>
        <script type="text/javascript">
            var BASEURL = '<?php echo $path; ?>';
        </script>
    </head>

    <body class="login-layout">
        <?php echo $this->fetch('content') ?>
    </body>
</html>
