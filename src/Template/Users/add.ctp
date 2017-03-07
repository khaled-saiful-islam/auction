<div class="main-content">
    <div class="main-content-inner">        
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-users home-icon"></i>
                    <?php echo $this->Html->link('Users', array('controller' => 'Users', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">Add User</li>
            </ul>
        </div>
        <?php echo $this->Flash->render(); ?>
        <div class="page-content">
            <div class="page-header">
                <h1>Add User</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')) ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('name', array('pattern' => '.{8,}', 'title' => 'Minimum length 8', 'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Name', 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('email', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Email', 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('password', array('pattern' => '.{6,}', 'title' => 'Minimum length 6', 'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Password', 'label' => false, 'type' => 'password', 'required' => true)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('address', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Address', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cell Phone: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('phone_number', array('class' => 'col-xs-10 col-sm-5 input-mask-phone', 'placeholder' => 'Cell Phone', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Profile Image: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('image_path', array('class' => 'col-xs-10 col-sm-5 upload_file', 'placeholder' => 'Image', 'label' => false, 'type' => 'file')); ?>
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
    $('.input-mask-phone').mask('(999) 99999999');
</script>