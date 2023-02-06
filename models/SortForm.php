<?php

namespace app\models;

use yii\base\Model;

class SortForm extends Model
{

    public $methodSort;


    public function rules(){
        return [
            [['methodSort'], 'safe'],
        ];
    }
}