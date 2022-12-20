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
            'title_en:ntext',
            'annotation_en:ntext',
            'keywords_en:ntext',
        ],
    ]) ?>

</div>
