<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $status_id Статус
 * @property int $author_id Автор
 *
 * @property User $author
 * @property Page[] $pages
 * @property PostCategory[] $postCategories
 * @property Category[] $categories
 * @property Status $status
 */
class Post extends \yii\db\ActiveRecord
{

    public $category_ids;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'author_id', 'category_ids'], 'required'],
            [['status_id', 'author_id'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => Yii::t('app', 'Статус'),
            'author_id' => Yii::t('app', 'Автор'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            // Да это новая запись (insert)
            foreach ($this->category_ids as $category_id) {
                $category = Category::findOne($category_id);
                $this->link('categories', $category);
            }
        } else {
            // Нет, старая (update)
            $postCategories = ArrayHelper::map($this->postCategories, 'category_id', 'category_id');
            foreach (array_diff($this->category_ids, $postCategories) as $category_id) {
                $category = Category::findOne($category_id);
                $this->link('categories', $category);
            }
            foreach (array_diff($postCategories, $this->category_ids) as $category_id) {
                $category = Category::findOne($category_id);
                $this->unlink('categories', $category, true);
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }


    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Pages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::class, ['post_id' => 'id']);
    }

   /**
    * Gets query for [[PostCategories]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->via('postCategories');
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
}
