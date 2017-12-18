<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bitacora;

/**
 * BitacoraSearch represents the model behind the search form of `app\models\Bitacora`.
 */
class BitacoraSearch extends Bitacora
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idBitacora', 'old_stock', 'new_stock'], 'integer'],
            [['nombre', 'fecha', 'observaciones'], 'safe'],
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
        $query = Bitacora::find();

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
            'idBitacora' => $this->idBitacora,
            'fecha' => $this->fecha,
            'old_stock' => $this->old_stock,
            'new_stock' => $this->new_stock,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
