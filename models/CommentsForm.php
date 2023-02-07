<?php

namespace app\models;

use yii\base\Model;

class CommentsForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string'],
        ];
    }
}