<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Exhibition */

$this->title = 'Update Exhibition: ' . $model->exhibition_id;
$this->params['breadcrumbs'][] = ['label' => 'Exhibitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->exhibition_id, 'url' => ['view', 'id' => $model->exhibition_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exhibition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
