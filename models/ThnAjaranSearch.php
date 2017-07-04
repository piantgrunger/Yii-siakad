<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ThnAjaran;

/**
 * ThnAjaranSearch represents the model behind the search form of `app\models\ThnAjaran`.
 */
class ThnAjaranSearch extends ThnAjaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_thn_ajaran', 'hari_efektif', 'hari_libur'], 'integer'],
            [['kode_thn_ajaran', 'tahun_mulai', 'tahun_selesai', 'tgl_mulai_thn_ajaran', 'tgl_selesai_thn_ajaran', 'status', 'ket', 'created_at', 'updated_at'], 'safe'],
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
        $query = ThnAjaran::find();

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
            'id_thn_ajaran' => $this->id_thn_ajaran,
            'tgl_mulai_thn_ajaran' => $this->tgl_mulai_thn_ajaran,
            'tgl_selesai_thn_ajaran' => $this->tgl_selesai_thn_ajaran,
            'hari_efektif' => $this->hari_efektif,
            'hari_libur' => $this->hari_libur,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_thn_ajaran', $this->kode_thn_ajaran])
            ->andFilterWhere(['like', 'tahun_mulai', $this->tahun_mulai])
            ->andFilterWhere(['like', 'tahun_selesai', $this->tahun_selesai])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
