<?php

namespace frontend\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Tasks;

class TasksController extends Controller

{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $tasks = Tasks::find()->where(['status_id' => 1])->orderBy(['date_add' => SORT_DESC])->all();
        return $this->render('index',compact('tasks'));
    }
}
