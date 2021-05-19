<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Todo;

/**
 * TodoCrud represents the model behind the search form about `app\models\Todo`.
 */
class TodoCrud extends Todo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['name', 'timestamp'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Todo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false,                         //######################################
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'category_id' => $this->category_id,
        //     'timestamp' => $this->timestamp,
        // ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
