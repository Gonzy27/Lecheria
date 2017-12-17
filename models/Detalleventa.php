<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleventa".
 *
 * @property int $idDetalle
 * @property int $idVenta
 * @property int $idProducto
 * @property int $cantidad
 * @property int $precioFinal
 *
 * @property Venta $venta
 * @property Producto $producto
 */
class Detalleventa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalleventa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idVenta', 'idProducto', 'cantidad', 'precioFinal'], 'required'],
            [['idVenta', 'idProducto', 'cantidad', 'precioFinal'], 'integer'],
            [['idVenta'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['idVenta' => 'idVenta']],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProducto' => 'idProducto']],
            [['cantidad'],'stockVal'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function stockVal($attribute, $params) {
        
        if ($this->cantidad > $this->producto->stock)
            $this->addError('cantidad', 'La cantidad no debe ser mayor al stock');
        
        if ($this->cantidad <= 0)
            $this->addError('cantidad', 'La cantidad debe ser mayor a 0');
    }
    public function attributeLabels()
    {
        return [
            'idDetalle' => 'Id Detalle',
            'idVenta' => 'Id Venta',
            'idProducto' => 'Id Producto',
            'cantidad' => 'Cantidad',
            'precioFinal' => 'Precio Final',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['idVenta' => 'idVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['idProducto' => 'idProducto']);
    }
    
}
