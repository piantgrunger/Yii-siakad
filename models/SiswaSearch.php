<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Siswa;

/**
 * SiswaSearch represents the model behind the search form of `app\models\Siswa`.
 */
class SiswaSearch extends Siswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'anak_ke', 'jml_saudara'], 'integer'],
            [['kode_siswa', 'nama_siswa', 'nama_panggilan', 'foto_siswa', 'telp_siswa', 'alamat_siswa', 'tempat_lahir', 'tgl_lahir', 'jns_kelamin', 'status_anak', 'agama', 'gol_darah', 'Warga_Negara', 'nama_ayah', 'telp_ayah', 'alamat_ayah', 'pekerjaan_ayah', 'nama_ibu', 'telp_ibu', 'alamat_ibu', 'pekerjaan_ibu', 'nama_wali', 'telp_wali', 'alamat_wali', 'pekerjaan_wali', 'tgl_masuk', 'tgl_lulus', 'ket', 'created_at', 'updated_at'], 'safe'],
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
        $query = Siswa::find();

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
            'id_siswa' => $this->id_siswa,
            'tgl_lahir' => $this->tgl_lahir,
            'anak_ke' => $this->anak_ke,
            'jml_saudara' => $this->jml_saudara,
            'tgl_masuk' => $this->tgl_masuk,
            'tgl_lulus' => $this->tgl_lulus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_siswa', $this->kode_siswa])
            ->andFilterWhere(['like', 'nama_siswa', $this->nama_siswa])
            ->andFilterWhere(['like', 'nama_panggilan', $this->nama_panggilan])
            ->andFilterWhere(['like', 'foto_siswa', $this->foto_siswa])
            ->andFilterWhere(['like', 'telp_siswa', $this->telp_siswa])
            ->andFilterWhere(['like', 'alamat_siswa', $this->alamat_siswa])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jns_kelamin', $this->jns_kelamin])
            ->andFilterWhere(['like', 'status_anak', $this->status_anak])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'gol_darah', $this->gol_darah])
            ->andFilterWhere(['like', 'Warga_Negara', $this->Warga_Negara])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'telp_ayah', $this->telp_ayah])
            ->andFilterWhere(['like', 'alamat_ayah', $this->alamat_ayah])
            ->andFilterWhere(['like', 'pekerjaan_ayah', $this->pekerjaan_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'telp_ibu', $this->telp_ibu])
            ->andFilterWhere(['like', 'alamat_ibu', $this->alamat_ibu])
            ->andFilterWhere(['like', 'pekerjaan_ibu', $this->pekerjaan_ibu])
            ->andFilterWhere(['like', 'nama_wali', $this->nama_wali])
            ->andFilterWhere(['like', 'telp_wali', $this->telp_wali])
            ->andFilterWhere(['like', 'alamat_wali', $this->alamat_wali])
            ->andFilterWhere(['like', 'pekerjaan_wali', $this->pekerjaan_wali])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
