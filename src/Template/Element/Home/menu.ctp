
<div class="header-bottom">
    <div class="wrap">
        <div class="header-bottom-left">
            <div class="menu">
                <ul class="megamenu skyblue">
                    <li><?php echo $this->Html->link('Home', array('controller' => 'Home', 'action' => 'index'), array('class' => 'item-hover')) ?></li>	
                    <li><?php echo $this->Html->link('All Categories', array('controller' => 'Categories', 'action' => 'all'), array('class' => 'item-hover')) ?></li>
                    <li><?php echo $this->Html->link('Current Bid', array('controller' => 'Home', 'action' => 'currentBid'), array('class' => 'item-hover')) ?></li>				
                    <li><?php echo $this->Html->link('Upcoming Bid', array('controller' => 'Home', 'action' => 'upComingBid'), array('class' => 'item-hover')) ?></li>
                    <li><?php echo $this->Html->link('New Collection', array('controller' => 'Home', 'action' => 'newCollection'), array('class' => 'item-hover')) ?></li>
                    <li><?php echo $this->Html->link('Contact Us', array('controller' => 'Contacts', 'action' => 'add'), array('class' => 'item-hover')) ?></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>