<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Tabs;

/** @var yii\web\View $this */
/** @var app\modules\cabinet\models\Article $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= ($model->documentFile) ? Html::a(Yii::t('app_article', 'Скачать статью'), ['', 'id' => $model->id], ['class' => 'btn btn-success']) : Html::a(Yii::t('app_article', 'Скачать статью'), [], ['class' => 'btn btn-warning disabled'])?>
        <?= ($model->checkFile) ? Html::a(Yii::t('app_article', 'Скачать чек оплаты'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Скачать чек оплаты'), ['', 'id' => $model->id], ['class' => 'btn btn-warning disabled']) ?>
        <?= ($model->documentShortFile) ? Html::a(Yii::t('app_article', 'Скачать обрезанную стать'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Скачать обрезанную стать'), ['', 'id' => $model->id], ['class' => 'btn btn-warning disabled']) ?>
        <?= ($model->reviewFile) ? Html::a(Yii::t('app_article', 'рецензию'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'рецензию'), ['', 'id' => $model->id], ['class' => 'btn btn-danger disabled']) ?>
        <?= ($model->plagiatFile) ? Html::a(Yii::t('app_article', 'Отчет антиплагиат'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Отчет антиплагиат'), ['', 'id' => $model->id], ['class' => 'btn btn-warning disabled']) ?>
        <?php /*echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'format' => 'raw',
                'label' => Yii::t('app_article', 'Автор'),
                'value' => function($data){
                    return $data->autor->username;
                }
            ],
            [
                'label' => Yii::t('app_article', 'Журнал'),
                'value' => function($data){
                    return $data->category->journal->title;
                }
            ],
            [
                'label' => Yii::t('app_article', 'Категория журнала'),
                'value' => function($data){
                    return $data->category->title;
                }
            ],
//            'comment:ntext',
            'date_create',
            'statuses',
        ],
        'template' => "<tr><th style='width: 20%;'>{label}</th><td>{value}.</td></tr>"
    ]) ?>

    <?=Tabs::widget([
        'options' => [
            'class' => 'nav-pills nav-justified',
            'style' => 'margin-bottom: 5px',
        ],
        'items' => $items
    ]);?>

    <?= $this->render('tabs/'.$views, ['model' => $model]);?>

    <?= $model->comment;?>


</div>
