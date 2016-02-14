<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'id' => "form-autenticar",
        'class' => "form-horizontal",
        'role' => 'form',
    ),
    'errorMessageCssClass' => 'has-error',
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'errorCssClass' => 'has-error',
        'successCssClass' => 'has-success',
    //'inputContainer' => '.form-group',
    ))
);
?>
<br/><br/><br/>
<div class="row">
    <div class="col-md-3">
        <?php echo $form->textField($modelElectiva, 'descripcion', array('class' => 'form-control', 'placeholder' => $modelElectiva->getAttributeLabel('descripcion'))); ?>
        <?php echo $form->error($modelElectiva, 'descripcion', array('class' => 'has-error')); ?>
    </div>

    <div class="col-md-3">
        <?php echo $form->dropdownlist($modelElectiva, 'idProfesor', CHtml::listData(Profesor::model()->findAll(),'idProfesor','nombreCompleto'), array('class' => 'form-control', 'prompt' => 'Seleccione docente...')); ?>
        <?php echo $form->error($modelElectiva, 'idProfesor', array('class' => 'has-error')); ?>
    </div>

    <div class="col-md-3">
        <?php echo $form->textField($modelElectiva, 'cuposDisponibles', array('class' => 'form-control', 'placeholder' => $modelElectiva->getAttributeLabel('cuposDisponibles'))); ?>
        <?php echo $form->error($modelElectiva, 'cuposDisponibles', array('class' => 'has-error')); ?>
    </div>
    <div class="center col-md-3">
        <?php echo CHtml::submitButton('Agregar', array('class' => 'btn btn-primary')); ?>
    </div>
</div>
<br/><br/>
    <?php foreach (Yii::app()->user->getFlashes() as $key => $message) : ?>
        <div class="<?= $key ?>"><?= $message ?></div>
    <?php endforeach; ?>

<br/>
<?php $this->endWidget(); ?>

<br/>
<?php if ($electivas): ?>
    <table class="table table-bordered table-condensed table-responsive table-striped">
        <tr>
            <th>Descripcion</th>
            <th>Docente</th>
            <th>Cupos Disponibles</th>
            <th>Actualizar</th>
        </tr>
        <?php foreach ($electivas as $elect): ?>
            <tr>
                <th><?php echo $elect->descripcion ?></th>
                <th><?php echo $elect->objProfesor->nombres." ". $elect->objProfesor->apellidos?></th>
                <th><?php echo $elect->cuposDisponibles ?></th>
                <th><a href="#" data-role="actualizar-cupos" ><span class="glyphicon glyphicon-refresh"></span></a></th>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="alert alert-danger">No hay Electivas Activas</div>
<?php endif; ?>

