<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\comment;
use app\models\signup;



class SiteController extends Controller
{
  
   public function actionIndex()
   {
       return $this->render('index');
   }
    public function actionDoctors()
    {
        return $this->render('doctors');
    }
    public function actionServices()
    {
        return $this->render('services');
    }
    public function actionReviews()
    {
        $comment = comment::find()->all();
        return $this->render('comment', [
    'comment'=>$comment
        ]);
    }
    public function actionsignup()
    {
        $model = new signup();
        if(isset($_POST['signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');

            if($model->validate() &&  $model->Signup())
            {
                return $this->goHome();
            }
        }
        return $this->render('signup',
        ['model' => $model]);
    }
}
