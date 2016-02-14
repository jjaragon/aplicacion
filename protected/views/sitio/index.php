<div class="row">

    <div class="row">
        <!--/span-->
    </div><!--/row-->

    <div class="row">

        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Ingreso al sistema
            </div>
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
            <fieldset>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                    <?php echo $form->textField($model, 'nombreUsuario', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('nombreUsuario'))); ?>
                </div>

                <?php echo $form->error($model, 'nombreUsuario', array('class' => 'has-error')); ?>

                <div class="clearfix"></div>
                <br/>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('password'))); ?>
                </div>
                <?php echo $form->error($model, 'password', array('class' => 'has-error')); ?>
                <div class="clearfix"></div>
                <br/>
                <?php foreach (Yii::app()->user->getFlashes() as $key => $message) : ?>
                    <div class="<?= $key ?>"><?= $message ?></div>
                <?php endforeach; ?>
            </fieldset>
            <br/>
            <div class="row">
                <div class="center col-md-3">
                    <?php echo CHtml::submitButton('Ingresar', array('class' => 'btn btn-primary')); ?>
                </div>
                <div class="center col-md-4">
                    <?php echo CHtml::link('Registrarme como estudiante', CController::createUrl('sitio/registro'),array('class' => 'btn btn-default')); ?>
                </div>
            </div>

            <?php $this->endWidget(); ?>

        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->