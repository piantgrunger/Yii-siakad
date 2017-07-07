<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Biaya;

/**
 * BiayaSearch represents the model behind the search form of `app\models\Biaya`.
 */
class BiayaSearch extends Biaya
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_biaya'], 'integer'],
            [['kode_biaya', 'nama_biaya', 'jenis_biaya', 'ket', 'created_at', 'updated_at'], 'safe'],
            [['total_biaya'], 'number'],
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
        $query = Biaya::find();

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
            'id_biaya' => $this->id_biaya,
            'total_biaya' => $this->total_biaya,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_biaya', $this->kode_biaya])
            ->andFilterWhere(['like', 'nama_biaya', $this->nama_biaya])
            ->andFilterWhere(['like', 'jenis_biaya', $this->jenis_biaya])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
