<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= \Yii::$app->language; ?>">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="<?= \Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody(); ?>

<div class="wrap">
    <?php NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => \Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
    ]); ?>

    <?= Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/index/index']],
            ['label' => 'Clients', 'url' => ['/client/list']],
            ['label' => 'Chart', 'url' => ['/chart/index']],
            ['label' => 'First', 'url' => ['/index/second-entry']],
            ['label' => 'Second', 'url' => ['/index/join-entry']],
            ['label' => 'Third', 'url' => ['/index/less-entry']],
        ]
    ]);
    ?>

    <?php NavBar::end(); ?>

    <div class="container">
        <?php if (isset($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif; ?>

        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y'); ?></p>
        <p class="pull-right"><?= \Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody(); ?>
</body>

</html>

<?php $this->endPage(); ?>
