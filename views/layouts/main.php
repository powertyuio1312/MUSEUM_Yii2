<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php

$llogin = Yii::$app->user->identity->login; 
$adm = User::find()->where(['login' => $llogin])->one();

    NavBar::begin([
        'brandLabel' => '<img src="../img/Лого/логоСветлый.png" width="110px" height="45px" alt="Главная" />',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top header',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
                        ['label' => 'Выставки', 'url' => ['exhibitions']],
                        ['label' => 'Отзывы', 'url' => ['reviews']],
                        Yii::$app->user->isGuest ? (
                            ['label' => 'Вход', 'url' => ['login']]

                        ) : (
                            '<li>'
                            . Html::beginForm(['logout'], 'post')
                            . Html::submitButton(
                                'Выход (' . Yii::$app->user->identity->login . ')',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                        ),
                        Yii::$app->user->isGuest ? (
                            ['label' => 'Регистрация', 'url' => ['signup']]
                        ) : (''),


                        !($adm->isAdmin == '1') ? (['label' => 'Личный кабинет', 'url' => ['office']]) : (
                        ['label' => 'Админка', 'url' => ['/admin']]
                    ),
                    ],
    ]);
    NavBar::end();
    ?>


    <div class="container-fluid" style="margin-top: 40px; background-color: white">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

    <footer>
    <div class="foot">
            <img src="../img/Лого/лого2текст.png" width="150px" height="65px" alt="logo">
        
            <div class="socnetwork">
                <a href="https://www.instagram.com/powertyuio/"><img src="../img/inst.png" alt="inst"></a>
                <a href="www.facebook.com/"><img src="../img/face.png" alt="facebook"></a>
                <a href="https://vk.com/powertyuio"><img src="../img/vk.png" alt="vk"></a>
            </div>
    </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
