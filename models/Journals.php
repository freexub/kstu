<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journals".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_kk
 * @property string $title_en
 * @property int $status
 * @property int $sort
 * @property string $poster
 * @property string $date_create
 * @property string $date_update
 */
class Journals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'status', 'poster'], 'required'],
            [['title_ru', 'title_kk', 'title_en'], 'string'],
            [['status', 'sort'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['poster'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Журнал'),
            'title_ru' => Yii::t('app_article', 'Журнал'),
            'title_kk' => Yii::t('app', 'Title Kk'),
            'title_en' => Yii::t('app', 'Title En'),
            'sort' => Yii::t('app', 'Порядковый номер'),
            'status' => Yii::t('app', 'Status'),
            'poster' => Yii::t('app', 'Poster'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
        ];
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
