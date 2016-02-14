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
        <?php echo $form->dropdownlist($modelElectivaAlumno, 'idElectiva', CHtml::listData($electivasDisponibles,'idElectiva','descripcion'), array('class' => 'form-control', 'prompt' => 'Seleccione electiva...')); ?>
        <?php echo $form->error($modelElectivaAlumno, 'idProfesor', array('class' => 'has-error')); ?>
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