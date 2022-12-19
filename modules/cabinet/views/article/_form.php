<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\cabinet\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'autor_id')->textInput() ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'title_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_kk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords_kk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'annotation_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'annotation_kk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'annotation_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'documentFile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkFile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'date_update')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
