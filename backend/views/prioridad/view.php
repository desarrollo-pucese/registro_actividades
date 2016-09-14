<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Prioridad */
?>
<div class="prioridad-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descripcion:ntext',
        ],
    ]) ?>

</div>
