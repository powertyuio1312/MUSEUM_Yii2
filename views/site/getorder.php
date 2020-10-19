<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Бронирование билета';
?>


                
                    <div class='container'>
                        <div class='row'>
                            <div class='col title-block'>
                                <h1><?=$exhibition['exName']?></h1>
                                <h3><?=$exhibition['author']?></h3>
                                <h3>Цена: <?=$exhibition['price']?> р</h3>

                                <div class='dateprice'>
                                    <h3><?=$exhibition['date']?>, <?=$exhibition['time']?></h3>
                                    <h3>г. Минск, п-т. Независимости, 23</h3>
                                </div>
                            </div>
                        </div>



    <? if(!(Yii::$app->user->isGuest)) 
    {
        echo "
             <div class='reg-form'>" ?>       
            <? $form = ActiveForm::begin() ?>

            <?= $form->field($model, 'name')->textInput()?>
            <?= $form->field($model, 'surname')->textInput()?>
            <div>

            <button type="submit" class="btn btn-info butt">Забронировать</button>
            </div>

            <?php $form = ActiveForm::end();?>

                	</div>


<?  }
    else
    {
        echo "<h5> Бронировать билет могут только авторизованные пользователи. </h5>";
    } ?>

    </div>
</div>

</div>