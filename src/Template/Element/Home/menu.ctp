
<div class="header-bottom">
    <div class="wrap">
        <div class="header-bottom-left">
            <div class="menu">
                <ul class="megamenu skyblue">
                    <li><?php echo $this->Html->link('Home', array('controller' => 'Home', 'action' => 'index'), array('class' => 'item-hover')) ?></li>	
                    <li><?php echo $this->Html->link('All Categories', array('controller' => 'Categories', 'action' => 'all'), array('class' => 'item-hover')) ?></li>
                    <li><a class="item-hover" href="#">Current Bid</a></li>				
                    <li><a class="item-hover" href="#">Upcoming Bid</a></li>
                    <li><a class="item-hover" href="#">Finished Bid</a></li>
                    <li><a class="item-hover" href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>