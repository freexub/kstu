<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_statuses".
 *
 * @property int $id
 * @property int|null $sort
 * @property string $name_ru
 * @property string $name_kk
 * @property string $name_en
 * @property int $type
 * @property int $active
 */
class JournalStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name_ru', 'name_kk', 'name_en'], 'required'],
            [['id', 'sort', 'active', 'type'], 'integer'],
            [['name_ru', 'name_kk', 'name_en'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sort' => Yii::t('app', 'Sort'),
            'name_ru' => Yii::t('app', 'Статус'),
            'name_kk' => Yii::t('app', 'Күй'),
            'name_en' => Yii::t('app', 'Status'),
            'type' => Yii::t('app', 'Тип'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    public function getTitle(){
        switch (Yii::$app->language){
            case 'ru':
                return $this->name_ru;
            case 'kk':
                return $this->name_kk;
            case 'en':
                return $this->name_en;
        }
    }
}
