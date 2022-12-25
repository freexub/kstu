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

                    return Html::a('<h5>'.$data->title.'</h5>', ['view', 'id' => $data->id], [/*'class' => 'btn btn-primary'*/]) .
                        '<span class="badge badge-success">'.$data->autor->username.'</span> <span class="badge badge-info">'.$data->category->title.'</span>';
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => 'width:200px',
//                    'class' => 'pb-10',
                ],
                'value'=> function($data){
                    return $data->statuses->name_ru;
                },
                'filter' => false
            ],
            [
//                'attribute' => 'status',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => 'width:100px',
//                    'class' => 'pb-10',
                ],
                'value'=> function($data){
                    return Html::a('<span class="glyphicon glyphicon-th">Удалить</span>', ['delete', 'id' => $data->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app_article', 'Вы уверены, что хотите удалить этот элемент?'),
                            'method' => 'post',
                        ],
                    ]);
                }
            ],
//            'autor.username',
//            'category.title_ru',
//            'journal.title_ru',
//            'title_kk:ntext',
            //'title_en:ntext',
            //'keywords_ru:ntext',
            //'keywords_kk:ntext',
            //'keywords_en:ntext',
            //'annotation_ru:ntext',
            //'annotation_kk:ntext',
            //'annotation_en:ntext',
            //'category_id',
            //'comment:ntext',
            //'documentFile',
            //'checkFile',
            //'date_create',
            //'date_update',
            //'status',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
