<?
	namespace app\models;

	use yii\db\ActiveRecord;

	/**
 * This is the model class for table "article".
 *
 * @property integer $exhibition_id
 * @property string $exName
 * @property string $author
 * @property string $content
 * @property string $date
 * @property string $time
 * @property integer $price
 * @property string $photo
 *
 */

	class  Exhibition extends ActiveRecord{

		public function  rules()
		{
			return[
				[['exName', 'content', 'author', 'price'], 'required'],
				[['date'], 'date', 'format'=>'php:Y-m-d'],
				['date', 'default', 'value' => date('Y-m-d')],
				// ['time', 'default', 'value' => time('h:m:c')],
				['photo', 'default', 'value' => 'sdfsd.jpg'],
				// [['time'], 'time', 'format'=>'php:hh:mm:cc'],
			];
		}

		public function attributeLabels()
		{
			return[
				'exhibition_id' => 'ID',
				'exName' => 'Название',
				'author' => 'Автор',
				'content' => 'Содержание',
				'date' => 'Дата',
				'time' => 'Время',
				'price' => 'Цена' ,
				'photo' => 'Фотография'
			];
		}

		// public function saveExhibition()
		// {
		// 	return $this->save();
		// }

		public static function getAll()
		{
			$data = self::find()->all();
			return $data;
		}

		public static function getOne($id)
		{
			$data = self::fine()
							->where(['exhibition_id'=>$exhibition_id])
							->one();

			return $data;
		}
	}





	// 	public $exhibition_id;
	// public $exName;
	// public $author;
	// public $content;
	// public $date;
	// public $time;
	// public $price;
	// public $photo;
	// public $i;
	// public $exName;