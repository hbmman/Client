<?php
/** @var $model \app\core\Model */

use app\core\form\Form;

$form = new Form();
?>

    <h1>Neuer Eintrag</h1>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'title') ?>
<?php echo $form->field($model, 'imagelink')?>
<?php echo $form->textareaField($model, 'content') ?>

    <button class="btn btn-success">Submit</button>
<?php Form::end() ?>
