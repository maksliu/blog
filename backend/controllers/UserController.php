<?php
namespace backend\controllers;

use Yii;
use common\controllers\BackController;
use backend\models\UpPwdForm;

class UserController extends BackController
{
    public function actionUppwd(){
        $model = new UpPwdForm;
        $request = Yii::$app->request;
        if($request->isPost && !empty($request->post())){

            if($model->load($request->post()) && $model->validate()){
                if($model->UpPwd()){
                    return $this->redirect(['user/login-out']);
                }
            }

        }

        return $this->render('up-pwd',compact('model'));

    }

    public function actionLoginOut(){
        $session = Yii::$app->session;
        if(!$session->isActive){
            $session->open();
        }
        $session->destroy();
        return $this->redirect(['login/login']);
    }
}
