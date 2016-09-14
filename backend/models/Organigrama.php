<?php

namespace app\models;

use Yii;
use \yii\db\Query;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "organigrama".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $id_padre
 */
class Organigrama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organigrama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion',], 'required'],
            [['descripcion'], 'string'],
            [['id_padre'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'id_padre' => 'Id Padre',
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
}
