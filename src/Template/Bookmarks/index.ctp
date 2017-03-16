
<div class="main-content">
    <div class="main-content-inner">
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-bookmark home-icon"></i>
                    <?php echo $this->Html->link('Bookmarks', array('controller' => 'Bookmarks', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">View Bookmarks</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>View Bookmarks</h1>
            </div><!-- /.page-header -->
            <?php echo $this->Flash->render(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Code</th>
                                <th>Latest Price</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookmarks as $bookmark): ?>
                                <?php
                                $product = $this->Common->findProduct($bookmark['product_id']);


                                $c_date = strtotime(date('Y-m-d H:i'));
                                $s_date = strtotime($product['start_date']);
                                $e_date = strtotime($product['end_date']);
                                ?>
                                <tr>
                                    <td><b class="green"><?php echo $product['title']; ?></b></td>
                                    <td><b class="blue"><?php echo $product['code']; ?></b></td>
                                    <td><b class="red"><?php echo $product['highest_bid']; ?></b></td>
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
                                            echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-130"></i>', array('controller' => 'Bookmarks', 'action' => 'delete', $bookmark['id']), array('class' => 'red', 'escape' => false, 'confirm' => __('Are you sure you want to delete?')));
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