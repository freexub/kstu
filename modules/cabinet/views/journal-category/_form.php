<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\JournalCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="journal-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'placeholder' => 'Введите название категории']) ?>

    <?= $form->field($model, 'journal_id')->dropDownList(ArrayHelper::map(\app\models\Journals::find()->all(),'id','title_ru'),['prompt'=>'Выбрать журнал ...']) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
