<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-barcode home-icon"></i>
                    <?php echo $this->Html->link('Products', array('controller' => 'Products', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">View Products</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>View Products</h1>
            </div><!-- /.page-header -->
            <?php echo $this->Flash->render(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="detail-col">Details</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Min Bid</th>
                                <th>Min Increment</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <?php
                                $c_date = strtotime(date('Y-m-d H:i'));
                                $s_date = strtotime($product['start_date']);
                                $e_date = strtotime($product['end_date']);
                                ?>
                                <tr>
                                    <td>
                                        <div class="action-buttons">
                                            <?php echo $this->Html->link('<i class="ace-icon fa fa-barcode"></i><span class="sr-only">Details</span>', array('controller' => 'Products', 'action' => 'view', $product->id, 'index'), array('class' => 'blue bigger-140 show-details-btn', 'escape' => false)) ?>
                                        </div>
                                    </td>
                                    <td><?php echo h($product->code) ?></td>
                                    <td><?php echo h($product->title) ?></td>
                                    <td><?php echo h($product->minimum_bid) ?></td>
                                    <td><?php echo h($product->minimum_increment) ?></td>
                                    <td>                                                
                                        <?php if ((isset($product['winner_id']) && !empty($product['winner_id'])) && $e_date < $c_date) { ?>
                                            <span class="label label-danger arrowed-in-right">
                                                Sold Product
                                            </span>
                                        <?php } else if (($product['isPause'] < 1) && ($s_date <= $c_date) && $e_date >= $c_date) { ?>
                                            <span class="label label-warning arrowed-in-right">
                                                Auction On Going
                                            </span>
                                        <?php } else {
                                            ?>
                                            <span class="label label-success arrowed-in-right">
                                                New Product
                                            </span>
                                        <?php }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <?php
                                            echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-130"></i>', array('controller' => 'Products', 'action' => 'edit', $product->id), array('class' => 'green', 'escape' => false));
                                            echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-130"></i>', array('controller' => 'Products', 'action' => 'delete', $product->id), array('class' => 'red', 'escape' => false, 'confirm' => __('Are you sure you want to delete?')));
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