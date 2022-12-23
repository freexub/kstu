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
        <?= ($model->documentFile) ? Html::a(Yii::t('app_article', 'Статья'), ['', 'id' => $model->id], ['class' => 'btn btn-success']) : Html::a(Yii::t('app_article', 'Статья'), [], ['class' => 'btn btn-warning disabled'])?>
        <?= ($model->documentShortFile) ? Html::a(Yii::t('app_article', 'Обрезанная статья'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Обрезанная статья'), ['', 'id' => $model->id], ['class' => 'btn btn-success disabled']) ?>
        <?= ($model->checkFile) ? Html::a(Yii::t('app_article', 'Чек оплаты'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Чек оплаты'), ['', 'id' => $model->id], ['class' => 'btn btn-warning disabled']) ?>
        <?= ($model->authorsFile) ? Html::a(Yii::t('app_article', 'Список авторов'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Список авторов'), ['', 'id' => $model->id], ['class' => 'btn btn-primary disabled'])  ?>
        <?= ($model->plagiatFile) ? Html::a(Yii::t('app_article', 'Отчет антиплагиат'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Отчет антиплагиат'), ['', 'id' => $model->id], ['class' => 'btn btn-primary disabled'])  ?>
        <?= ($model->reviewFile) ? Html::a(Yii::t('app_article', 'Рецензия'), ['', 'id' => $model->id], ['class' => 'btn btn-primary']) : Html::a(Yii::t('app_article', 'Рецензия'), ['', 'id' => $model->id], ['class' => 'btn btn-primary disabled']) ?>
        <?php echo Html::a(Yii::t('app', 'Удалить статью'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger float-right',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'authorFullName',
            'category.journal.title',
            'category.title',
//            'comment:ntext',
//            'documentFile',
//            'checkFile',
            'date_create',
//            'date_update',
            'statuses',
        ],
    ]) ?>
    <?=Tabs::widget([
        'items' => $items
    ]);?>

    <?=$this->render('tabs/'.$views, ['model' => $model]);?>


</div>
