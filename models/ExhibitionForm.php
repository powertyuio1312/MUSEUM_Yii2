<?
namespace app\models;

use yii\base\Model;
use Yii;

/**
 * 
 */
class ExhibitionForm extends Model
{
	public $exhibition_id;
	public $exName;
	public $author;
	public $content;
	public $date;
	public $time;
	public $price;
	public $photo;

	public function attributeLabels(){
		return[
			'exName' => 'Название выставки',
			'exhibition_id' => 'id',
			'author' => 'Автор',
			'content' => 'Содержание',
			'date' => 'Дата',
			'time' => 'Время',
			'price' => 'Цена',
			'photo' => 'Название фото',
		];
	}

	public function rules(){
		return[
			[['exName'],  'required', 'message' => 'Необходимо заполнить поле'],
		];
	}	

	public function saveExhibition()
	{
		// var_dump('save'); die();
		$exhibition = new Exhibition();

		$exhibition->exName = $this->exName;
		$exhibition->author = $this->author;
		$exhibition->content = $this->content;
		$exhibition->date = $this->date;
		$exhibition->price = $this->price;
		$exhibition->time = $this->time;
		$exhibition->photo = $this->photo;


		return $exhibition->save();
	}

	public function delExhibition($name)
	{
		// $ex = Exhibition::Find()->where($this->exName = $name);
		// return $ex->delete();
// //////////////////////////////////////////
		// $comment = new Comment();
		// $comment->text = $this->text;
		// $comment->userID = Yii::$app->user->id;
		// $comment->status = 0;

		// // $login = Yii::$app->user->identity->login;
		// // var_dump($login);die();

		// return $comment->save();

		$model = new ExhibitionForm();

		if($model->load(Yii::$app->request->post()) && $model->validate())
		{
			$q_ex = new Exhibition();

			$q_ex->exName = $model->exName;

		}
	}


}