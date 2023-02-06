<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\SortForm;
use PDO;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{

    public function actionIndex($title){
        $category = Category::find()->where(['title' => $title])->one();
        if ($category === null) {
            throw new NotFoundHttpException();
        }
        $products = Product::find()->where(['category_id' => $category->id]);

        $SortForm = new SortForm();

        if ($SortForm->load(Yii::$app->request->post()) && $SortForm->validate()) {
            if ($SortForm->methodSort === 'Date'){
                $products = $products->orderBy([
                    'date' => SORT_ASC
                ])->all();
            }
            if ($SortForm->methodSort === 'Popular'){
                $subQuery = (new Query())->select('product_id, COUNT(*) as comments')->from('feedback')->groupby(['product_id']);
                $products = (new Query())->from('product')->innerJoin(['u' => $subQuery], 'u.product_id = product.id')->orderBy(['comments' => SORT_ASC])->createCommand()->queryAll( PDO::FETCH_CLASS);
            }
        } else {
            $products = $products->all();
        }

        return $this->render('index', compact('products', 'SortForm'));
    }

}