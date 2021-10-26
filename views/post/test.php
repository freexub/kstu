<div class="jumbotron">
    <div class="container">
        <pre>
            <?= var_dump($post) ?>
        </pre>
    </div>
</div>

<hr>

<div class="jumbotron">
    <div class="container">
        <pre>
            <?= var_dump($page) ?>
        </pre>
    </div>
</div>

<hr>

<div class="jumbotron">
    <div class="container">
        <pre>
            <?= var_dump($category_ids) ?>
        </pre>
    </div>
</div>

<hr>

<div class="jumbotron">
    <div class="container">
        <pre>
            <?= var_dump($categories) ?>
        </pre>
    </div>
</div>

<hr>

<div class="jumbotron">
    <div class="container">
        <pre>
            <?= var_dump($postCategories) ?>
        </pre>
    </div>
</div>

<hr>

<div class="jumbotron">
    <div class="container">
        <pre>
            <?= var_dump($errors) ?>
        </pre>
    </div>
</div>
<?php
var_dump(yii\helpers\Url::to('@web/uploads/.trash'));
var_dump(Yii::getAlias('@webroot'));
var_dump(dirname($_SERVER['PHP_SELF']) . '/../files/');
var_dump(dirname($_SERVER['PHP_SELF']) . '/../files/.trash/.tmb/');
?>
<?= alexantr\elfinder\InputFile::widget([
    'name' => 'attributeName',
    'clientRoute' => 'elfinder/input',
    'filter' => ['image'],
    'preview' => function ($value) {
        return yii\helpers\Html::img($value, ['width' => 200]);
    },
]) ?>