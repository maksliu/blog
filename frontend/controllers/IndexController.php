<?php

namespace frontend\controllers;

use common\controllers\FrontController;

class IndexController extends FrontController{

    public function actionIndex(){
        $hello = "hello word";
        return $this->render('index.twig',compact('hello'));
    }

}
