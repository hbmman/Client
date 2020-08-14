<?php
/** @var $model \app\core\Model */

use app\core\form\Form;

$form = new Form();
?>

<h1> Article</h1>

<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title">Title:<?php echo $form->field($model, 'title')->renderOutput() ?></h5>
        <div class="card-title">Bild:<?php echo $form->field($model, 'imagelink')->renderOutput() ?></div>
        <div class="card-title">Artikel<?php echo $form->field($model, 'content')->renderOutput() ?></div>
        <div class="card-title">Author:<?php echo $form->field($model, 'author')->renderOutput() ?></div>
        <div class="card-title">Erstellungsdatum<?php echo $form->field($model, 'created_at')->renderOutput() ?></div>
    </div>
</div>
<?php Form::end() ?>


<!--<div class="card" style="width: 18rem;">-->
<!--    <img src="..." class="card-img-top" alt="...">-->
<!--    <div class="card-body">-->
<!--        <h5 class="card-title">Card title</h5>-->
<!--        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--        <a href="#" class="btn btn-primary">Go somewhere</a>-->
<!--    </div>-->
<!--</div>-->
