
<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Html;
    $this->title = "Регистрация";
?>
<div class="reg-form">

	<h1>Регистрация</h1>

	<?php
$form = ActiveForm::begin(['class'=>'form-horizontal reg-form']);
?>
<?= $form->field($model, 'login')->textInput()?>
<?= $form->field($model, 'email')->textInput(['autofocus'=>true])?>
<?= $form->field($model, 'password')->passwordInput()?>


<div>
<button type="submit" class="btn btn-primary butt">Зарегистрироваться</button>
</div>

<?= Html::a('Есть аккаунт? Войдите', ['site/login']) ?>

<?php
ActiveForm::end();
?>

</div>