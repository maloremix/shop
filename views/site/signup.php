<?php
/** @var app\models\SignupForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$form = ActiveForm::begin() ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<div class="form-group">
    <div class="col-lg-12">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>