<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $rut
 * @property string $nombre
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property int $telefono
 * @property string $emaiil
 *
 * @property Venta[] $ventas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'telefono', 'email'], 'required'],
            [['telefono'], 'integer'],
            [['rut'], 'string', 'max' => 12],
            [['rut'], 'validateRut'],
            [['nombre', 'apellidoPaterno', 'apellidoMaterno', 'email'], 'string', 'max' => 45],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rut' => 'Rut',
            'nombre' => 'Nombre',
            'apellidoPaterno' => 'Apellido Paterno',
            'apellidoMaterno' => 'Apellido Materno',
            'telefono' => 'Telefono',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idCliente' => 'id']);
    }
    
    public function validateRut($attribute, $params) {
        $data = explode('-', $this->rut);
        $evaluate = strrev($data[0]);
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10)
            $result = 'k';
        if ($result == 11)
            $result = 0;
        if ($verifyCode != $result)
            $this->addError('rut', 'Rut inválido.');
    }
}
