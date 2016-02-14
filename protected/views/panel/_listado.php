
<br/><br/><br/>
<div class="row">

    <div class="col-md-3">
        <?php
        echo CHtml::dropDownList('idElectiva', '', CHtml::listData($listadoElectivas, 'idElectiva', 'descripcion'), array('prompt' => 'Seleccione la electiva...',
            'data-role' => 'consultarElectiva', 'class' => 'form-control'));
        ?>
    </div>


</div>

<div id="resultado">

</div>
<br/><br/>

<br/>