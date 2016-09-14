<?php

namespace app\models;

use Yii;
use \yii\db\Query;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "actividades".
 *
 * @property integer $id
 * @property integer $usuario
 * @property string $descripcion
 * @property integer $dependencia
 * @property integer $prioridad
 * @property integer $estado
 * @property string $fecha_inicio
 * @property double $duracion
 * @property string $comentario
 */
class Actividades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'descripcion', 'dependencia', 'prioridad', 'estado', 'fecha_inicio', 'duracion', 'comentario'], 'required'],
            [['usuario', 'dependencia', 'prioridad', 'estado'], 'integer'],
            [['descripcion', 'comentario'], 'string'],
            [['fecha_inicio'], 'safe'],
            [['duracion'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'descripcion' => 'Descripcion',
            'dependencia' => 'Dependencia',
            'prioridad' => 'Prioridad',
            'estado' => 'Estado',
            'fecha_inicio' => 'Fecha Inicio',
            'duracion' => 'Duracion',
            'comentario' => 'Comentario',
        ];
    }
      public function getOrganigrama() {
        $query = new Query();
        $query->select('*')
                ->from('organigrama');
        $model = $query->createCommand()->queryAll();
        //$models = Copiadoras::find()->asArray()->all();
        return ArrayHelper::map($model, 'id', 'descripcion');
    }

    public function getPrioridad() {
        $query = new Query();
        $query->select('*')
                ->from('prioridad');
        $model = $query->createCommand()->queryAll();
        //$models = Copiadoras::find()->asArray()->all();
        return ArrayHelper::map($model, 'id', 'descripcion');
    }

    public function getEstado() {
        $query = new Query();
        $query->select('*')
                ->from('estado');
        $model = $query->createCommand()->queryAll();
        //$models = Copiadoras::find()->asArray()->all();
        return ArrayHelper::map($model, 'id', 'descripcion');
    }
}
