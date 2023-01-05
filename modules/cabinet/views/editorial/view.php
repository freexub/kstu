<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Tabs;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\modules\cabinet\models\Article $model */

$this->title = $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?=$this->render('decide', ['model' => $model]);?>
            </div>
        </div>
    </div>


    <h1><?= Html::encode($this->title) ?></h1>
<hr>
    <p class="float-right">
        <?php echo Html::a(Yii::t('app', 'Назначить рецензента'), ['decide', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'data-toggle'=>'modal',
            'data-target'=>'#myModal',
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'authorFullName',
            'category.title',
            'statuses.name_'.Yii::$app->language,
            'date_create',
            [
                'attribute' => 'reviewerUser.fullName',
                'label' => Yii::t('app', 'Рецинзент')
            ],
        ],
        'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}.</td></tr>"
    ]) ?>

    <?php /*echo Tabs::widget([
        'items' => $items
    ]);*/?>

    <?=$this->render('tabs/'.$views, ['model' => $model]);?>


</div>
