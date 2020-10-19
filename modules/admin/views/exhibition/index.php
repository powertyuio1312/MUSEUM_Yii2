<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Выставки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exhibition-index">
<div  style="text-align:  center;">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить выставку', ['create'], ['class' => 'btn btn-success butt']) ?>
    </p>

</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'exhibition_id',
            'exName',
            'author',
            'content',
            'date',
            //'time',
            //'price',
            //'photo',
            //'isDisplay',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
