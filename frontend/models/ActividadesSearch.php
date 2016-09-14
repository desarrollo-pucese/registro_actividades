<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Actividades;

/**
 * ActividadesSearch represents the model behind the search form about `app\models\Actividades`.
 */
class ActividadesSearch extends Actividades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dependencia', 'prioridad', 'estado'], 'integer'],
            [['descripcion', 'fecha_inicio', 'comentario'], 'safe'],
            [['duracion'], 'number'],
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
        $query = Actividades::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dependencia' => $this->dependencia,
            'prioridad' => $this->prioridad,
            'estado' => $this->estado,
            'fecha_inicio' => $this->fecha_inicio,
            'duracion' => $this->duracion,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
