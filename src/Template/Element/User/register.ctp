
<div id="signup-box" class="signup-box widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger">
                <i class="ace-icon fa fa-users blue"></i>
                User Registration
            </h4>

            <?php echo $this->Form->create('User', array('id' => 'addUser')) ?>
            <fieldset>
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo $this->Form->input('name', array('pattern' => '.{8,}', 'title' => 'Minimum length 8', 'class' => 'form-control', 'placeholder' => 'Name', 'label' => false, 'required' => true)); ?>
                        <i class="ace-icon fa fa-user"></i>
                    </span>
                </label>

                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email', 'label' => false, 'required' => true)); ?>
                        <i class="ace-icon fa fa-envelope"></i>
                    </span>
                </label>

                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo $this->Form->input('password', array('pattern' => '.{6,}', 'title' => 'Minimum length 6', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'type' => 'password', 'required' => true)); ?>
                        <i class="ace-icon fa fa-lock"></i>
                    </span>
                </label>

                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo $this->Form->input('address', array('class' => 'form-control', 'placeholder' => 'Address', 'label' => false)); ?>
                        <i class="ace-icon fa fa-home"></i>
                    </span>
                </label>

                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <?php echo $this->Form->input('phone_number', array('class' => 'form-control input-mask-phone', 'placeholder' => 'Cell Number', 'label' => false)); ?>
                        <i class="ace-icon fa fa-phone"></i>
                    </span>
                </label>

                <div class="space-24"></div>

                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Reset</span>
                    </button>

                    <button type="Submit" class="width-65 pull-right btn btn-sm btn-success">
                        <span class="bigger-110">Register</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </fieldset>
            <?php echo $this->Form->end() ?>
        </div>

        <div class="toolbar center">
            <a href="#" data-target="#login-box" class="back-to-login-link">
                <i class="ace-icon fa fa-arrow-left"></i>
                Back to login
            </a>
        </div>
    </div><!-- /.widget-body -->
</div><!-- /.signup-box -->

<div id="loading_text">
    <?php echo $this->Html->image('ajax-loader.gif', ['alt' => ""]); ?>
</div>