<?

	use yii\helpers\Html;
	use yii\bootstrap\Carousel;
	use yii\bootstrap\widget;
	use yii\bootstrap\BootstrapWidgetTrait;
	use yii\helpers\Url;

	    $this->title = "Главная. Музей современного искусства";

?>

<?
		echo Carousel::widget([
		    'items' => [
		        '<img src="img/slide2.png"/>',
		        ['content' => '<img src="img/slider5.png"/>'],
			    ['content' => '<img src="img/slide4.png"/>'],
		    ]
		]);
?>
	<div class="mainText">
		<article>Музей <br>Современного <br>Искусства</article>
		<p>Проникнись атмосферой нашего музея и произведений искусств современных художников и скульпторов. Здесь тебя ждет увлекательное путешествие за пределы твоего сознания!</p>
	</div>

		<div class="pink-block"></div>

		<div class="row">
			<div class="col" style="text-align: center;">
				<h1>Найди выставку здесь!</h1>
			</div>
			<div class="col">
				<section class="box search">
					<form method="get" action="<?= Url::to(['/site/search']) ?>">
						<input type="text" class="text form-control" name="search" placeholder="Поиск...">
					</form>
				</section>
			</div>
		</div>

		<div class="banner-rass">
			<div class="banner"><img src="img/первое.gif"></div>
			<div class="rassylka">
				<p>Хотите быть в курсе ближайших выставок? <br>ПОДПИШИТЕСЬ НА НАШУ<br>РАССЫЛКУ</p>
				<input type="text" name="rassylka" placeholder="@mail">
			</div>
		</div>



<?php
	foreach ($exhibitions as $exhibition)
	{


		    echo"	<div class='row news-block'>
    			<div class='col-lg-6 p-0 img-news'>
    				<img src='img/".$exhibition['photo']."' class='img-responsive'  width='70%'>
    			</div>
				<div class='col-lg-6 news-cont' style='padding: 5% 10% 0 10%; '>
					<h1>".$exhibition['exName']."</h1>
					<p>".$exhibition['content']."</p>
					<div class='dateprice'>"?>
						<?= Html::a('Перейти к выставкам', ['site/exhibitions']) ?>
						<? echo "
					</div>
				</div>
			</div>";
	}

?>
