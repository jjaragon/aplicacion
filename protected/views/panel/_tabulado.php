<br /><br /><br />
<?php if ($electivas): ?>
    
    <table class="table table-bordered table-condensed table-responsive table-striped">

        <tr>
            <td>Descripcion</td>
            <td>Profesor</td>
            <td>Fecha de matricula</td>
        </tr>

        <?php foreach ($electivas as $electiva): ?>
            <tr>
                <td><?php echo Electiva::model()->findByPk($electiva->idElectiva)->descripcion ?></td>
                <td><?php echo Electiva::model()->findByPk($electiva->idElectiva)->objProfesor->apellidos ." ". 
                        Electiva::model()->findByPk($electiva->idElectiva)->objProfesor->nombres ?> </td>
                <td><?php echo $electiva->fechaInscripcion ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php else: ?>
    <div class="alert alert-danger">Ninguna materia matriculada </div>

<?php endif; ?>