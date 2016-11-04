<?php
namespace backend\controllers;

use common\controllers\BackController;

class LoginController extends BackController{
    public function actionLogin(){
        return $this->render('login');
    }
}
