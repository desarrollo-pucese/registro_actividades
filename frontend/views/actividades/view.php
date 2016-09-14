<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Actividades */
?>
<div class="actividades-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descripcion:ntext',
            'dependencia',
            'prioridad',
            'estado',
            'fecha_inicio',
            'duracion',
            'comentario:ntext',
        ],
    ]) ?>

</div>
