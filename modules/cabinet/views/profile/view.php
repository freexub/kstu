<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Profile $model */
/** @var app\models\JournalReviewer $journalReviewer */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Пользователи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?=$this->render('decide', ['model' => $journalReviewer]);?>
            </div>
        </div>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'user_id' => $model->user_id], [
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
            'fullName_ru',
            'fullName_kk',
            'fullName_en',
//            [
//                'label' => Yii::t('app', 'Роли пользователя'),
//                'format' => 'raw',
//                'value' => function($data){
//                    return $data->getTypesLabel($data->user_id);
//                }
//            ],
        ],
    ]) ?>
    <hr>
    <div class="btn-group pb-3 float-right" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=Yii::t('app', 'Назначить роль')?>
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="update-type?type=Автор&user_id=<?=$model->user_id?>&u=1">Автор</a>
            <a class="dropdown-item" href="update-type?type=Антиплагиат&user_id=<?=$model->user_id?>&u=1">Антиплагиат</a>
            <a class="dropdown-item" href="update-type?type=РИО&user_id=<?=$model->user_id?>&u=1">РИО</a>
            <a class="dropdown-item" href="update-type?type=Редколлегия&user_id=<?=$model->user_id?>&u=1">Редколлегия</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal">Рецензент</a>
            <hr>
            <a class="dropdown-item" href="update-type?type=Администратор&user_id=<?=$model->user_id?>&u=1">Администратор</a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><?=Yii::t('app','Роль')?></th>
            <th scope="col"><?=Yii::t('app','Действие')?></th>
        </tr>
        </thead>
        <tbody>
        <?=$model->getTypesInTabel($model->user_id)?>
        </tbody>
    </table>

</div>
