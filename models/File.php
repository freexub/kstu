<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $filename
 * @property string $original_filename
 * @property string $upload_date
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'original_filename'], 'required'],
            [['upload_date'], 'safe'],
            [['filename'], 'string', 'max' => 20],
            [['original_filename'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'filename' => Yii::t('app', 'Filename'),
            'original_filename' => Yii::t('app', 'Original Filename'),
            'upload_date' => Yii::t('app', 'Upload Date'),
        ];
    }
}
