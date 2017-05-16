<div class="mens"></div>
<div class="main-content">
    <div class="main-content-inner">
        <?php echo $this->Flash->render(); ?>
        <div class="page-content">
            <div>
                <h2 class="head" style="margin-bottom: 20px;">Contact Us</h2>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php echo $this->Form->create('Contact', array('class' => 'form-horizontal', 'role' => 'form')) ?>
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Subject: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('subject', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Subject', 'label' => false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Message: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('message', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Message', 'label' => false, 'type' => 'textarea')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                        <div class="col-sm-9">
                            <button type="Submit" class="btn btn-white btn-info btn-bold">
                                <i class="ace-icon fa fa-mail-forward bigger-120 blue"></i>
                                Send
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