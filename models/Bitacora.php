<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property int $idBitacora
 * @property string $nombre
 * @property string $fecha
 * @property int $old_stock
 * @property int $new_stock
 * @property string $observaciones
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha', 'old_stock', 'new_stock', 'observaciones'], 'required'],
            [['fecha'], 'safe'],
            [['old_stock', 'new_stock'], 'integer'],
            [['nombre', 'observaciones'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBitacora' => 'Id Bitacora',
            'nombre' => 'Nombre',
            'fecha' => 'Fecha',
            'old_stock' => 'Old Stock',
            'new_stock' => 'New Stock',
            'observaciones' => 'Observaciones',
        ];
    }
}
