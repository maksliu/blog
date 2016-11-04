<?php
namespace  backend\models;

use Yii;
use yii\base\Model;
use common\models\Users;

class AdminLoginForm extends Model
{
        public $user_name;

        public $pwd;

        public $verifyCode;

        public function rules(){
            return [
                [['user_name','verifyCode'],'trim'],
                [['user_name','verifyCode','pwd'],'required','message'=>'此项必填'],
                ['verifyCode', 'captcha','captchaAction'=>'login/captcha'],
                ['pwd','validatePwd']
            ];
        }

        public function validatePwd($attribute,$params){
                $model = Users::nameByObj($this->user_name);
                if(empty($model)){
                    $this->addError($attribute,'用户名或密码错误！');
                }else{
                    if(!Yii::$app->security->validatePassword($this->pwd,$model->password_hash)){
                        $this->addError($attribute,'用户名或密码错误！');
                    }else{
                        $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->pwd);
                        $model->last_login_time = time();
                        $model->last_login_ip = ip2long(Yii::$app->request->userIP);
                        if($model->save()){
                            $session = Yii::$app->session;
                            if (!$session->isActive) {
                                $session->open();
                            }
                            $session->set('login_info', ['name' => $model->name, 'id' => $model->id]);
                        }
                    }
                }
        }
}
