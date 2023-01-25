<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JournalCategory $model */

$this->title = Yii::t('app', 'Добавление категории');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Категории журналов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
