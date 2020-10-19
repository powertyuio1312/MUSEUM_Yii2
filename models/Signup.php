<?php
namespace app\models;
use yii\base\Model;

class Signup extends Model
{

    public $login;
    public $email;
    public $password;

public function attributeLabels(){
    return[
        'login'=>'Логин',
        'email'=>'E-mail', 
        'password'=>'Пароль',
        
    ];
}
public function rules() {
    return [
        [['login','email', 'password'], 'required', 'message'=>'Поле не может быть пустым'],
        [['password'],'string', 'min'=>6, 'message'=>'Пароль должен содержать не менее 6 символов'],
        ['email','unique', 'targetClass'=>'app\models\User', 'message'=>'Email адрес уже используется'],
        ['login','unique', 'targetClass'=>'app\models\User', 'message'=>'Такой логин уже используется'],
        ['email', 'email', 'message'=>'Некорректный email адрес']];
    }

    public function signup()
    {
        $user = new User();
        $user->login = $this->login;
        $user->email = $this->email;
        $user->password = sha1($this->password);
       // $reg->password_repeat = $this->password_repeat;
        return $user->save();
    }
}