<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\cabinet\models\Article $model */

\yii\web\YiiAsset::register($this);
?>
<div class="article-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title_ru:ntext',
            'annotation_ru:ntext',
            'keywords_ru:ntext',
        ],
        'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}.</td></tr>"
    ]) ?>

</div>
