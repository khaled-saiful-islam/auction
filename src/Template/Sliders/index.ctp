
<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-users home-icon"></i>
                    <?php echo $this->Html->link('Sliders', array('controller' => 'Sliders', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">View Slider Images</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>View Slider Images</h1>
            </div><!-- /.page-header -->
            <?php echo $this->Flash->render(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sliders as $slider): ?>
                                <tr>
                                    <td><?php echo h($slider->title) ?></td>
                                    <td><?php echo h($slider->description) ?></td>

                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <?php
                                            echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-130"></i>', array('controller' => 'Sliders', 'action' => 'edit', $slider->id), array('class' => 'green', 'escape' => false));
                                            echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-130"></i>', array('controller' => 'Sliders', 'action' => 'delete', $slider->id), array('class' => 'red', 'escape' => false, 'confirm' => __('Are you sure you want to delete?')));
                                            ?>
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