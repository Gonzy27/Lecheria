<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $idProducto
 * @property string $nombre
 * @property string $detalle
 * @property int $stock
 * @property int $precio
 *
 * @property Detalleventa[] $detalleventas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'detalle', 'stock', 'precio'], 'required'],
            [['stock', 'precio'], 'integer'],
            [['stock'],'mayor'],
            [['precio'],'mayor'],
            [['nombre'], 'string', 'max' => 45],
            [['detalle'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    
    public function mayor($attribute, $params) {
        
        
        if ($this->stock < 0)
            $this->addError('stock', 'La cantidad debe ser mayor o igual a 0');
        if ($this->precio <= 0)
            $this->addError('precio', 'La cantidad debe ser mayor a 0');
    }
    public function attributeLabels()
    {
        return [
            'idProducto' => 'Id Producto',
            'nombre' => 'Nombre',
            'detalle' => 'Detalle',
            'stock' => 'Stock',
            'precio' => 'Precio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['idProducto' => 'idProducto']);
    }
}
