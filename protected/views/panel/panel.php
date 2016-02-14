
<ul class="nav nav-tabs">
    <li class="<?php echo ($params['active'] == '1') ? 'active' : '' ?>"><a href="#">Inicio</a></li>
    <?php if ($_SESSION['perfil'] == 1): ?>
        <li class="<?php echo ($params['active'] == '2') ? 'active' : '' ?>"><a href="<?php echo CController::createUrl('panel/profesores') ?>">Profesores</a></li>
        <li class="<?php echo ($params['active'] == '3') ? 'active' : '' ?>"><a href="<?php echo CController::createUrl('panel/electiva') ?>">Adicionar Electiva</a></li>
    <?php endif; ?>
    <?php if ($_SESSION['perfil'] == 2): ?>
        <li class="<?php echo ($params['active'] == '4') ? 'active' : '' ?>"><a href="<?php echo CController::createUrl('panel/matricula') ?>">Matricular Electiva</a></li>
        <li class="<?php echo ($params['active'] == '6') ? 'active' : '' ?>"><a href="<?php echo CController::createUrl('panel/tabulado') ?>">Consultar Tabulado</a></li>

    <?php endif; ?>
    <?php if($_SESSION['perfil'] == 3):?>
        <li class="<?php echo ($params['active'] == '5') ? 'active' : '' ?>"> <a href="<?php echo CController::createUrl('panel/listado') ?>">Consultar Listado de clases</a></li>
    <?php endif;?>
    <li class="<?php echo ($params['active'] == '7') ? 'active' : '' ?>"><a href="<?php echo CController::createUrl('panel/cerrar') ?>">Cerrar Sesión</a></li>
</ul>

<?php if (isset($params['vista'])): ?>
    <?php $this->renderPartial($params['vista'], $params); ?>
<?php endif; ?>