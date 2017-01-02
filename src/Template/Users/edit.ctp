<div class="main-content">
    <div class="main-content-inner">        
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-users home-icon"></i>
                    <?php echo $this->Html->link('Users', array('controller' => 'Users', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
                <li class="active">Edit User</li>
            </ul>
        </div>
        <?php echo $this->Flash->render(); ?>
        <div class="page-content">
            <div class="page-header">
                <h1>Edit User</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php echo $this->Form->create($user, array('class' => 'form-horizontal', 'role' => 'form')) ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('name', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Name', 'label' => false, 'required' => true)); ?>
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
                            <?php echo $this->Form->input('password', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Password', 'label' => false, 'type' => 'password', 'value' => '', 'required' => false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                        <div class="col-sm-9">
                            <button type="Submit" class="btn btn-white btn-info btn-bold">
                                <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
                                Edit
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
