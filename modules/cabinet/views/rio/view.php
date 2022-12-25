<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Tabs;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\modules\cabinet\models\Article $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?=$this->render('decide', ['model' => $model]);?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="decide<?=$model->id?>" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
<hr>
    <p>
        <?= ($model->documentFile) ? Html::a(Yii::t('app_article', 'Статья'), ['file', 'id' => $model->id, 'type' => 'documentFile'], ['class' => 'btn btn-info']) : Html::a(Yii::t('app_article', 'Статья'), [], ['class' => 'btn btn-warning disabled'])?>
        <?= ($model->authorsFile) ? Html::a(Yii::t('app_article', 'Список авторов'), ['file', 'id' => $model->id, 'type' => 'authorsFile'], ['class' => 'btn btn-info']) : Html::a(Yii::t('app_article', 'Список авторов'), [], ['class' => 'btn btn-warning disabled'])  ?>
        <?= ($model->checkFile) ? Html::a(Yii::t('app_article', 'Чек оплаты'), ['file', 'id' => $model->id, 'type' => 'checkFile'], ['class' => 'btn btn-info']) : Html::a(Yii::t('app_article', 'Чек оплаты'), [], ['class' => 'btn btn-warning disabled']) ?>
        <?= ($model->documentShortFile) ? Html::a(Yii::t('app_article', 'Обрезанная статья'), ['file', 'id' => $model->id, 'type' => 'documentShortFile'], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Обрезанная статья'), [], ['class' => 'btn btn-warning disabled']) ?>
        <?= ($model->plagiatFile) ? Html::a(Yii::t('app_article', 'Отчет антиплагиат'), ['file', 'id' => $model->id, 'type' => 'plagiatFile'], ['class' => 'btn btn-primary']) : '' ?>
        <?= ($model->reviewFile) ? Html::a(Yii::t('app_article', 'Рецензия'), ['file', 'id' => $model->id, 'type' => 'reviewFile'], ['class' => 'btn btn-primary']) : '' ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'authorFullName',
//            'category.journal.title',
            'category.title',
//            'comment:ntext',
//            'documentFile',
//            'checkFile',
            'statuses.name_'.Yii::$app->language,
            'date_create',
//            'date_update',
        ],
        'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}.</td></tr>"
    ]) ?>
    <?=Tabs::widget([
        'items' => $items
    ]);?>

    <?=$this->render('tabs/'.$views, ['model' => $model]);?>

    <?php echo Html::a(Yii::t('app', 'Вынести решение'), ['decide', 'id' => $model->id], [
        'class' => 'btn btn-success',
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
    ]) ?>

    <?php echo Html::a(Yii::t('app', 'Удалить статью'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger float-right',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</div>
