<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_number".
 *
 * @property int $id
 * @property string $title
 * @property int|null $number
 * @property int $year
 * @property string|null $journalFile
 * @property string|null $posterFile
 * @property int|null $journal_id
 * @property int $status
 * @property string $date_create
 * @property string $date_update
 *
 * @property JournalCategory[] $journalCategories
 */
class JournalNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
            [['number', 'journal_id', 'status', 'year'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['journalFile', 'posterFile'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'number' => Yii::t('app', 'Number'),
            'year' => Yii::t('app', 'Год'),
            'journalFile' => Yii::t('app', 'Journal File'),
            'posterFile' => Yii::t('app', 'Poster File'),
            'journal_id' => Yii::t('app', 'Journal ID'),
            'status' => Yii::t('app', 'Status'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
        ];
    }

    /**
     * Gets query for [[JournalCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournalCategories()
    {
        return $this->hasMany(JournalCategory::class, ['journal_id' => 'id']);
    }
}
