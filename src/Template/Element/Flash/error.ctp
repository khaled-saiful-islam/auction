<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="<?php echo h($class) ?>">
    <i class="ace-icon fa fa-times"></i>
    <?php echo h($message) ?>
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>
</div>