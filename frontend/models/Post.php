<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $post
 * @property integer $usuario
 * @property string $fecha
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }
 public function behaviors()
    {
        return [
            'AuditTrailBehavior' => [
                'class' => 'bedezign\yii2\audit\AuditTrailBehavior',
                // Array with fields to save. You don't need to configure both `allowed` and `ignored`
                //'allowed' => ['some_field'],
                // Array with fields to ignore. You don't need to configure both `allowed` and `ignored`
                //'ignored' => ['another_field'],
                // Array with classes to ignore
                //'ignoredClasses' => ['common\models\Model'],
                // Is the behavior is active or not
                'active' => true,
                // Date format to use in stamp - set to "Y-m-d H:i:s" for datetime or "U" for timestamp
                'dateFormat' => 'Y-m-d H:i:s',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post', 'usuario'], 'required'],
            [['post'], 'string'],
            [['usuario'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post' => 'Post',
            'usuario' => 'Usuario',
            'fecha' => 'Fecha',
        ];
    }
}
