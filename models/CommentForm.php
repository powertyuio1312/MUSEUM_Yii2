<?
namespace app\models;

use yii\base\Model;
use Yii;

/**
 * 
 */
class CommentForm extends Model
{
	
	public $text;

	public function attributeLabels(){
		return[
			'text' => 'Оставить комментарий',
		];
	}

	public function rules(){
		return[
			[['text'], 'required', 'message' => 'Необходимо ввести текст'],
			['text', 'string', 'min' => 2, 'max' => 400],
		];
	}	

	public function saveComment()
	{
		$comment = new Comment();
		$comment->text = $this->text;
		$comment->login = Yii::$app->user->identity->login;
		$comment->status = 0;

		// $login = Yii::$app->user->identity->login;
		// var_dump($login);die();

		return $comment->save();
	}


}

