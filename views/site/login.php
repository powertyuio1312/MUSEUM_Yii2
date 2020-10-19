<?
	$this->title = "Авторизация";
?>

<div class="reg-form">
<h1>Логин</h1>

<?php
use yii\widgets\ActiveForm; ?>

<?php $form = ActiveForm::begin();?>

<?= $form->field($login_model, 'login')->textInput()?>
<?= $form->field($login_model, 'password')->passwordInput()?>
<div>
<button type="submit" class="btn btn-info butt">Войти</button>
</div>

<?php $form = ActiveForm::end();?>

</div>