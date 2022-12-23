<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model->getTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Укажите тему публикации на 3х языках')?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'title_ru')->textarea(['rows' => 2, 'disabled' => true]) ?>

                    <?= $form->field($model, 'title_kk')->textarea(['rows' => 2, 'disabled' => true]) ?>

                    <?= $form->field($model, 'title_en')->textarea(['rows' => 2, 'disabled' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Укажите ключевые слова на 3х языках')?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'keywords_ru')->textarea(['rows' => 2, 'placeholder' => Yii::t('app_article', 'Укажите ключевые слова через точку с запятой, например, информатика; программирование'), 'disabled' => true]) ?>

                    <?= $form->field($model, 'keywords_kk')->textarea(['rows' => 2, 'placeholder' => Yii::t('app_article', 'Укажите ключевые слова через точку с запятой, например, информатика; программирование'), 'disabled' => true]) ?>

                    <?= $form->field($model, 'keywords_en')->textarea(['rows' => 2, 'placeholder' => Yii::t('app_article', 'Укажите ключевые слова через точку с запятой, например, информатика; программирование'), 'disabled' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col col-md-6 pt-4">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Укажите аннотацию на 3х языках')?>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'annotation_ru')->textarea(['rows' => 3, 'disabled' => true]) ?>

                    <?= $form->field($model, 'annotation_kk')->textarea(['rows' => 3, 'disabled' => true]) ?>

                    <?= $form->field($model, 'annotation_en')->textarea(['rows' => 3, 'disabled' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col col-md-6 pt-4">
            <div class="card">
                <div class="card-header">
                    <?=Yii::t('app_article', 'Дополнительная информация')?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-4">
                            <?= Html::a(Yii::t('app', 'Статья'), ['get-file', 'id' => $model->id, 'type'=>'documentFile'], ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                        <div class="col col-4">
                            <?= Html::a(Yii::t('app', 'Чек оплаты'), ['get-file', 'id' => $model->id, 'type'=>'checkFile'], ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                        <div class="col col-4">
                            <?= Html::a(Yii::t('app', 'Список авторов'), ['get-file', 'id' => $model->id, 'type'=>'authorsFile'], ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                    </div>

                    <br>

                    <?= $form->field($model, 'authorFullName')->textInput(['disabled' => true]) ?>
                    <?= $form->field($model, 'authorOrganization')->textInput(['disabled' => true]) ?>
                    <?= $form->field($model, 'authorEmail')->textInput(['disabled' => true]) ?>
                    <?= $form->field($model, 'authorPhone')->textInput(['disabled' => true]) ?>

                    <?= $form->field($model, 'category_id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\JournalCategory::find()->all(), 'id', 'title_'.Yii::$app->language),
                            ['prompt' => Yii::t('app_article', 'Выбрать категорию ...'),'disabled' => true]) ?>

                    <?= $form->field($model, 'comment')->textarea(['disabled' => true, 'rows' => 5,'placeholder' => Yii::t('app_article', 'Комментарий для рецензента')]) ?>

                </div>
            </div>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
