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
        <?php echo $form->textField($modelAlumnos, 'identificacion', array('class' => 'form-control', 'placeholder' => $modelAlumnos->getAttributeLabel('identificacion'))); ?>
        <?php echo $form->error($modelAlumnos, 'identificacion', array('class' => 'has-error')); ?>
    </div>

    <div class="col-md-3">
        <?php echo $form->textField($modelAlumnos, 'apellidos', array('class' => 'form-control', 'placeholder' => $modelAlumnos->getAttributeLabel('apellidos'))); ?>
        <?php echo $form->error($modelAlumnos, 'apellidos', array('class' => 'has-error')); ?>
    </div>

    <div class="col-md-3">
        <?php echo $form->textField($modelAlumnos, 'nombres', array('class' => 'form-control', 'placeholder' => $modelAlumnos->getAttributeLabel('apellidos'))); ?>
        <?php echo $form->error($modelAlumnos, 'nombres', array('class' => 'has-error')); ?>
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