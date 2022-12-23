<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Укажите тему публикации на 3х языках')?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'title_ru')->textarea(['rows' => 2]) ?>

                    <?= $form->field($model, 'title_kk')->textarea(['rows' => 2]) ?>

                    <?= $form->field($model, 'title_en')->textarea(['rows' => 2]) ?>
                </div>
            </div>
        </div>
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Укажите ключевые слова на 3х языках')?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'keywords_ru')->textarea(['rows' => 2, 'placeholder' => Yii::t('app_article', 'Укажите ключевые слова через точку с запятой, например, информатика; программирование')]) ?>

                    <?= $form->field($model, 'keywords_kk')->textarea(['rows' => 2, 'placeholder' => Yii::t('app_article', 'Укажите ключевые слова через точку с запятой, например, информатика; программирование')]) ?>

                    <?= $form->field($model, 'keywords_en')->textarea(['rows' => 2, 'placeholder' => Yii::t('app_article', 'Укажите ключевые слова через точку с запятой, например, информатика; программирование')]) ?>
                </div>
            </div>
        </div>
        <div class="col col-md-6 pt-4">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Укажите аннотацию на 3х языках')?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'annotation_ru')->textarea(['rows' => 3]) ?>

                    <?= $form->field($model, 'annotation_kk')->textarea(['rows' => 3]) ?>

                    <?= $form->field($model, 'annotation_en')->textarea(['rows' => 3]) ?>
                </div>
            </div>
        </div>
        <div class="col col-md-6 pt-4">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Дополнительная информация')?>
                </div>
                <div class="card-body">

                    <?= $form->field($model, 'authorFullName')->textInput() ?>

                    <?= $form->field($model, 'category_id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\JournalCategory::find()->all(), 'id', 'title_'.Yii::$app->language),
                            ['prompt' => Yii::t('app_article', 'Выбрать категорию ...')]) ?>

                    <?= $form->field($model, 'authorOrganization')->textInput() ?>

                    <?= $form->field($model, 'authorEmail')->textInput() ?>

                    <?= $form->field($model, 'authorPhone')->textInput() ?>

                    <?= $form->field($model, 'documentFile')->widget(FileInput::classname(), [
//                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => ['showPreview' => false,'showUpload' => false,]
                    ]);?>

                    <?= $form->field($model, 'authorsFile')->widget(FileInput::classname(), [
//                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => ['showPreview' => false,'showUpload' => false,]
                    ]);?>

                    <?= $form->field($model, 'checkFile')->widget(FileInput::classname(), [
//                        'options' => ['accept' => 'excel/*'],
                        'pluginOptions' => ['showPreview' => false,'showUpload' => false,]
                    ]);?>

                    <?= $form->field($model, 'comment')->textarea(['rows' => 3,'placeholder' => Yii::t('app_article', 'Комментарий для рецензента')])->label(false) ?>

                </div>
            </div>
        </div>
    </div>


    <div class="col col-12 pt-4">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app_article', 'Отправить статью'), ['class' => 'btn btn-primary btn-block btn-lg']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
