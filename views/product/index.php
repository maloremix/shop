<?php


/** @var app\models\CommentsForm $commentsForm */
/** @var app\models\Product $product */
/** @var $feedbacks */



use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="body-content">

    <div class="row">
        <div class="col-lg-6">
            <div class="title"><?=$product->title;?></div>
            <?=(Html::img('../web/uploads/' . $product->image, ['witgh' => 300, 'height' => 300]));?>
        </div>
    </div>

    <?php
    foreach($feedbacks as $feedback)
    {
        echo "<div>" . $feedback['username'] . "</div>";
        echo "<div class='border border-danger'>" . $feedback['feedback'] . "</div>";
    }
    ?>

    <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']])?>
    <?= $form->field($commentsForm, 'comment')->textarea(['class' => 'form-control', 'placeholder' => 'Напишите сообщение']) ?>
    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php $form = ActiveForm::end()?>
</div>

