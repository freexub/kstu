<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use dosamigos\tinymce\TinyMce;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $page app\models\Page */
/* @var $post app\models\Post */
/* @var $postCategory app\models\PostCategory */

$this->title = Yii::t('app', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="post-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($post, 'status_id')->label(false)->hiddenInput(['value' => 1]) ?>
        
        <?= $form->field($page, 'language_id')->label(false)->hiddenInput(['value' => ArrayHelper::getValue(Yii::$app->params["languageCodesInDatabase"], Yii::$app->language)]) ?>

        <?= $form->field($page, 'title')->textInput()->label(Yii::t('app', 'Название')) ?>
        
        <?= $form->field($post, 'category_ids')->widget(Select2::classname(), [
            'data' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
            'theme' => Select2::THEME_KRAJEE_BS4,
            'showToggleAll' => false,
            'options' => [
                'placeholder' => 'Выберите категории...',
                'multiple' => true,
                // 'autocomplete' => 'off',
            ],
            'pluginOptions' => [
                'tags' => true,
            ],
        ])->label(Yii::t('app', 'Категории')) ?>

        <?= $form->field($page, 'content')->label(false)->widget(TinyMce::className(), [
            'options' => ['rows' => 10],
            'language' => Yii::$app->language,
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
