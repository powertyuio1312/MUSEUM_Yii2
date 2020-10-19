<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "exhibition".
 *
 * @property int $exhibition_id
 * @property string $exName
 * @property string $author
 * @property string $content
 * @property string $date
 * @property string $time
 * @property int $price
 * @property string $photo
 * @property int $isDisplay
 *
 * @property Reservation[] $reservations
 * @property Starred[] $starreds
 */
class Exhibition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exhibition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exName', 'author', 'content', 'price'], 'required'],
            [['date', 'time'], 'safe'],
            [['price', 'isDisplay'], 'integer'],
            [['exName', 'author', 'photo'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'exhibition_id' => 'Exhibition ID',
            'exName' => 'Ex Name',
            'author' => 'Author',
            'content' => 'Content',
            'date' => 'Date',
            'time' => 'Time',
            'price' => 'Price',
            'photo' => 'Photo',
            'isDisplay' => 'Is Display',
        ];
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['exID' => 'exhibition_id']);
    }

    /**
     * Gets query for [[Starreds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStarreds()
    {
        return $this->hasMany(Starred::className(), ['exID' => 'exhibition_id']);
    }
}
