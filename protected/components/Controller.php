<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
 /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
  

    public function init() {
        $this->registerJs();
        $this->registerCss();
        session_start();
    }

  


    public function registerJs() {
       
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquery/jquery-1.10.0.min.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/bootstrap/js/bootstrap.min.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquery-ui/jquery-ui.min.js", CClientScript::POS_HEAD);
           // Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.carousel.min.js", CClientScript::POS_HEAD);
           // Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/select2/select2.min.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/bootstrap/js/dropdown.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/bootstrap/js/bootstrap-slider.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/bootbox.min.js', CClientScript::POS_END);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/funciones.js', CClientScript::POS_END);
           /* Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/raphael/raphael-min.js', CClientScript::POS_END);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/common.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/loading/js/Loading.js', CClientScript::POS_END); */
            /*     Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/npm.js", CClientScript::POS_END); */
      
    }

//custom application css
    public function registerCss() {
      
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/bootstrap/css/bootstrap.min.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/jquery-ui/jquery-ui.min.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/bootstrap/css/dropdown.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/bootstrap/css/bootstrap-slider.css");
          /*  Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/select2/select2.min.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.carousel.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.theme.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/ad-gallery/jquery.ad-gallery.css");
            //Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/main-desktop.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/loading/css/Loading.css');*/
        
    }
	
}