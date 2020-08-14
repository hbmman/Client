<?php
/** @var Model[] $model */

use app\core\form\Form;
use app\core\Model;

$form = new Form();
//var_dump($model)
?>
<h1>Übersicht</h1>
<?php //$form = Form::begin('', 'post')?>
<?php //foreach ($model as $articles => $article):?>
<?php //$article = new Model()?>
<!--<div class="card" style="width: 100%;">-->
<!--    <div class="card-body">-->
<!--        <h5 class="card-title">Title:--><?php //echo $form->field($article, 'title')->renderOutput() ?><!--</h5>-->
<!--        <div class="card-title">Bild:--><?php //echo $form->field($article, $article['imagelink'])->renderOutput() ?><!--</div>-->
<!--        <div class="card-title">Artikel--><?php //echo $form->field($article, $article['content'])->renderOutput() ?><!--</div>-->
<!--        <div class="card-title">Author:--><?php //echo $form->field($article, $article['author'])->renderOutput() ?><!--</div>-->
<!--        <div class="card-title">Erstellungsdatum--><?php //echo $form->field($article, $article['created_at'])->renderOutput() ?><!--</div>-->
<!--    </div>-->
<!--</div>-->
<?php //endforeach;?>
<?php //$form = Form::end()?>
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">
        {{component}}
    </div>
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>

</footer>

