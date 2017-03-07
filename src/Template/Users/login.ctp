<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h2 class="blue" id="id-company-text">Auction Site</h2>
                    </div>
                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        Please Enter Your Information
                                    </h4>

                                    <?php echo $this->Flash->render() ?>

                                    <?php echo $this->Form->create() ?>
                                    <fieldset>
                                        <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email', 'label' => false, 'required' => true)); ?>
                                                <i class="ace-icon fa fa-envelope"></i>
                                            </span>
                                        </label>

                                        <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'type' => 'password', 'required' => true)); ?>
                                                <i class="ace-icon fa fa-lock"></i>
                                            </span>
                                        </label>

                                        <div class="space-24"></div>

                                        <div class="clearfix">
                                            <div>
                                                <?php echo $this->Html->link('<i class="ace-icon fa fa-refresh"></i>Back', array('controller' => 'Dashboard', 'action' => 'index'), array('class' => 'width-30 pull-left btn btn-sm', 'escape' => false)) ?>
                                            </div>

                                            <button type="Login" class="width-35 pull-right btn btn-sm btn-primary">
                                                <i class="ace-icon fa fa-key"></i>
                                                <span class="bigger-110">Login</span>
                                            </button>
                                        </div>
                                    </fieldset>
                                    <?php echo $this->Form->end() ?>
                                </div><!-- /.widget-main -->

                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            I forgot my password
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" data-target="#signup-box" class="user-signup-link">
                                            I want to register
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                        <?php echo $this->element('User/forgotPassword') ?>
                        <?php echo $this->element('User/register') ?>

                    </div><!-- /.position-relative -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->
