<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = Yii::t('app', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="post-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'category_id')->dropdownList(
            Category::find()->select(['name', 'id'])->indexBy('id')->column()
            )->hint('Выберите категорию') ?>

        <?= $form->field($model, 'status_id')->label(false)->hiddenInput(['value' => 1]) ?>

        <?= $form->field($model, 'author_id')->label(false)->hiddenInput(['value' => Yii::$app->user->id]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
