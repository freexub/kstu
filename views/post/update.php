<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Category;
use app\models\Status;
use app\models\User;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $post app\models\Post */

$this->title = Yii::t('app', 'Update Post: {name}', [
    'name' => $post->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $post->id, 'url' => ['view', 'id' => $post->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="post-update">

    <div class="post-form">

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($post, 'category_ids')->widget(Select2::class, [
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

        <?= $form->field($post, 'status_id')->dropdownList(
            Status::find()->select(['name', 'id'])->indexBy('id')->column()
            ) ?>

        <?= $form->field($post, 'author_id')->widget(Select2::class, [
           'data' => User::find()->select(['username', 'id'])->indexBy('id')->column(),
           'theme' => Select2::THEME_KRAJEE_BS4,
        ])->label(Yii::t('app', 'Автор')) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end() ?>

    </div>

</div>
