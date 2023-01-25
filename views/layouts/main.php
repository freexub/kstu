<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\widgets\MultiLang\MultiLang;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">

    <?php $controller = Yii::$app->controller->id; ?>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-expand-md navbar-light navbar-default fixed-top',
            'style' => 'border-bottom: 1px solid #e6f2fb;background: #fff;',
//            'style' => 'background-color: #e3f2fd;'
        ]
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => Yii::t('app', 'Архив'), 'url' => ['#']],
            ['label' => Yii::t('app', 'Информация'), 'items' => [
                ['label' => Yii::t('app', 'Инструкция'), 'url' => ['#']],
                ['label' => Yii::t('app', 'Для авторов'), 'url' => ['#']],
                ['label' => Yii::t('app', 'Для рецензентов'), 'url' => ['#']],
                ['label' => Yii::t('app', 'Транслитерация'), 'url' => ['#']],
            ]],
//            ['label' => Yii::t('app', 'О нас'), 'items' => [
//                ['label' => Yii::t('app', 'О журнале'), 'url' => ['#']],
//                ['label' => Yii::t('app', 'Редакционная политика'), 'url' => ['#']],
//                ['label' => Yii::t('app', 'Публикационная этика'), 'url' => ['#']],
//                ['label' => Yii::t('app', 'Редакционный совет'), 'url' => ['#']],
//                ['label' => Yii::t('app', 'Контакты'), 'url' => ['#']],
//            ]],
            ['label' => Yii::t('app', 'Поиск'), 'url' => ['/site/about']],
//            ['label' => Yii::t('app', 'Подать статью'), 'linkOptions' => ['class' => 'btn btn-success', 'style'=>'color:#fff'],  'url' => ['/authors/article/create']],
        ]
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav  ml-auto'],
        'items' => [
            MultiLang::widget()
        ]
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => Yii::$app->user->identity->username, 'visible'=>!Yii::$app->user->isGuest, 'items' => [
                ['label' => Yii::t('app', 'Список статей РИО'), 'active'=> $controller == 'rio', 'visible'=>Yii::$app->user->can('РИО'), 'url' => ['/cabinet/rio/index']],
                ['label' => Yii::t('app', 'Список статей Антиплагиат'), 'active'=> $controller == 'antiplagiat', 'visible'=>Yii::$app->user->can('Антиплагиат'), 'url' => ['/cabinet/antiplagiat/index']],
                ['label' => Yii::t('app', 'Список статей Редколлегия'), 'active'=> $controller == 'editorial', 'visible'=>Yii::$app->user->can('Редколлегия'), 'url' => ['/cabinet/editorial/index']],
                ['label' => Yii::t('app', 'Список статей Рецензент'), 'active'=> $controller == 'reviewer', 'visible'=>Yii::$app->user->can('Рецензент'), 'url' => ['/cabinet/reviewer/index']],

                ['label' => Yii::t('app', 'Список моих статей'), 'active'=> $controller == 'article', 'visible'=>Yii::$app->user->can('Автор'), 'url' => ['/authors/article/index']],

//                '<div class="dropdown-divider"></div>',
                ['label' => Yii::t('app', 'Список пользователей'), 'active'=> $controller == 'profile', 'visible'=>Yii::$app->user->can('РИО'), 'url' => ['/cabinet/profile/index']],
                '<div class="dropdown-divider"></div>',
                ['label' => Yii::t('app', 'Выход'), 'visible'=>!Yii::$app->user->isGuest, 'url' => ['/site/logout'], 'class' => 'glyphicon glyphicon-arrow-left'],
            ]],
            ['label' => Yii::t('app', 'Вход'), 'visible'=>Yii::$app->user->isGuest, 'url' => ['/site/login']],
        ]
    ]);
    NavBar::end();

?>

</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light" style="border-top: 1px solid #dfdfdf;">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-8 text-md-start"><?=Yii::t('app', 'mmet.kz')?> &copy; 2020-<?= date('Y') ?> </div>
            <div class="col-md-4 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
