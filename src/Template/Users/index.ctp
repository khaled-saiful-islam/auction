<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-users home-icon"></i>
                    <?php echo $this->Html->link('Users', array('controller' => 'Users', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">View Users</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>View Users</h1>
            </div><!-- /.page-header -->
            <?php echo $this->Flash->render(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="detail-col">Details</th>
                                <th>Name</th>
                                <th>Email</th>
<!--                                <th class="hidden-480">Status</th>-->
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                                <i class="ace-icon fa fa-angle-double-down"></i>
                                                <span class="sr-only">Details</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo h($user->name) ?>
                                    </td>
                                    <td>
                                        <?php echo h($user->email) ?>
                                    </td>

                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="green" href="#">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                            <?php echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-130"></i>', array('controller' => 'Users', 'action' => 'delete', $user->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete?'))) ?>
                                        </div>
                                    </td>
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