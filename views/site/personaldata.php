<?php
    use yii\helpers\Html;
    use yii\bootstrap\Carousel;
    use yii\bootstrap\widget;
    use yii\bootstrap\BootstrapWidgetTrait;
    use yii\widget\LinkPager;
    use yii\widgets\ActiveForm;

        $this->title = 'Личные данные';
?>

		<div class="container" style='overflow-x:hidden; padding-bottom: 6%'>
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
					<h1 style="padding: 8% 0 5% 0">ЛИЧНЫЕ ДАННЫЕ </h1>

					<div class="row text-center justify-content-center ex-block">
						
<div class='container' >
	<div class='row ex-row' style="padding-right: 0">
		<div class='col-sm-8 ex-info' >
	<h2>Логин: <?=Yii::$app->user->identity->login?></h2>
	<h3>Количество забронированных билетов: <?=$count?></h3>
</div>
</div>
</div>
</div>
</div>
</div>
</div>