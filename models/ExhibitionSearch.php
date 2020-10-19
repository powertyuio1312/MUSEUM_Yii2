<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exhibition;

/**
 * 
 */
class ExhibitionSearch extends Exhibition
{
	
	public function rules()
	{
		return [
			[['exhibition_id', 'price'], 'integer'],
			[['exName', 'content', 'author', 'photo', 'date', 'time'], 'safe'],
		];
	}

	public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    //////////


    public function search($params)
    {
        $query = Exhibition::find();
        $w = 0;

        // chto vyvodit???????????????????????????????????????????????????????????
        foreach ($query as $q) {
            echo $w++;
           echo $q->exName."<br>";
        }

        echo $query;
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // var_dump($params); die();//////////////////////////////////////////////////////////////////////////////////////////

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'exhibition_id' => $this->exhibition_id,
            'date' => $this->date,
            'author' => $this->author,
        ]);

        $query->andFilterWhere(['like', 'exName', $this->exName])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'time', $this->time]);

        return $dataProvider;
    }
}