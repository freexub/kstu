<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

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

    <?php
    $categories = [];
    foreach ($model->getCategories()->asArray()->all() as $category) {
        $categories[] = $category['name'];
    }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'status_id',
            'author_id',
            [
                'label' => Yii::t('app', 'Категории'),
                'value' => implode(', ', $categories),
            ],
            [
                'label' => 'RU',
                'value' => $model->getPages()->where(['language_id' => 1])->one()['content'],
            ],
            [
                'label' => 'KK',
                'value' => $model->getPages()->where(['language_id' => 2])->one()['content'],
            ],
            [
                'label' => 'EN',
                'value' => $model->getPages()->where(['language_id' => 3])->one()['content'],
            ],
        ],
    ]) ?>

</div>
