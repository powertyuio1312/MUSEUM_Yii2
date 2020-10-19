<?php
    use yii\helpers\Html;
    use yii\bootstrap\Carousel;
    use yii\bootstrap\widget;
    use yii\bootstrap\BootstrapWidgetTrait;
    use yii\widget\LinkPager;
    use yii\widgets\ActiveForm;

        $this->title = 'Выставки';
?>



		<div class="container" style='overflow-x:hidden;'>
			<div class="row">
				<div class="col-sm-4">
					<ul class="ul-category" >
						<li><?= Html::a('Прошедшие', ['exhibitions']) ?></li>
						<li><?= Html::a('Ближайшие', ['exhibitions']) ?></li>
						<li><img src="../img/Лого/лого2.png" width="100%"></li>
					</ul>
				</div>
				<div class="col-sm-8 ">
					<h1 style="padding: 8% 0 5% 0">Ближайшие выставки</h1>
					<div class="row text-center justify-content-center ex-block">
						
<div class='container' >

<? foreach ($exhibitions as $exhibition): ?>
        
        <? if($exhibition['isDisplay'] == 1) : ?>
        <div class='row ex-row' >
    				<div class='col-sm-4 img-block'>
    					<img  src='../img/<?=$exhibition['photo']?>'>
    				</div>
    				<div class='col-sm-8 ex-info' >
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

   <? echo yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
    ]);


?>	
</div>
</div>
</div>
</div>
</div>



