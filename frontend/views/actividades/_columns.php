<?php

use yii\helpers\Url;
use \yii\db\Query;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Actividades;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'descripcion',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'dependencia',
        'contentOptions' => ['style' => 'width: 10px; text-align:center'],
        'value' => function($data) {
    $query = new Query();
    $query->select('*')
            ->from('organigrama')->where(['id' => $data->dependencia]);
    $model = $query->createCommand()->queryOne();
    return $model['descripcion'];
},
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => Actividades::getOrganigrama(),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Seleccione'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'prioridad',
        'contentOptions' => ['style' => 'width: 10px; text-align:center'],
        'value' => function($data) {
    $query = new Query();
    $query->select('*')
            ->from('prioridad')->where(['id' => $data->prioridad]);
    $model = $query->createCommand()->queryOne();
    return $model['descripcion'];
},
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => Actividades::getPrioridad(),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Seleccione'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'estado',
        'contentOptions' => ['style' => 'width: 10px; text-align:center'],
        'value' => function($data) {
    $query = new Query();
    $query->select('*')
            ->from('estado')->where(['id' => $data->estado]);
    $model = $query->createCommand()->queryOne();
    return $model['descripcion'];
},
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => Actividades::getEstado(),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Seleccione'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fecha_inicio',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'duracion',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'comentario',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
                'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
                    'data-request-method' => 'post',
                    'data-toggle' => 'tooltip',
                    'data-confirm-title' => 'Are you sure?',
                    'data-confirm-message' => 'Are you sure want to delete this item'],
            ],
        ];
        