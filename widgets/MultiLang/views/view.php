<?php
namespace app\widgets\MultiLang;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Yii;
?>
<li class="nav-item">
    <div class="btn-group <?= $cssClass; ?> float-left">
        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
            <span class="uppercase"><?= Yii::t('app', ArrayHelper::getValue(Yii::$app->params["languageNames"], Yii::$app->language)); ?></span>
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
                <?= Html::a('English', array_merge(
                    Yii::$app->request->get(),
                    ['/'.Yii::$app->controller->route, 'language' => 'en']
                ),[
                    'class'=> 'dropdown-item',
                    'role' => "menuitem",
                    'tabindex' => "-1"
                ]); ?>
                <?= Html::a('Русский', array_merge(
                    Yii::$app->request->get(),
                    ['/'.Yii::$app->controller->route, 'language' => 'ru']
                ),[
                    'class'=> 'dropdown-item',
                    'role' => "menuitem",
                    'tabindex' => "-1"
                ]); ?>
                <?= Html::a('Қазақша', array_merge(
                    Yii::$app->request->get(),
                    ['/'.Yii::$app->controller->route, 'language' => 'kk']
                ),[
                    'class'=> 'dropdown-item',
                    'role' => "menuitem",
                    'tabindex' => "-1"
                ]); ?>
        </div>
    </div>
</li>