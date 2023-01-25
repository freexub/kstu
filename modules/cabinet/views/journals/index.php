<?php

use app\models\Journals;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\JournalsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Journals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journals-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app_article', 'Create Journals'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'title_ru:ntext',
            [
                'attribute' => 'title_ru',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->title_ru, ['view', 'id' => $data->id]);
                },
            ],
//            'title_kk:ntext',
//            'title_en:ntext',
//            'status',
            //'poster',
            //'date_create',
            //'date_update',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Journals $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
