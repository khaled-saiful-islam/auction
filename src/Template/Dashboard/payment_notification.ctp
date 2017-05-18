<div class="main-content">
    <div class="main-content-inner">
        <?php echo $this->Flash->render(); ?>
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-money home-icon"></i>
                    <?php echo $this->Html->link('Payment Notification', array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>Payment Notification</h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
</div>