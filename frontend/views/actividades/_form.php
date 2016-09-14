<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Actividades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
    <div class="form-group field-actividades-dependencia col-md-4 col-xs-12 col-sm-4 required">
        <?= $form->field($model, 'dependencia')->dropDownList($model->getOrganigrama())->label('Organigrama') ?>
    </div>
    <div class="form-group field-actividades-prioridad col-md-4 col-xs-12 col-sm-4 required">
        <?= $form->field($model, 'prioridad')->dropDownList($model->getPrioridad())->label('Prioridad') ?>
    </div>
    <div class="form-group field-actividades-estado col-md-4 col-xs-12 col-sm-4 required">
        <?= $form->field($model, 'estado')->dropDownList($model->getEstado())->label('Estado') ?>
    </div>
    <div class="form-group field-actividades-fecha_inicio col-md-4 col-xs-12 col-sm-4 required">
        <?=
        DateTimePicker::widget([
            'language' => 'es',
            'model' => $model,
            'attribute' => 'fecha_inicio',
            'options' => ['placeholder' => 'Fecha  de inicio ...'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'startView' => 2,
                 'minView' => 2,
                'startDate' =>  date ('Y-m-d'),
            ]
        ]);
        ?>
    </div>
    <div class="form-group field-actividades-duracion col-md-4 col-xs-12 col-sm-4 required">
        <?= $form->field($model, 'duracion')->textInput() ?>
    </div>
    <div class="form-group field-actividades-comentario col-md-4 col-xs-12 col-sm-4 required">
        <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>
    </div>
    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
