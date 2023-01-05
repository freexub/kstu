<?php

use app\modules\cabinet\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\cabinet\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'title_'.Yii::$app->language,
                'format' => 'raw',
                'value'=> function($data){

                    return Html::a('<h5>'.$data->title.'</h5>', ['view', 'id' => $data->id], [/*'class' => 'btn btn-primary'*/])
                        . '<span class="badge badge-info">'.$data->category->title.'</span>';
                }
            ],

        ],
    ]); ?>


</div>
