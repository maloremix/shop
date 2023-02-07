<?php

/** @var yii\web\View $this */

/** @var $favoriteProducts */
/** @var $popularCategoriesTitle */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Избранные товары</h2>
                <?php foreach ($favoriteProducts as $favorite): ?>
                    <div><?= Html::a($favorite['title'], [Url::to('/product'), 'title' => $favorite['title']]); ?></div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4">
                <h2>Популярные категории</h2>

                <?php foreach ($popularCategoriesTitle as $popularCategory): ?>
                    <div><?= Html::a($popularCategory['title'], [Url::to('/category'), 'title' => $popularCategory['title']]); ?></div>
                <?php endforeach; ?>

                </p>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</div>
