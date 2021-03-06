<div class="main-content">
    <div class="main-content-inner">        
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-cog home-icon"></i>
                    <?php echo $this->Html->link('Nivo Slider', array('controller' => 'Sliders', 'action' => 'nivoIndex'), array('escape' => false))
                    ?>
                </li>
                <li class="active">Add Nivo Slider Image</li>
            </ul>
        </div>
        <?php echo $this->Flash->render(); ?>
        <div class="page-content">
            <div class="page-header">
                <h1>Add Nivo Slider Image</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php echo $this->Form->create('Slider', array('class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')) ?>
                    <?php echo $this->Form->hidden('type', array('value' => 2)); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('title', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Image Title', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Slider Image: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('image_path', array('class' => 'col-xs-10 col-sm-5 upload_file', 'placeholder' => 'Image', 'label' => false, 'type' => 'file', 'required' => true)); ?>
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
</script>