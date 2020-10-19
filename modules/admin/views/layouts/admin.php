<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Users;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php
//        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
//        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>

    <link rel="shortcut icon" href="web/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="web/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="web/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="web/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="web/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="img/Лого/логоСветлый.png" width="110px" height="45px" alt="Главная" />',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top header',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
                        ['label' => 'Выставки', 'url' => ['../../web/site/exhibitions']],
                        ['label' => 'Отзывы', 'url' => ['../../web/site/reviews']],
                        ['label' => 'Регистрация', 'url' => ['../../web/site/signup']],
                        Yii::$app->user->isGuest ? (
                            ['label' => 'Вход', 'url' => ['../../web/site/login']]
                        ) : (
                            '<li>'
                            . Html::beginForm(['../../web/site/logout'], 'post')
                            . Html::submitButton(
                                'Выход (' . Yii::$app->user->identity->login . ')',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                        ),
                        ($adm->isAdmin == '1') ? (['label' => 'Личный кабинет', 'url' => ['../../web/site/office']]) : (
                        ['label' => 'Админка', 'url' => ['/admin']]
                    ),
                    ],
    ]);
    NavBar::end();
    ?>


<div class="container" style="padding: 50px">
<?= $content ?>
</div>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>