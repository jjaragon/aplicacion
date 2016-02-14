<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PanelController extends Controller {

    public function filters() {
        return array(
            //'access',
            'login + index, profesores, electiva, matricula, listado, tabulado',
                //'loginajax + direccionActualizar',
        );
    }

    /*
      public function filters() {
      return array(
      array('tienda.filters.AccessControlFilter'),
      array('tienda.filters.LanzamientoControlFilter'),
      );
      } */

    public function filterLogin($filter) {
        if (!isset($_SESSION['idUsuario'])) {
            $this->redirect(CController::createUrl('/sitio/index'));
        }
        $filter->run();
    }

    public function actionIndex() {

        if (isset($_SESSION['idUsuario'])) {
            $params['active'] = 1;
            $this->render('panel', array('params' => $params));
        }
    }

    public function actionProfesores() {
        if ($_SESSION['perfil'] == 1) {
            $params['active'] = 2;
            $params['vista'] = '_profesores';
            $params['modelProfesor'] = new Profesor;

            if (isset($_POST['Profesor'])) {
                try {
                    $usuario = new Usuario();
                    $usuario->perfil = 2;
                    $usuario->nombreUsuario = $_POST['Profesor']['identificacion'];
                    $usuario->password = md5($_POST['Profesor']['identificacion']);

                    if ($usuario->save()) {
                        $profesor = new Profesor();
                        $profesor->attributes = $_POST['Profesor'];
                        $profesor->idUsuario = $usuario->idUsuario;

                        if (!$profesor->save()) {
                            Yii::app()->user->setFlash('alert alert-danger', "Profesor no fue creado");
                        } else {
                            Yii::app()->user->setFlash('alert alert-success', "Profesor  fue creado con éxito");
                        }
                    } else {
                        Yii::app()->user->setFlash('alert alert-danger', "Usuario no fue creado");
                    }
                } catch (Exception $e) {
                    Yii::app()->user->setFlash('alert alert-danger', "Usuario no fue creado");
                }
            }
            $params['profesores'] = Profesor::model()->findAll();
        } else {
            $params['active'] = 0;
            $params['vista'] = "_sinPermisos";
        }
        $this->render('panel', array('params' => $params));
    }

    public function actionElectiva() {
        if ($_SESSION['perfil'] == 1) {
            $params['active'] = 3;
            $params['vista'] = '_electiva';

            $params['modelElectiva'] = new Electiva;

            if (isset($_POST['Electiva'])) {
                try {

                    $electiva = new Electiva();
                    $electiva->attributes = $_POST['Electiva'];

                    if (!$electiva->save()) {
                        Yii::app()->user->setFlash('alert alert-danger', "Electiva no fue creada");
                    } else {
                        Yii::app()->user->setFlash('alert alert-success', "Electiva fue creada con éxito");
                    }
                } catch (Exception $e) {
                    Yii::app()->user->setFlash('alert alert-danger', "Electiva fue creada con éxito");
                }
            }
            $params['electivas'] = Electiva::model()->findAll();
        } else {
            $params['active'] = 0;
            $params['vista'] = "_sinPermisos";
        }
        $this->render('panel', array('params' => $params));
    }

    public function actionMatricula() {
        if ($_SESSION['perfil'] == 3) {
            $params['active'] = 4;
            $params['vista'] = '_matricula';
            $params['modelElectivaAlumno'] = new ElectivaAlumno;
            $alumno = Alumno::model()->find('idUsuario=:usuario', array('usuario' => $_SESSION['idUsuario']));
            if (isset($_POST['ElectivaAlumno'])) {



                $modelElectiva = new ElectivaAlumno;
                $modelElectiva->attributes = $_POST['ElectivaAlumno'];
                $modelElectiva->fechaInscripcion = Date("Y-m-d H:i:s");
                $modelElectiva->estado = 1;
                $modelElectiva->idAlumno = $alumno->idAlumno;

                if ($modelElectiva->save()) {

                    $electiva = Electiva::model()->findByPk($modelElectiva->idElectiva);
                    $electiva->cuposDisponibles--;
                    $electiva->save();
                    Yii::app()->user->setFlash('alert alert-success', "Electiva fue añadida con éxito");
                } else {
                    Yii::app()->user->setFlash('alert alert-danger', "Electiva no fue añadida");
                }
            }

            $electivasAdicionadas = ElectivaAlumno::model()->findAll('idAlumno=:alumno', array('alumno' => $alumno->idAlumno));
            $electivas = array();
            foreach ($electivasAdicionadas as $el) {
                $electivas[] = $el->idElectiva;
            }
            if ($electivasAdicionadas) {
                $params['electivasDisponibles'] = Electiva::model()->findAll('idElectiva not in (' . implode(",", $electivas) . ') AND cuposDisponibles>0');
            } else {
                $params['electivasDisponibles'] = Electiva::model()->findAll('cuposDisponibles>0');
            }
        } else {
            $params['active'] = 0;
            $params['vista'] = "_sinPermisos";
        }
        $this->render('panel', array('params' => $params));
    }

    public function actionListado() {
        if ($_SESSION['perfil'] == 2) {
            $params['active'] = 5;
            $params['vista'] = '_listado';

            $profesor = Profesor::model()->find('idUsuario=:usuario', array('usuario' => $_SESSION['idUsuario']));
            $params['listadoElectivas'] = Electiva::model()->findAll('idProfesor=:profesor', array('profesor' => $profesor->idProfesor));
        } else {
            $params['active'] = 0;
            $params['vista'] = "_sinPermisos";
        }
        $this->render('panel', array('params' => $params));
    }

    public function actionConsultarListado($idElectiva) {

        $alumnos = ElectivaAlumno::model()->findAll(array(
            //  'with' => array('objAlumno'),
            'condition' => 't.idElectiva =:idelectiva',
            'params' => array('idelectiva' => $idElectiva),
        ));


        $this->renderPartial('_listadoClase', array('alumnos' => $alumnos));
    }

    public function actionTabulado() {
        if ($_SESSION['perfil'] == 3) {
            $params['active'] = 6;
            $params['vista'] = '_tabulado';
            $alumno = Alumno::model()->find('idUsuario=:usuario', array('usuario' => $_SESSION['idUsuario']));

            $params['electivas'] = ElectivaAlumno::model()->findAll(array(
                // 'with' => array('objElectiva'),
                'condition' => 't.idAlumno =:alumno',
                'params' => array(
                    'alumno' => $alumno->idAlumno
                )
            ));
        } else {
            $params['active'] = 0;
            $params['vista'] = "_sinPermisos";
        }
        $this->render('panel', array('params' => $params));
    }

    public function actionCerrar() {
        unset($_SESSION['idUsuario']);
        unset($_SESSION['idCedula']);
        unset($_SESSION['perfil']);
        $this->redirect(CController::createUrl('/sitio/index'));
    }

}
