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
        <?php echo $form->textField($modelProfesor, 'identificacion', array('class' => 'form-control', 'placeholder' => $modelProfesor->getAttributeLabel('identificacion'))); ?>
        <?php echo $form->error($modelProfesor, 'identificacion', array('class' => 'has-error')); ?>
    </div>

    <div class="col-md-3">
        <?php echo $form->textField($modelProfesor, 'apellidos', array('class' => 'form-control', 'placeholder' => $modelProfesor->getAttributeLabel('apellidos'))); ?>
        <?php echo $form->error($modelProfesor, 'apellidos', array('class' => 'has-error')); ?>
    </div>

    <div class="col-md-3">
        <?php echo $form->textField($modelProfesor, 'nombres', array('class' => 'form-control', 'placeholder' => $modelProfesor->getAttributeLabel('apellidos'))); ?>
        <?php echo $form->error($modelProfesor, 'nombres', array('class' => 'has-error')); ?>
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
<?php if ($profesores): ?>
    <table class="table table-bordered table-condensed table-responsive table-striped">
        <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($profesores as $profesor): ?>
            <tr>
                <th><?php echo $profesor->identificacion ?></th>
                <th><?php echo $profesor->nombres ?></th>
                <th><?php echo $profesor->apellidos ?></th>
                <th><a href="<?php
                    echo CController::createUrl('panel/eliminarProfesor', array('idProfesor' => $profesor->identificacion
                        , 'idUsuario' => $profesor->idUsuario))
                    ?>"><span class="glyphicon glyphicon-remove"></span></a></th>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="alert alert-danger">No hay profesores Activos</div>
<?php endif; ?>

