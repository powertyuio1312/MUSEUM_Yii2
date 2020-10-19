<?php
    use yii\helpers\Html;
    use yii\bootstrap\widget;
    use yii\bootstrap\BootstrapWidgetTrait;
    use yii\widget\LinkPager;
    use yii\widgets\ActiveForm;

        $this->title = "Отзывы";
?>


<div class='container'>

	<div class='col name-block'>
<h1>ОТЗЫВЫ</h1>

<h4>Здесь вы можете прочитать отзывы про наш музеи и проходящие в нем выставки, а также оставить свои пожелания или рекомендации. Будем благодарны за каждому за мнение, и постараемся исправить то, что Вам не понравилось.</h4>
</div>
			<!-- ............... commentssssss..................... -->

	<?
	    foreach ($comments as $comment) {
	        echo "<div class='comment-list'>
				    <h4>".$comment['login'].": </h4>
				    <p>".$comment['text']."</p>
				 </div>";

	    }
	?>


	<? if(!(Yii::$app->user->isGuest)) 
	{
		echo "
	
	<div class='comment-form'> " ?>

			   <? echo yii\widgets\LinkPager::widget([
				    'pagination' => $pagination,
				    ]);?>

	            <? $form = ActiveForm::begin(
	                [
	                    'action'=>['comment'],
	                ]) ?>

	                <?= $form->field($comment_form, 'text')->textarea(['placeholder'=>'Введите текст комментария']) ?>

	                <div>
	                    <button class="btn butt" type="submit">Отправить</button>
	                </div>

	            <? ActiveForm::end() ?>

	</div>
<? }
else
{
	echo "<h5> Оставлять комментарии могут только авторизованные пользователи. </h5>";
} ?>

</div>