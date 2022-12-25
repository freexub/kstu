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

//            'id',
//            'autor_id',
//            'title_'.Yii::$app->language.':ntext',
            [
                'attribute' => 'title_ru',
                'format' => 'raw',
                'value' => function($data){
                    return '<p class="mb-0">'.$data->title_ru.'</p><span class="badge badge-info">'.$data->date_create.'</span>';
                }
            ],
            'statuses.name_'.Yii::$app->language,
//            'title_kz:ntext',
//            'title_en:ntext',
            //'keywords_ru:ntext',
            //'keywords_kz:ntext',
            //'keywords_en:ntext',
            //'annotation_ru:ntext',
            //'annotation_kz:ntext',
            //'annotation_en:ntext',
            //'category_id',
            //'comment:ntext',
            //'documentFile',
            //'checkFIle',
//            'date_create',
            //'date_update',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
