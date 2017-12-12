<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalleventa;

/**
 * DetalleventaSearch represents the model behind the search form of `app\models\Detalleventa`.
 */
class DetalleventaSearch extends Detalleventa {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['idDetalle', 'idVenta', 'idProducto', 'cantidad', 'precioFinal'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Detalleventa::find();

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
            'idDetalle' => $this->idDetalle,
            'idVenta' => $this->idVenta,
            'idProducto' => $this->idProducto,
            'cantidad' => $this->cantidad,
            'precioFinal' => $this->precioFinal,
        ]);

        return $dataProvider;
    }

    public static function getTotal($provider,$fieldName) {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total;
    }

}
