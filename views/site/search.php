<?php
    use yii\helpers\Html;
    use yii\bootstrap\Carousel;
    use yii\bootstrap\widget;
    use yii\bootstrap\BootstrapWidgetTrait;
    use yii\widget\LinkPager;
    use yii\widgets\ActiveForm;

        $this->title = 'Результаты поиска по сайту';
?>



		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<ul class="ul-category" >
						<li><?= Html::a('Прошедшие', ['my/current']) ?></li>
						<li><?= Html::a('Ближайшие', ['my/current']) ?></li>
						<li><img src="img/Лого/лого2.png" width="100%"></li>
					</ul>
				</div>
				<div class="col-sm-8 ">
					<h1>Поиск по запросу: <?= Html::encode($search) ?></h1>
					<div class="row text-center justify-content-center ex-block">
						
<div class='container'>
<? if(!empty($exhibitions)) : ?>
<? foreach ($exhibitions as $exhibition): ?>
        
        <? if($exhibition['isDisplay'] == 1) : ?>
        <div class='row ex-row'>
    				<div class='col-sm-4 img-block'>
    					<img  src='img/<?=$exhibition['photo']?>'>
    				</div>
    				<div class='col-sm-8 ex-info'>
                        <form method='POST'>
        					<h3><?=$exhibition['exName']?></h3>
        					<h4><?=$exhibition['author']?></h4>

            				<a href="<?=\yii\helpers\Url::to(['current', 'id'=>$exhibition["exhibition_id"]])?>">Узнать больше</a>

            				<div class='dateprice'>
            									<label><?=$exhibition['date']?></label>
            									<label><?=$exhibition['time']?></label>
            									<label><?=$exhibition['price']?> р</label>
        					</div>
                        </form>
    				</div>
    	</div>


        <? endif ?>
    <? endforeach ?>
<? else : ?>
<h2>Не найдено результатов</h2>
<? endif ?>

<? if(!empty($pagination)) : ?>
   <? echo yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
    ]);
    ?>	
<? endif ?>


</div>
</div>
</div>
</div>
</div>