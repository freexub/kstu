<?php
namespace app\widgets\MultiLang;

use yii\helpers\Html;
use Yii;
?>

<div class="btn-group <?= $cssClass; ?>">
    <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="uppercase"><?= Yii::t('app', Yii::$app->language); ?></span>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
        <li role="presentation" class="item-lang">
            <?= Html::a('English', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'en']
            ),[
                'role' => "menuitem",
                'tabindex' => "-1"
            ]); ?>
        </li>
        <li role="presentation" class="item-lang">
            <?= Html::a('Русский', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'ru']
            ),[
                'role' => "menuitem",
                'tabindex' => "-1"
            ]); ?>
        </li>
        <li role="presentation" class="item-lang">
            <?= Html::a('Қазақша', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'kk']
            ),[
                'role' => "menuitem",
                'tabindex' => "-1"
            ]); ?>
        </li>
    </ul>
</div>