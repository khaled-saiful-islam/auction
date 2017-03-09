<div class="main-content">
    <div class="main-content-inner">
        <?php //echo $this->Flash->render(); ?>
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-dashboard home-icon"></i>
                    <?php echo $this->Html->link('Dashboard', array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>View Bookmarks</h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Code</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookmarks as $bookmark): ?>
                                <tr>
                                    <td>
                                        <?php echo $bookmark['product_id']; ?>
                                    </td>
                                    <td><?php echo $bookmark['product_id']; ?></td>
                                    <td><?php echo $bookmark['product_id']; ?></td>
                                    <td><?php echo $bookmark['product_id']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->