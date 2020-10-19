<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Comment;
use app\models\Signup;
use app\models\login;
use app\models\Exhibition;
use app\models\CommentForm;
use app\models\User;
use yii\data\Pagination;





class AdminController extends Controller
{

	public function actionIndex(){
		$arr = Exhibition::getAll();

		return $this->redirect('index', ['model'=>$arr]);
	}

	public function actionEdit($id)
	{
		$one = Exhibition::getOne($id);

		if($_POST['Exhibition'])
		{
			$one->title = $_POST['Exhibition']['title'];
			$one->description = $_POST['Exhibition']['description'];

			if($one->validate() && $one->save())
			{
				return $this->redirect(['index']);
			}
		}

		return $this->render('edit', compact('one'));
	}


	public function actionCreate()
	{
		$model = new Exhibition();

		if($_POST['Exhibition'])
		{
			$model->title = $_POST['Exhibition']['title'];
			$model->description = $_POST['Exhibition']['description'];

			if($model->validate() && $model->save())
			{
				return $this->redirect(['index']);
			}
		}

		return $this->render('create', compact('model'));
	}

}

