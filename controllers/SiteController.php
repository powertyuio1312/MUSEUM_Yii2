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
use app\models\ExhibitionForm;
use app\models\CommentForm;
use app\models\User;
use app\models\Order;
use app\models\Reservation;

use yii\data\Pagination;





class SiteController extends Controller
{
  
public function actionIndex(){

    $exhibitions = Exhibition::find()->asArray()->all();
    //$users = User::find()->asArray()->all();

    // var_dump(Yii::$app->user->identity); die();

    return $this -> render('index', ['exhibitions'=>$exhibitions]);
  }



   public function actionLogout() 
  {
    if(!Yii::$app->user->isGuest)
    {
       Yii::$app->user->logout();
       return $this->redirect(['login']);
    }  
  }
public function actionSignup()
  {
        $model = new Signup();
        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup())
            {
               return  $this->goHome();
            }
        }
        return $this->render('signup', ['model'=>$model]);
  }
  
  public function actionLogin()
  {
     // if(!Yii::$app->isGuest)
     //  {
    //      return $this->goHome();
    //   }
      $login_model = new Login();
     
      if(Yii::$app->request->post('Login'))
      {
       $login_model->attributes=Yii::$app->request->post('Login');

       if($login_model->validate())
       {
           Yii::$app->user->login($login_model->getUser());
           return $this->goHome();
       }
      }
      return $this->render('login',
    ['login_model'=>$login_model]);
  }

  public function actionCurrent($id)
  {
    $exhibition = Exhibition::findOne($id);
    return $this->render('current', compact('exhibition'));
  }




    public function actionExhibitions()
  {
    // пагинация
    $query = Exhibition::find();

      $count = $query->count();
      
      $pagination = new Pagination(['totalCount' =>$count, 'pageSize'=>2]);
      
      $exhibitions = $query->offset($pagination->offset)
          ->limit(2)
          ->all();

          //////

    return $this->render('exhibitions', compact('exhibitions','pagination'));
  }


  public function actionComment()
  {
    // $id = 19;
    $model = new CommentForm();

    if(Yii::$app->request->isPost)
    {
      $model->load(Yii::$app->request->post());

      if($model->saveComment())
      {
        return $this->redirect(['reviews']);
      }
    
    }
  }
    

  public function actionReviews()
  {
    $query = Comment::find();

      $count = $query->count();
      
      $pagination = new Pagination(['totalCount' =>$count, 'pageSize'=>5]);
      
      $comments = $query->offset($pagination->offset)
          ->limit(5)
          ->all();



     $comment_form = new CommentForm();
     // $userName = User::find()->where('id = :id',[':id'=>1])->one();

      return $this->render('reviews', compact('comments', 'comment_form','pagination'));
  }

  // public function actionOffice()
  // {
  //   return $this->render('office');
  // }

  public function actionSearch()
  {

    $search = trim(Yii::$app->request->get('search'));

    if(!$search)
    {
      return $this->render('search');
    }
    $query = Exhibition::find()->where(['like', 'content', $search]);


      
      $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize'=>2]);
      
      $exhibitions = $query->offset($pagination->offset)
          ->limit(2)
          ->all();


          return $this->render('search', compact('exhibitions', 'pagination', 'search' ));

  }

  public function actionGetorder($id)
  {
      $model = new Order();

      if(Yii::$app->request->isPost)
      {
         $model->load(Yii::$app->request->post());

          if($model->saveOrder($id))
          {
              return $this->redirect(['exhibitions']);
          }
      }

    $exhibition = Exhibition::findOne($id);
    return $this->render('getorder', compact('exhibition', 'model'));
  
}

public function actionOffice()
{
      $userID = Yii::$app->user->id;

      $query = Reservation::find()->where('userID = :id', [':id' => $userID])->asArray()->all();

      $orders = Array();

      foreach ($query as $q) 
      {
        $exhibition = Exhibition::find()->where('exhibition.exhibition_id = :id', [':id' => $q['exID']])->one();

        array_push($orders, $exhibition);
      }

      return $this->render('office', compact('orders')); 
}

public function actionPersonaldata()
{
  $userID = Yii::$app->user->id;

  $count = Reservation::find()->where('userID = :id', [':id' => $userID])->asArray()->count();

  return $this->render('personaldata', compact('count'));
}


public function actionAdmin()
    {
            $model = new ExhibitionForm(); 
            $query = Exhibition::find()->all();


            if(Yii::$app->request->isPost) // delete
            { 
               $chosen->load(Yii::$app->request->post());

                $this->findModel($chosen->exhibition_id)->delete();

                    return $this->redirect(['admin']);
                
            }

                // $exModel = new ExhibitionForm();


      if(Yii::$app->request->isPost) // CREATE
      {
          $model->load(Yii::$app->request->post());

          if($model->saveExhibition())
          {
              return $this->redirect(['admin']);
          }
          else
              echo "dsdfdssfd";                  

          }
          


      return $this->render('admin', compact('model', 'query'));
 
    }





}