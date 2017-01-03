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
                                <th class="hidden-480">Type</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>
                                        <?php
                                        if ($loginUser['level'] <= $user['level']) {
                                            ?>
                                            <div class="action-buttons">
                                                <?php echo $this->Html->link('<i class="ace-icon fa fa-angle-double-down"></i><span class="sr-only">Details</span>', array('controller' => 'Users', 'action' => 'view', $user->id), array('class' => 'green bigger-140 show-details-btn', 'escape' => false)) ?>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo h($user->name) ?></td>
                                    <td><?php echo h($user->email) ?></td>
                                    <td class="hidden-480">
                                        <?php
                                        if ($user['level'] > 20) {
                                            ?>
                                            <span class="label label-sm label-success">User</span>
                                            <?php
                                        } else if ($user['level'] > 10) {
                                            ?>    
                                            <span class="label label-sm label-warning arrowed-in">Admin</span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="label label-sm label-danger arrowed-in">Super Admin</span>
                                            <?php
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <?php
                                            if ($loginUser['level'] <= $user['level']) {
                                                echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-130"></i>', array('controller' => 'Users', 'action' => 'edit', $user->id), array('class' => 'green', 'escape' => false));
                                                echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-130"></i>', array('controller' => 'Users', 'action' => 'delete', $user->id), array('class' => 'red', 'escape' => false, 'confirm' => __('Are you sure you want to delete?')));
                                            }
                                            ?>
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