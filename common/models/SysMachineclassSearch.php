<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SysMachineclass;

/**
 * SysMachineclassSearch represents the model behind the search form of `common\models\SysMachineclass`.
 */
class SysMachineclassSearch extends SysMachineclass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['mc_num', 'dname', 'parent_id_path', 'version', 'householder', 'year', 'status', 'fault', 'level', 'info', 'sort_order', 'cat_group'], 'safe'],
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
        $query = SysMachineclass::find();

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
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'mc_num', $this->mc_num])
            ->andFilterWhere(['like', 'dname', $this->dname])
            ->andFilterWhere(['like', 'parent_id_path', $this->parent_id_path])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'householder', $this->householder])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'fault', $this->fault])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'sort_order', $this->sort_order])
            ->andFilterWhere(['like', 'cat_group', $this->cat_group]);

        return $dataProvider;
    }
}
