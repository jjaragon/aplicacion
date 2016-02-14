<?php

class SitioController extends Controller {

    public $layout = "//layouts/column1";

    /**
     * Declares class-based actions.
     */

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $model = new Usuario();
        
        if (!isset($_SESSION['idUsuario'])) {
            if ($_POST) {

                $model->attributes = $_POST['Usuario'];

                $usuarioExistente = Usuario::model()->find(
                        array(
                            'condition' => "nombreUsuario =:usuario AND password=md5('" . $_POST['Usuario']['password'] . "')",
                            'params' => array(
                                'usuario' => $model->nombreUsuario
                            )
                        )
                );

                if ($usuarioExistente) {
                    $_SESSION['idUsuario']= $usuarioExistente->idUsuario;
                    $_SESSION['idCedula']=  $usuarioExistente->nombreUsuario;
                    $_SESSION['perfil']=  $usuarioExistente->perfil;
                    $this->redirect(CController::createUrl('panel/index'));
                } else {
                    Yii::app()->user->setFlash('alert alert-danger', "Usuario no existente");
                }
            }



            $this->render('index', array(
                'model' => $model
            ));
        } else {
            $this->redirect(CController::createUrl('panel/index'));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

   public function actionRegistro(){
       $modelAlumnos = new Alumno();
       
       if (isset($_POST['Alumno'])) {
            try {
                $usuario = new Usuario();
                $usuario->perfil = 3;
                $usuario->nombreUsuario = $_POST['Alumno']['identificacion'];
                $usuario->password = md5($_POST['Alumno']['identificacion']);

                if ($usuario->save()) {
                    $alumno = new Alumno();
                    $alumno->attributes = $_POST['Alumno'];
                    $alumno->idUsuario = $usuario->idUsuario;

                    if (!$alumno->save()) {
                        Yii::app()->user->setFlash('alert alert-danger', "Alumno no fue creado");
                    } else {
                        Yii::app()->user->setFlash('alert alert-success', "Alumno  fue creado con éxito");
                        $this->redirect(CController::createUrl('/sitio/index'));
                    }
                } else {
                    Yii::app()->user->setFlash('alert alert-danger', "Alumno no fue creado");
                }
            } catch (Exception $e) {
                Yii::app()->user->setFlash('alert alert-danger', "Alumno no fue creado");
            }
        }
        
       $this->render('registroEstudiantes', array('modelAlumnos' => $modelAlumnos));
   }

}
