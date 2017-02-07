<div class="main-content">
    <div class="main-content-inner">        
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-barcode home-icon"></i>
                    <?php echo $this->Html->link('Products', array('controller' => 'Products', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">Edit Product</li>
            </ul>
        </div>
        <?php echo $this->Flash->render(); ?>
        <div class="page-content">
            <div class="page-header">
                <h1>Edit Product</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php echo $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')) ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Code: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('code', array('pattern' => '.{3,}', 'title' => 'Minimum length 3', 'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Code', 'label' => false, 'value' => $product['code'], 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('title', array('pattern' => '.{4,}', 'title' => 'Minimum length 4', 'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Title', 'label' => false, 'value' => $product['title'], 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('category_string', array('multiple' => true, 'id' => 'multiple_tag', 'options' => (isset($tag) && !empty($tag)) ? $tag : array(), 'value' => (isset($selectedTag) && !empty($selectedTag)) ? $selectedTag : array(), 'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Category', 'label' => false, 'type' => 'select', 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Details: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('details', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Details', 'label' => false, 'type' => 'textarea', 'value' => $product['details'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Minimum Bid: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('minimum_bid', array('class' => 'spin-box-bid', 'placeholder' => 'Minimum Bid', 'label' => false, 'type' => 'text', 'value' => $product['minimum_bid'])); ?>
                            <div class="space-6"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Minimum Increment: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('minimum_increment', array('class' => 'spin-box-bid', 'placeholder' => 'Minimum Increment', 'label' => false, 'type' => 'text', 'value' => $product['minimum_increment'])); ?>
                            <div class="space-6"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Start Bidding Time: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('start_date', array('class' => 'col-xs-10 col-sm-5 date-timepicker', 'placeholder' => 'Start Bidding Time', 'label' => false, 'type' => 'text', 'value' => (isset($product['start_date']) && !empty(isset($product['start_date']))) ? date('Y-m-d H:i', strtotime($product['start_date'])) : '')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> End Bidding Time: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('end_date', array('class' => 'col-xs-10 col-sm-5 date-timepicker', 'placeholder' => 'End Bidding Time', 'label' => false, 'type' => 'text', 'value' => (isset($product['end_date']) && !empty(isset($product['end_date']))) ? date('Y-m-d H:i', strtotime($product['end_date'])) : '')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 1: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('image1_path', array('class' => 'col-xs-10 col-sm-5 upload_file', 'placeholder' => 'Image', 'label' => false, 'type' => 'file')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 2: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('image2_path', array('class' => 'col-xs-10 col-sm-5 upload_file', 'placeholder' => 'Image', 'label' => false, 'type' => 'file')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 3: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('image3_path', array('class' => 'col-xs-10 col-sm-5 upload_file', 'placeholder' => 'Image', 'label' => false, 'type' => 'file')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 4: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('image4_path', array('class' => 'col-xs-10 col-sm-5 upload_file', 'placeholder' => 'Image', 'label' => false, 'type' => 'file')); ?>
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
<script type="text/javascript">
    $('.upload_file').ace_file_input({
        no_file: 'No File ...',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
    });

    $('.spin-box-bid').ace_spinner({value: 0, min: 0, max: 90000, btn_up_class: 'btn-info', btn_down_class: 'btn-info'});

    $("#multiple_tag").select2({
        placeholder: "Select a Category",
        allowClear: true
    });


    $('.date-timepicker').datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
    });
</script>