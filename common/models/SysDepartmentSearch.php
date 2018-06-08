<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SysDepartment;
use yii\helpers\ArrayHelper;

/**
 * SysDepartmentSearch represents the model behind the search form of `common\models\SysDepartment`.
 */
class SysDepartmentSearch extends SysDepartment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level', 'created_at', 'updated_at', 'cid', 'did', 'eid'], 'integer'],
            [['dname', 'info', 'map_key', 'province', 'city', 'district'], 'safe'],
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
        $query = SysDepartment::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=>10],
            /*'sort'=>[
                'defaultOrder'=>[
                    'id'=>SORT_DESC,
                ],
                //'attributes'=>['id','title'],
            ],*/
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
            'level' => $this->level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'cid' => $this->cid,
            'did' => $this->did,
            'eid' => $this->eid,
        ]);

        $query->andFilterWhere(['like', 'dname', $this->dname])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'map_key', $this->map_key])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'district', $this->district]);

        return $dataProvider;
    }
}
