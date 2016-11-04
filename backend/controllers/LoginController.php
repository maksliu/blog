<?php
namespace backend\controllers;

use Yii;
use common\controllers\BackController;
use backend\models\AdminLoginForm;

class LoginController extends BackController{


    public function actions()
    {
        return [
            //注入一个验证码组件
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'minLength' => 4,
                'maxLength' => 6,
                'height'=>40,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],

        ];
    }

    /**
    *  实现注册方法
    */
    public function actionLogin(){

        //实例化登录表单
        $model = new AdminLoginForm;

        //实例化请求主键
        $requset = Yii::$app->request;

        //验证请求是否为post请求并且请求不为空
        if($requset->isPost && !empty($requset->post())){

            //验证数据是否传入登录表单并且通过表单验证
            if($model->load($requset->post()) && $model->validate()){

                //通过了验证直接跳转到首页
                return $this->redirect(['index/index']);

            }
        }

        //渲染登录界面并传入表单的模型
        return $this->renderPartial('login',compact('model'));
    }

}
