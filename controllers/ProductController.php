<?php

namespace app\controllers;

use app\models\Category;
use app\models\CommentsForm;
use app\models\Favorite;
use app\models\Feedback;
use app\models\Product;
use Yii;
use yii\db\Query;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProductController extends Controller
{
    public function actionIndex($title)
    {
        $product = Product::find()->where(['title' => $title])->one();
        if ($product === null) {
            throw new NotFoundHttpException();
        }
        $commentsForm = new CommentsForm();
        $query = new Query();
        $feedbacks = $query->from('feedback')->join('LEFT JOIN', 'user', 'feedback.user_id = user.id')->where(['product_id' => $product->id])->orderby('feedback.id')->all();
        if ($commentsForm->load(Yii::$app->request->post()) && $commentsForm->validate()) {
            $feedback = new Feedback();
            $feedback->user_id = Yii::$app->user->id;
            $feedback->product_id = $product->id;
            $feedback->feedback = $commentsForm->comment;
            $feedback->save();
            $this->refresh();
        }
        return $this->render('index', compact('product', 'commentsForm', 'feedbacks'));
    }

    public function actionFavorite($title)
    {
        $product = Product::find()->where(['title' => $title])->one();
        $favorite = new Favorite();
        $favorite->user_id = Yii::$app->user->id;
        $favorite->product_id = $product->id;
        $favorite->save();
        $category = Category::find()->where(['id' => $product->category_id])->one();
        $this->redirect(Url::to(['/category', 'title' => $category->title]));
    }
}