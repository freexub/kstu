<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_category".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_kk
 * @property string $title_en
 * @property int $status
 * @property int $journal_id
 * @property int $sort
 *
 * @property JournalNumber $journal
 */
class JournalCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_kk', 'title_en', 'journal_id', 'sort'], 'required'],
            [['status', 'journal_id', 'sort'], 'integer'],
            [['title_ru', 'title_kk', 'title_en'], 'string', 'max' => 150],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => JournalNumber::class, 'targetAttribute' => ['journal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_ru' => Yii::t('app_article', 'Категория'),
            'title_kk' => Yii::t('app', 'Title Kz'),
            'title_en' => Yii::t('app', 'Title En'),
            'status' => Yii::t('app', 'Status'),
            'journal_id' => Yii::t('app', 'Journal ID'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    /**
     * Gets query for [[Journal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournal()
    {
        return $this->hasOne(Journals::class, ['id' => 'journal_id']);
    }

    public function getAllCategory()
    {
//        if ()
        return $this->hasOne(JournalNumber::class, ['id' => 'journal_id']);
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
}
