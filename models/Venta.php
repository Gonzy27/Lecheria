<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property int $idVenta
 * @property string $fecha
 * @property int $idCliente
 *
 * @property Detalleventa[] $detalleventas
 * @property Cliente $cliente
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'idCliente'], 'required'],
            [['fecha'], 'safe'],
            [['idCliente'], 'integer'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['idCliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVenta' => 'Id Venta',
            'fecha' => 'Fecha',
            'idCliente' => 'Id Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['idVenta' => 'idVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'idCliente']);
    }
}
