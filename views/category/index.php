<?php
/** @var $products */

/** @var $SortForm */

use app\models\Favorite;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="body-content">

    <div class="row">
        <div class="col-lg-6">
            <h2>Heading</h2>
            <?php foreach ($products as $product): ?>
                <div class="row">
                    <div class="col-lg-6">
                        <?= Html::a($product->title, [Url::to('/product'), 'title' => $product->title]); ?>
                        <?php if (Favorite::find()->where(['user_id' => Yii::$app->user->id, 'product_id' => $product->id])->exists()): ?>
                            <?php echo "<div>Товар уже добавлен в избранное</div>"; ?>
                        <?php else: ?>
                            <?= Html::a("Добавить в избранное", [Url::to('/product/favorite'), 'title' => $product->title]); ?>

                        <?php endif ?>
                        <?= (Html::img('../web/uploads/' . $product->image, ['witgh' => 300, 'height' => 300])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-6">
            <?php
            $form = ActiveForm::begin();
            echo $form->field($SortForm, 'methodSort')->dropDownList([
                'Date' => 'Date',
                'Popular' => 'Popular',
            ]);
            ?>
            <div class="form-group">
                <div class="col-lg-12">
                    <?= Html::submitButton('Сортировать', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
