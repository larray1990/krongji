<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SysEngineperson;

/**
 * SysEnginepersonSearch represents the model behind the search form of `common\models\SysEngineperson`.
 */
class SysEnginepersonSearch extends SysEngineperson
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tools_id', 'tel', 'amount', 'count', 'created_at', 'updated_at'], 'integer'],
            [['dname'], 'safe'],
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
        $query = SysEngineperson::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=>10],
            'sort'=>[
                'defaultOrder'=>[
                    'id'=>SORT_DESC,
                ],
                //'attributes'=>['id','title'],
            ],
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
            'tools_id' => $this->tools_id,
            'tel' => $this->tel,
            'amount' => $this->amount,
            'count' => $this->count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'dname', $this->dname]);

        return $dataProvider;
    }
}
