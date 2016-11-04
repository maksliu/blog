<?php
namespace backend\controllers;

use common\controllers\BackController;
use backend\models\test;
class IndexController extends BackController{

     public function actionIndex(){
         //echo '2343';
         $re = 'sdswer23';
         return $this->render('index',compact('re'));
     }

     public function actionEdit(){
         $model = new test;
         $value = '123412';
         return $this->render('edit',compact('model','value'));

     }

 }
