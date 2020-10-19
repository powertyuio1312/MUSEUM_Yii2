<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property string $login
 * @property string $email
 * @property string $password]
 *
 * @property Otzyvy[] $otzyvies
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    
    public function validatePassword($password)
    {
    return $this->password === sha1($password);
    
    }
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'email', 'password'], 'required'],
            [['login'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Otzyvies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOtzyvies()
    {
        return $this->hasMany(Otzyvy::className(), ['user_id' => 'id']);
    }

    
    
   public static function findIdentity($id)
   {
   return self::findOne($id);
   }
   
   public function getId()
   {
   return $this->id;
   }
   
   
   public static function findIdentityByAccessToken($token, $type = null)
   {
   
   }
   
   
   
   
   public function getAuthKey()
   {
   
   
   }
   
   public function validateAuthKey($authKey)
   {
   
   }
   
}
