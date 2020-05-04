<?php

namespace frontend\controllers;

use yii\web\Controller;
use app\models\Users;

class UsersController extends Controller

{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $users = Users::find()->where(['role' => 2])->orderBy(['date_add' => SORT_DESC])->all();
        return $this->render('index',compact('users'));
    }
}
