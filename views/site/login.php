    <?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

//$this->title = Yii::t('app', 'Вход');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" style="padding-top: 100px">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>Please fill out the following fields to login:</p>-->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
    ]) ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
             'template' => "<div class=\"col-lg-offset-1 col-lg-3 pl-5\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
        <div class="row">
            <div class="col col-lg-4">
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
            </div>
            <div class="col col-md-3">
                <a href="signup" class="btn btn-success btn-block"><?=Yii::t('app', 'Регистрация')?></a>
            </div>
        </div>

    <?php ActiveForm::end() ?>
</div>