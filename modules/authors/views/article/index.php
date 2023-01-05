<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app_article', 'Ваши публикации');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app_article', 'Подать статью'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title_ru',
                'format' => 'raw',
                'value' => function($data){
                    if ($data->status == 1)
                        return '<p class="mb-0"><a href="view?id='.$data->id.'">'.$data->title_ru.'</a></p><span class="badge badge-info">'.$data->statuses->title.'</span>';
                    elseif(($data->status == 2))
                        return '<p class="mb-0"><a href="update?id='.$data->id.'">'.$data->title_ru.'</a></p><span class="badge badge-info">'.$data->statuses->title.'</span>';
                    else
                        return '<p class="mb-0">'.$data->title_ru.'</p><span class="badge badge-info">'.$data->statuses->title.'</span>';
                }
            ],
            [
                'value' => Yii::t('app', 'Удалить'),
                'format' => 'raw',
                'value' => function($data){
                    if ($data->status < 3){
                        return Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $data->id], [
                            'class' => 'btn btn-danger btn-block',
                            'data' => [
                                'confirm' => Yii::t('app_article', 'Вы уверены, что хотите удалить этот элемент?'),
                                'method' => 'post',
                            ],
                        ]);
                    }else{
                        return '<h3><span class="btn btn-danger btn-block disabled">'.Yii::t('app', 'Удалить').'</span></h3>';
                    }
                }
            ],
//            'statuses.name_'.Yii::$app->language,
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
