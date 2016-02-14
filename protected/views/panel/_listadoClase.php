<br /><br /><br />
<?php if ($alumnos): ?>
    
    <table class="table table-bordered table-condensed table-responsive table-striped">

        <tr>
            <td>Identificacion</td>
            <td>Estudiante</td>
            <td>Fecha de matricula</td>
        </tr>

        <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?php echo Alumno::model()->findByPk($alumno->idAlumno)->identificacion ?></td>
                <td><?php echo Alumno::model()->findByPk($alumno->idAlumno)->apellidos ." ". Alumno::model()->findByPk($alumno->idAlumno)->nombres ?> </td>
                <td><?php echo $alumno->fechaInscripcion ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php else: ?>
    <div class="alert alert-danger">Ningún estudiante matriculado </div>

<?php endif; ?>
