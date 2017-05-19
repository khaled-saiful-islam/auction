<div class="main-content">
    <div class="main-content-inner">
        <?php echo $this->Flash->render(); ?>
        <div class = "breadcrumbs ace-save-state" id = "breadcrumbs">
            <ul class = "breadcrumb">
                <li>
                    <i class = "ace-icon fa fa-money home-icon"></i>
                    <?php echo $this->Html->link('Payment Notification', array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false))
                    ?>
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>Payment Notification</h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $this->Form->create(null, array('url' => array('controller' => 'Payments', 'action' => 'registrationFee'), 'class' => 'form-horizontal', 'role' => 'form')) ?>
                    <?php echo $this->Form->hidden('user_id', array('value' => $loginUser['id'])); ?>
                    <?php echo $this->Form->hidden('name', array('value' => $loginUser['name'])); ?>
                    <?php echo $this->Form->hidden('payment_type', array('value' => 1)); ?>
                    <?php echo $this->Form->hidden('amount', array('value' => $amount)); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Card Holder's Name: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('card_holder_name', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => "Card Holder's Name", 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Card Number: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('card_number', array('class' => 'col-xs-10 col-sm-5', 'placeholder' => "Card Number", 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Card Expiry Date: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('expire_date', array('class' => 'col-xs-10 col-sm-4', 'placeholder' => "MM/YYYY", 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Card CVV: </label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('card_cvv', array('class' => 'col-xs-10 col-sm-4', 'placeholder' => "Card CVV", 'label' => false, 'required' => true)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                        <div class="col-sm-9">
                            <button type="Submit" class="btn btn-white btn-info btn-bold">
                                <i class="ace-icon fa fa-money bigger-120 blue"></i>
                                Pay
                            </button>
                        </div>                            
                    </div>

                    <?php echo $this->Form->end() ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
</div>