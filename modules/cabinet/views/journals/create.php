<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Journals $model */

$this->title = Yii::t('app', 'Create Journals');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Journals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
