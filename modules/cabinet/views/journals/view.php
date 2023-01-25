<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Journals $model */

$this->title = $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Journals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="journals-view">

    <div class="modal remote fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content loader-lg" style="border: 0"></div>
        </div>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'title_ru:ntext',
//            'date_create',
//            'poster',
//            'id',
//            'title_kk:ntext',
//            'title_en:ntext',
//            'status',
//            'date_update',
        ],
    ]) ?>

    <div class="card">
        <div class="card-header">
            <span style="font-size:20pt"><?=Yii::t('app', 'Номера журнала')?></span>
            <?= Html::a(Yii::t('app', 'Добавить'), ['', 'id' => $model->id],
                [
                    'class' => 'btn btn-success float-right'
                ],
                [
                    'data-toggle'=>'modal',
                    'data-target'=>'#add',
                ]
            ) ?>
        </div>
        <div class="card-body p-0 pt-3">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => false,
                'showHeader' => false,
                'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'options' => [
                           'style' => 'width: 95%'
                        ],
                        'value' => function($data){
                            return Html::a($data->title,
                                [
                                    'view',
                                    'id' => $data->id
                                ]
                            );
                        },
                    ],
                ],
            ]);
            ?>
        </div>
    </div>


</div>
