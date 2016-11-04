<?php
namespace common\controllers;

use Yii;
use yii\web\Controller;

class BackController extends Controller{
    public $layout = 'common';

    public function __construct($id, $module, $config = []){

        return parent::__construct($id, $module, $config);

    }

    public function beforeAction($action){

        //获取当前控制器名
          $controllerName = $action->controller->id;

          //获取当前操作名
          $actionName = $action->id;

          //不在控制范围的路由
          $no_rute = [
            'login/login',
            'login/captcha',
            'user/login-out',

          ];

          $session = Yii::$app->session;

          if(!in_array($controllerName.'/'.$actionName,$no_rute) && !$session->has('login_info')){
                  return $this->redirect(['login/login']);
          }
        return parent::beforeAction($action);
    }


}
