
<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-tag home-icon"></i>
                    <?php echo $this->Html->link('Categories', array('controller' => 'Categories', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">View Categories</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>View Categories</h1>
            </div><!-- /.page-header -->
            <?php echo $this->Flash->render(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="detail-col">Details</th>
                                <th>Category Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td>
                                        <div class="action-buttons">
                                            <?php echo $this->Html->link('<i class="ace-icon fa fa-tag"></i><span class="sr-only">Details</span>', array('controller' => 'Categories', 'action' => 'view', $category->id), array('class' => 'blue bigger-140 show-details-btn', 'escape' => false)) ?>
                                        </div>
                                    </td>
                                    <td><?php echo h($category->name) ?></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <?php
                                            if ($loginUser['level'] <= 10) {
                                                echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-130"></i>', array('controller' => 'Categories', 'action' => 'edit', $category->id), array('class' => 'green', 'escape' => false));
                                                echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-130"></i>', array('controller' => 'Categories', 'action' => 'delete', $category->id), array('class' => 'red', 'escape' => false, 'confirm' => __('Are you sure you want to delete?')));
                                            } else {
                                                echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-130"></i>', array('controller' => 'Categories', 'action' => 'edit', $category->id), array('class' => 'grey', 'escape' => false, 'target'=>'_blank', 'onclick' => 'return false'));
                                                echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-130"></i>', array('controller' => 'Categories', 'action' => 'delete', $category->id), array('class' => 'grey', 'escape' => false, 'target'=>'_blank', 'onclick' => 'return false'));
                                            } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="paginator">
                        <ul class="pagination pull-right no-margin">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->