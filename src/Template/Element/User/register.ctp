
<div id="signup-box" class="signup-box widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger">
                <i class="ace-icon fa fa-users blue"></i>
                New User Registration
            </h4>

            <div class="space-6"></div>
            <p> Enter your details to begin: </p>

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

                <label class="block">
                    <input type="checkbox" class="ace" />
                    <span class="lbl">
                        I accept the
                        <a href="#">User Agreement</a>
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
    <img src="img/ajax-loader.gif" />
</div>