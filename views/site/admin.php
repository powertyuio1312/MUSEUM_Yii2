<h1 style=" margin-left: 15%">Панель администратора</h1>

<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
?>


<div style="width: 30%; margin-left: 35%">

<h3>Удалить выставку:</h3>

   <?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'exName')->dropDownList(
		    ArrayHelper::map( $query, 'exhibition_id', 'exName')
			) ?>   
		 
		 	<div>
				<button class="btn btn-success" type="submit">Удалить</button>
			</div>

    <?php ActiveForm::end(); ?>

     <hr>
</div>




<div style="width: 30%; margin-left: 35%">

<h3>Добавить выставку:</h3>

   	<?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'exName')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'author')->textInput(['maxlength' => 6]) ?>

	    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

	    <?= $form->field($model, 'date')->textInput() ?>

	    <?= $form->field($model, 'time')->textInput() ?>

	    <?= $form->field($model, 'price')->textInput(['maxlength' => 3]) ?>

	    <?= $form->field($model, 'photo')->textInput() ?>


	    <div class="form-group">
	        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

     <hr>
</div>