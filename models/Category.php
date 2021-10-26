<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property int $sort
 * 
 * @property Category[] $categories 
 * @property Category $parent 
 * @property PostCategory[] $postCategories
 * @property Post[] $posts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'sort'], 'required'],
            [['parent_id', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['parent_id' => 'id']], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Название'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

	/** 
     * Gets query for [[Categories]]. 
     * 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getCategories() 
    { 
        return $this->hasMany(Category::class, ['parent_id' => 'id']); 
    } 
  
    /** 
     * Gets query for [[Parent]]. 
     * 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getParent() 
    { 
        return $this->hasOne(Category::class, ['id' => 'parent_id']); 
    }

    /**
     * Gets query for [[PostCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['id' => 'post_id'])->via('postCategories');
    }
}
