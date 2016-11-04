<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Users;
class InitController extends Controller{

    public function actionAdmin(){
        $user_name = $this->prompt('用户名:');
        $pwd = $this->prompt('密码:');
        $email = $this->prompt('邮箱:');
        $model = new Users;
        $model->name = $user_name;
        $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($pwd);
        $model->email = $email;
        $model->last_login_time = time();
        $model->last_login_ip = ip2long('127.0.0.1');//Yii::$app->request->userIP
        $model->created_at = time();
        $model->updated_at = time();

        if(!$model->save()){
            foreach ($model->getErrors() as $error) {
                foreach ($error as $e) {
                    echo $e . "\n";
                }
            }
            return 1;
        }
        return 0;

    }

    public function actionTest()
    {

    }

}
