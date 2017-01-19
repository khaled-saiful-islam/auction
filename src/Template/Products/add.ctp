
<div class="main-content">
    <div class="main-content-inner">        
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-barcode home-icon"></i>
                    <?php echo $this->Html->link('Products', array('controller' => 'Products', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">Add Product</li>
            </ul>
        </div>
        <?php echo $this->Flash->render(); ?>
        <div class="page-content">
            <div class="page-header">
                <h1>Add Product</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php echo $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')) ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Code: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('code', array('pattern' => '.{3,}', 'title' => 'Minimum length 3', 'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Code', 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('title', array('pattern' => '.{4,}', 'title' => 'Minimum length 4', 'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Title', 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Details: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('details', array('class' => 'col-xs-10 col-sm-7', 'placeholder' => 'Details', 'label' => false, 'type' => 'textarea')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                        <div class="col-sm-9">
                            <button type="Submit" class="btn btn-white btn-info btn-bold">
                                <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
                                Save
                            </button>
                        </div>                            
                    </div>
                    <?php echo $this->Form->end() ?>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->