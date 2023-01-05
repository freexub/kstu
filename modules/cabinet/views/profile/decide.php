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
    <?php $form = ActiveForm::begin([
            'action' => ['profile/update-type', 'type'=>'Рецензент','user_id' => $_GET['user_id'], 'u'=>1],
            'method' => 'get'

    ]); ?>
    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title"><?=Yii::t('app_article', 'Выбрать категорию')?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        <?=$form->field($model, 'journal_category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\JournalCategory::find()->all(),'id','title'),['prompt'=>Yii::t('app','- Назначить категорию -')]);?>
    </div>
    <!-- Modal footer -->
    <div class="modal-footer" style="display: block">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>