<?php
    use yii\helpers\Html;
    use yii\bootstrap\Carousel;
    use yii\bootstrap\widget;
    use yii\bootstrap\BootstrapWidgetTrait;
    use yii\widget\LinkPager;
    use yii\widgets\ActiveForm;

        $this->title = 'Личный кабинет';
?>

		<div class="container" style='overflow-x:hidden;'>
			<div class="row">
				<div class="col-sm-4">
					<ul class="ul-category" >
						<li><i><?=Yii::$app->user->identity->login?></i></li>
						<hr>
						<li><?= Html::a('Заказы', ['office']) ?></li>
						<li><?= Html::a('Личные данные', ['personaldata']) ?></li>
						<li><img src="../img/Лого/лого2.png" width="100%"></li>
					</ul>
				</div>
				<div class="col-sm-8 ">
					<h1 style="padding: 8% 0 5% 0">ЛИЧНЫЙ КАБИНЕТ </h1>

					<div class="row text-center justify-content-center ex-block">
						
<div class='container' >

	<? if(!(Yii::$app->user->isGuest)) 
	{
		 ?>

		<? foreach ($orders as $order): ?>
		        
		        <? if($order['isDisplay'] == 1) : ?>

			        <div class='row ex-row' >
			    		<div class='col-sm-4 img-block'>
			    			<img  src='../img/<?=$order['photo']?>'>
			    		</div>
			    		<div class='col-sm-8 ex-info' >
			                	<form method='POST'>
			        				<h3><?=$order['exName']?></h3>
			        				<h4><?=$order['author']?></h4>

			            			<a href="<?=\yii\helpers\Url::to(['current', 'id'=>$exhibition["exhibition_id"]])?>">Узнать больше</a>

			            			<div class='dateprice'>
			            				<label><?=$order['date']?></label>
			            				<label><?=$order['time']?></label>
			            				<label><?=$order['price']?> р</label>
			        				</div>
			                	</form>
			    		</div>
			    	</div>

		        <? endif ?>
		    <? endforeach ?>

	<? }
	else
	{
		echo "<h5> Личный кабинет доступен только авторизованным пользователям. </h5>";
	} ?>
</div>
</div>
</div>
</div>
</div>
