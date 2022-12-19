<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'autor_id',  'parent_id', 'category_id', 'status'], 'integer'],
            [['title_ru', 'title_kk', 'title_en', 'keywords_ru', 'keywords_kk', 'keywords_en', 'annotation_ru', 'annotation_kk', 'annotation_en', 'comment', 'date_create', 'date_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'autor_id' => $this->autor_id,
            'parent_id' => $this->parent_id,
            'category_id' => $this->category_id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_kk', $this->title_kk])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'keywords_ru', $this->keywords_ru])
            ->andFilterWhere(['like', 'keywords_kk', $this->keywords_kk])
            ->andFilterWhere(['like', 'keywords_en', $this->keywords_en])
            ->andFilterWhere(['like', 'annotation_ru', $this->annotation_ru])
            ->andFilterWhere(['like', 'annotation_kk', $this->annotation_kk])
            ->andFilterWhere(['like', 'annotation_en', $this->annotation_en])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
