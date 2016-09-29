<?php

namespace console\controllers;

use yii\console\Controller;
use common\models\Users;
class InitController extends Controller{

    public function actionAdmin(){
        echo $this->stdout("Hello?\n", Console::FG_YELLOW);
    }

    public function actionTest()
    {
        
    }

}
