<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Category;
use app\models\Language;
use dosamigos\tinymce\TinyMce;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $page app\models\Page */
/* @var $post app\models\Post */
/* @var $postCategory app\models\PostCategory */

$this->title = Yii::t('app', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="post-form">

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($post, 'status_id')->hiddenInput(['value' => 1])->label(false) ?>
        
        <?= $form->field($page, 'title')->textInput()->label(Yii::t('app', 'Название')) ?>
        
        <?= $form->field($page, 'language_id')->dropdownList(
            Language::find()->select(['name', 'id'])->indexBy('id')->column(),
            [
                'options' => [
                    ArrayHelper::getValue(Yii::$app->params['languageCodesInDatabase'], Yii::$app->language) => ['Selected' => true],
                ],
            ]
        ) ?>

        <?= $form->field($post, 'category_ids')->widget(Select2::class, [
            'data' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
            'theme' => Select2::THEME_KRAJEE_BS4,
            'showToggleAll' => false,
            'options' => [
                'multiple' => true,
                // 'autocomplete' => 'off',
            ],
            'pluginOptions' => [
                'tags' => true,
            ],
        ])->label(Yii::t('app', 'Категории')) ?>

        <?= $form->field($page, 'content')->widget(TinyMce::class, [
            'options' => ['rows' => 25],
            'language' => Yii::$app->language,
            'clientOptions' => [
                'plugins' => [
                    'lists', // список
                    'advlist',
                    'link', // ссылка
                    'autolink',
                    'image',
                    'imagetools',
                    'code', // исходный код
                    'codesample',
                    'preview', // предпросмотр
                    'charmap', // спецсимвол
                    'print', // печать
                    'fullscreen', // полноэкранный режим
                    'anchor', // якорь
                    'searchreplace', // поиск и замена
                    'visualblocks',
                    'paste',
                    'contextmenu',
                    'insertdatetime',
                    'media',
                    'table', // таблица
                    'hr', // горизонтальная линия
                    'directionality',
                    'quickbars',
                    'help', // помощь
                    'nonbreaking', // неразрывный пробел
                    // 'spellchecker', // проверка правописания
                    // 'pagebreak', // разрыв страницы
                    // 'autosave',
                    // 'n1ed',
                ],
                // 'apiKey' => "5D47DFLT",
                'toolbar' => 'undo redo | bold italic underline strikethrough | forecolor backcolor | fontselect fontsizeselect | fontsize | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink image | gallery',
                // 'images_upload_url' => 'upload',
                // 'images_upload_base_path' => '/web/images/',
                // 'images_file_types' => 'jpg,png,svg,webp,pdf',
                // 'automatic_uploads' => false,
                // 'relative_urls' => false,
                // 'remove_script_host' => false,
                'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(['elfinder/tinymce']),
                'file_picker_types' => 'file image',
                // 'images_upload_handler' => new JsExpression('mceElf.uploadHandler'),
                // 'image_list' => [
                //     [
                //         'title' => 'My image 1',
                //         'value' => 'https://www.example.com/my1.gif',
                //     ],
                //     [
                //         'title' => 'My image 2',
                //         'value' => 'http://www.moxiecode.com/my2.gif',
                //     ],
                // ],
                'link_list' => [
                    [
                        'title' => '1',
                        'value' => 'https://www.kstu.kz/',
                    ],
                    [
                        'title' => '2',
                        'value' => 'https://univer.kstu.kz/',
                    ],
                ],
            ]
        ])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end() ?>

    </div>

</div>