<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_article".
 *
 * @property int $id
 * @property int $autor_id
 * @property int|null $parent_id
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
 * @property string|null $commentJournal
 * @property string $documentFile
 * @property string|null $documentShortFile
 * @property string $checkFile
 * @property string|null $reviewFile
 * @property int|null $reviewUser
 * @property string|null $plagiatFile
 * @property int|null $plagiatPoint
 * @property string|null $doi
 * @property string $date_create
 * @property string $date_update
 * @property int $status
 * @property string $authorFullName
 * @property string $authorsFile
 * @property string $authorOrganization
 * @property string $authorEmail
 * @property string $authorPhone
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

    public $stat;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor_id', 'title_ru', /*'title_kk', 'title_en',*/ 'keywords_ru',/* 'keywords_kk', 'keywords_en',*/ 'annotation_ru', /*'annotation_kk', 'annotation_en',*/ 'category_id', 'documentFile', /*'checkFile',*/ 'authorFullName', 'authorsFile', 'authorOrganization', 'authorEmail', 'authorPhone', 'status'], 'required'],
            [['autor_id', 'parent_id', 'category_id', 'plagiatPoint', 'status', 'reviewUser'], 'integer'],
            [['title_ru', 'title_kk', 'title_en', 'keywords_ru', 'keywords_kk', 'keywords_en', 'annotation_ru', 'annotation_kk', 'annotation_en', 'comment', 'commentJournal'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['documentFile', 'documentShortFile', 'checkFile', 'reviewFile', 'plagiatFile', 'doi', 'authorsFile', 'authorEmail'], 'string', 'max' => 100],
            [['authorFullName'], 'string', 'max' => 150],
            [['authorOrganization'], 'string', 'max' => 250],
            [['authorPhone'], 'string', 'max' => 50],
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
            'title_ru' => Yii::t('app_article', 'Название статьи'),
            'title_kk' => Yii::t('app_article', 'Название статьи на казахском языке'),
            'title_en' => Yii::t('app_article', 'Название статьи на английском языке'),
            'keywords_ru' => Yii::t('app_article', 'Ключевые слова'),
            'keywords_kk' => Yii::t('app_article', 'Ключевые слова на казахском языке'),
            'keywords_en' => Yii::t('app_article', 'Ключевые слова на английском языке'),
            'annotation_ru' => Yii::t('app_article', 'Аннотация'),
            'annotation_kk' => Yii::t('app_article', 'Аннотация на казахском языке'),
            'annotation_en' => Yii::t('app_article', 'Аннотация на английском языке'),
            'category_id' => Yii::t('app_article', 'Категория'),
            'comment' => Yii::t('app_article', 'Комментарий для рецензента'),
            'commentJournal' => Yii::t('app_article', 'Комментарий проверяющего'),
            'documentFile' => Yii::t('app_article', 'Прикрепите статью'),
            'checkFile' => Yii::t('app_article', 'Прикрепите чек оплаты'),
            'documentShortFile' => Yii::t('app_article', 'Обрезанная статья'),
            'reviewFile' => Yii::t('app_article', 'Рецензия'),
            'reviewUser' => Yii::t('app_article', 'Рецензент'),
            'plagiatFile' => Yii::t('app_article', 'Отчет антиплагиат'),
            'plagiatPoint' => Yii::t('app_article', 'Процент оригинальности'),
            'doi' => Yii::t('app_article', 'DOI'),
            'date_create' => Yii::t('app_article', 'Дата создания'),
            'date_update' => Yii::t('app', 'Date Update'),
            'status' => Yii::t('app_article', 'Статус'),
            'authorFullName' => Yii::t('app_article', 'ФИО автора'),
            'authorsFile' => Yii::t('app_article', 'Прикрепите файл со списком авторов'),
            'authorOrganization' => Yii::t('app_article', 'Организация'),
            'authorEmail' => Yii::t('app', 'E-mail'),
            'authorPhone' => Yii::t('app_article', 'Телефон'),
            'authorPhone' => Yii::t('app_article', 'Телефон'),
            'stat' => Yii::t('app', 'Статус'),
        ];
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
        return $this->hasOne(JournalStatuses::class, ['id' => 'status']);
    }

    public function getReviewerUser(){
        return $this->hasOne(Profile::class, ['user_id' => 'reviewUser']);
    }

//    public function getStatuses(){
//        switch ($this->status){
//            case 0:
//                return 'На проверке РИО';
//            case 1:
//                return 'На проверке Антиплагиат';
//            case 2:
//                return 'На проверке Рецензент';
//        }
//    }
}
