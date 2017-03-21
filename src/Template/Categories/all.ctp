<div class="mens"></div>
<h2 class="head">All Categories</h2> 
<div class="top-box">
    <?php
    foreach ($categories as $category) {
        ?>
        <div class="wrapper-inner-tab-backgrounds-third"><div class="sim-button button29"><span><?php echo $this->Html->link($category['name'], array('controller' => 'Categories', 'action' => 'categoryBasedProducts', $category['name'], $category['id'])) ?></span></div></div>
        <?php
    }
    ?>
    <div style="clear: both;"></div>
</div>    
<div style="clear: both;"></div>