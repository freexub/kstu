<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */
/* @var $profile \app\models\Profile */

//$this->title = Yii::t('rbac-admin', 'Signup');
$this->title = Yii::t('app', 'Регистрация');
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?=Yii::t('app', 'Пожалуйста, заполните следующие поля для регистрации:')?></p>
    <?= Html::errorSummary($model) ?>
    <div class="row">
        <div class="col-lg-6 ">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?php /* $form->field($profile, 'fullName_kk')->textInput(['placeholder' => 'ФИО на русском языке'])->label(false) */?>
                <?php /* $form->field($profile, 'fullName_en')->textInput(['placeholder' => 'ФИО на казахском языке'])->label(false) */ ?>
                <?= $form->field($profile, 'fullName_ru')->textInput(['placeholder' => Yii::t('app', 'ФИО')])->label(false) ?>
                <?= $form->field($model, 'username')->textInput(['placeholder' => Yii::t('app', 'Логин')])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app', 'Email')])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput()->textInput(['placeholder' => Yii::t('app', 'Пароль')])->label(false) ?>
                <?= $form->field($model, 'retypePassword')->passwordInput()->textInput(['placeholder' => Yii::t('app', 'Подтверждение пароля')])->label(false) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Регистрация'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
