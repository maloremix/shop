<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProductController extends Controller
{
    public function actionIndex($title){
        $product = Product::find()->where(['title' => $title])->one();
        if ($product === null){
            throw new NotFoundHttpException();
        }
        return $this->render('index', compact('product'));
    }
}