<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_reviewer".
 *
 * @property int $id
 * @property int $user_id
 * @property int $journal_category_id
 * @property int $status
 */
class JournalReviewer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_reviewer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'journal_category_id'], 'required'],
            [['user_id', 'journal_category_id', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'journal_category_id' => Yii::t('app', 'Journal Category ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
     public function getReviewer(){
         return $this->hasOne(Profile::class, ['user_id' => 'user_id']);
     }
}
