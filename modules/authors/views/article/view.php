<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'autor_id',
            'title_ru:ntext',
            'title_kk:ntext',
            'title_en:ntext',
            'keywords_ru:ntext',
            'keywords_kk:ntext',
            'keywords_en:ntext',
            'annotation_ru:ntext',
            'annotation_kk:ntext',
            'annotation_en:ntext',
            'category_id',
            'comment:ntext',
            'documentFile',
            'checkFile',
            'date_create',
            'date_update',
            'status',
        ],
    ]) ?>

</div>
