<?php
namespace app\models;
use yii\base\Model;
use Yii;


class Order extends Model
{

    public $name;
    public $surname;

public function attributeLabels(){
    return[
        'name'=>'Имя',
        'surname'=>'Фамилия',
        
    ];
}
public function rules() {
    return [
        [['name','surname'], 'required', 'message'=>'Поле не может быть пустым'],
        [['name'],'string', 'min'=>2, 'message'=>'Имя должно содержать не менее 2 символов'],
        [['surname'],'string', 'min'=>2, 'message'=>'Фамилия должна содержать не менее 2 символов']
        ];
    }

    public function saveOrder($id)
    {
        // var_dump('ssssssssss');die();
        $order = new Reservation();
        $order->name = $this->name;
        $order->surname = $this->surname;
        $order->userID = Yii::$app->user->id;
        $order->exID = $id;

        // $login = Yii::$app->user->identity->login;
        // var_dump($login);die();

        return $order->save();
    }
}