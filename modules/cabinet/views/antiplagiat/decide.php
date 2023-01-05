<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\widgets\DetailView;
/**
 * Created by PhpStorm.
 * User: kenguru
 * Date: 25.12.2022
 * Time: 19:40
 */

?>
<div class="article-decide">
    <?php $form = ActiveForm::begin(); ?>
    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title"><?=Yii::t('app_article', 'Вынести решение')?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">

        <?= $form->field($model, 'plagiatFile')->widget(FileInput::classname(), [
            //                        'options' => ['accept' => 'excel/*'],
            'pluginOptions' => ['showPreview' => false,'showUpload' => false,]
        ]);?>

        <?=$form->field($model, 'plagiatPoint')->textInput(['placeholder' => Yii::t('app_article', 'Процент оригинальности')]);?>

    </div>

    <!-- Modal footer -->
    <div class="modal-footer" style="display: block">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>