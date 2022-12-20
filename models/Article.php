<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $autor_id
 * @property int $parent_id
 * @property string $title_ru
 * @property string $title_kk
 * @property string $title_en
 * @property string $keywords_ru
 * @property string $keywords_kk
 * @property string $keywords_en
 * @property string $annotation_ru
 * @property string $annotation_kk
 * @property string $annotation_en
 * @property int $category_id
 * @property string|null $comment
 * @property string|null $documentFile
 * @property string|null $documentShortFile
 * @property string|null $checkFile
 * @property string|null $reviewFile
 * @property string|null $plagiatFile
 * @property int|null $plagiatPoint
 * @property int|null $doi
 * @property string $date_create
 * @property string $date_update
 * @property int $status
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[/*'autor_id', 'parent_id',*/ 'title_ru', 'title_kk', 'title_en', 'keywords_ru', 'keywords_kk', 'keywords_en', 'annotation_ru', 'annotation_kk', 'annotation_en', 'category_id'], 'required'],
            [['autor_id','parent_id', 'category_id', 'status', 'plagiatPoint', 'doi'], 'integer'],
            [['title_ru', 'title_kk', 'title_en', 'keywords_ru', 'keywords_kk', 'keywords_en', 'annotation_ru', 'annotation_kk', 'annotation_en', 'comment'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['documentFile', 'checkFile', 'documentShortFile', 'reviewFile', 'plagiatFile'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'parent_id' => Yii::t('app', 'Журнал'),
            'title_ru' => Yii::t('app_article', 'Название статьи на русском языке'),
            'title_kk' => Yii::t('app_article', 'Название статьи на казахском языке'),
            'title_en' => Yii::t('app_article', 'Название статьи на английском языке'),
            'keywords_ru' => Yii::t('app_article', 'Ключевые слова на русском языке'),
            'keywords_kk' => Yii::t('app_article', 'Ключевые слова на казахском языке'),
            'keywords_en' => Yii::t('app_article', 'Ключевые слова на английском языке'),
            'annotation_ru' => Yii::t('app_article', 'Аннотация на русском языке'),
            'annotation_kk' => Yii::t('app_article', 'Аннотация на казахском языке'),
            'annotation_en' => Yii::t('app_article', 'Аннотация на английском языке'),
            'category_id' => Yii::t('app_article', 'Категория'),
            'comment' => Yii::t('app_article', 'Комментарий для рецензента'),
            'documentFile' => Yii::t('app_article', 'Прикрепите статью'),
            'checkFile' => Yii::t('app_article', 'Прикрепите чек оплаты'),
            'documentShortFile' => Yii::t('app_article', 'Обрезанная статья'),
            'reviewFile' => Yii::t('app_article', 'Рецензия'),
            'plagiatFile' => Yii::t('app_article', 'Отчет антиплагиат'),
            'plagiatPoint' => Yii::t('app_article', 'Уникальность антиплагиат'),
            'doi' => Yii::t('app_article', 'DOI'),
            'date_create' => Yii::t('app_article', 'Дата создания'),
            'date_update' => Yii::t('app', 'Date Update'),
            'status' => Yii::t('app_article', 'Статус'),
        ];
    }

    function beforeSave($insert)
    {
        $this->autor_id = Yii::$app->user->id;
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function getAutor(){
        return $this->hasOne(User::class, ['id' => 'autor_id']);
    }

    public function getJournal(){
        return $this->hasOne(Journals::class, ['id' => 'parent_id']);
    }

    public function getCategory(){
        return $this->hasOne(JournalCategory::class, ['id' => 'category_id']);
    }

    public function getTitle(){
        switch (Yii::$app->language){
            case 'ru':
                return $this->title_ru;
            case 'kk':
                return $this->title_kk;
            case 'en':
                return $this->title_en;
        }
    }

    public function getStatuses(){
        switch ($this->status){
            case 0:
                return 'На проверке РИО';
            case 1:
                return 'На проверке Антиплагиат';
            case 2:
                return 'На проверке Рецензент';
        }
    }
}