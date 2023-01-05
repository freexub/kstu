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
        <h4 class="modal-title"><?=Yii::t('app_article', 'Рецинзенты')?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        <?=$form->field($model, 'reviewUser')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\JournalReviewer::find()->where(['journal_category_id'=>$model->category_id])->all(),'user_id','reviewer.fullName'),['prompt'=>Yii::t('app','- Назначить рецинзента -')]);?>
    </div>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer" style="display: block">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>