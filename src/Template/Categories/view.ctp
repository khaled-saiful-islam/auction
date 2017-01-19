<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-tag home-icon"></i>
                    <?php echo $this->Html->link('Categories', array('controller' => 'Categories', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">View Category</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>Category Details</h1>
            </div><!-- /.page-header -->   
            <h4 class="blue">
                <?php echo $category['name'] ?>
            </h4>
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<div id="loading_text">
    <?php echo $this->Html->image('ajax-loader.gif'); ?>
</div>