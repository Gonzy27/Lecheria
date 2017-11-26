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
            [['idDetalle', 'idVenta', 'idProducto', 'cantidad'], 'required'],
            [['idDetalle', 'idVenta', 'idProducto', 'cantidad'], 'integer'],
            [['idDetalle'], 'unique'],
            [['idVenta'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['idVenta' => 'idVenta']],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProducto' => 'idProducto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDetalle' => 'Id Detalle',
            'idVenta' => 'Id Venta',
            'idProducto' => 'Id Producto',
            'cantidad' => 'Cantidad',
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
