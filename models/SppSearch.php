<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Spp;

/**
 * SppSearch represents the model behind the search form of `app\models\Spp`.
 */
class SppSearch extends Spp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_spp', 'id_thn_ajaran', 'bulan', 'id_siswa'], 'integer'],
            [['no_spp', 'tgl_spp', 'semester', 'ket', 'created_at', 'updated_at'], 'safe'],
            [['total_spp'], 'number'],
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
        $query = Spp::find();

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
            'id_spp' => $this->id_spp,
            'tgl_spp' => $this->tgl_spp,
            'id_thn_ajaran' => $this->id_thn_ajaran,
            'bulan' => $this->bulan,
            'id_siswa' => $this->id_siswa,
            'total_spp' => $this->total_spp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'no_spp', $this->no_spp])
            ->andFilterWhere(['like', 'semester', $this->semester])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
