<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JournalNumber $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="journal-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'journalFile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posterFile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'date_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
