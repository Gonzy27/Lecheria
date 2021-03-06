<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venta;

/**
 * VentaSearch represents the model behind the search form of `app\models\Venta`.
 */
class VentaSearch extends Venta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idVenta', 'idCliente'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = Venta::find();

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
            'idVenta' => $this->idVenta,
            'fecha' => $this->fecha,
            'idCliente' => $this->idCliente,
        ]);

        return $dataProvider;
    }
    
    public static function getTotalDetalleValor($model){
        //recive un provider de detalle de compra....
        $total = 0;
        foreach ($model->detalleventas as $item) {
                $total += $item['precioFinal'];
        }

         return $total;
    }
    
     
    
    public static function getTotalDetalleDiarias(){
         //obtengo todas las compras
        $ventas=Venta::find()->where(['fecha'=>date('Y-m-d')])->all();
        $sumatoria=0;
        foreach($ventas as $venta){
            foreach($venta->detalleventas as $detalle){
               $sumatoria=$sumatoria+($detalle->precioFinal);   
            }
        }
        return $sumatoria;
    }
}
