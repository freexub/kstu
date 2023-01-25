<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JournalNumber $model */

$this->title = Yii::t('app', 'Create Journal Number');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Journal Numbers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
