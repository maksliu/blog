<?php
namespace  backend\models;

use Yii;
use yii\base\Model;
use common\models\Users;

class UpPwdForm extends Model
{
    public $old_pwd;

    public $new_pwd;

    public $re_new_pwd;

    public function rules(){
        return [
            [['old_pwd','new_pwd','re_new_pwd'],'required','message'=>'此项必填'],
            ['re_new_pwd', 'compare', 'compareAttribute' => 'new_pwd', 'operator' => '===','message'=>'两次密码不一致'],
            ['old_pwd','validateOldPwd']
        ];
    }

    public function validateOldPwd($attribute,$params){
        $model = Users::findOne(Yii::$app->session->get('login_info')['id']);

        //var_dump(Yii::$app->session->get('login_info')['id']);exit;

        if(!Yii::$app->security->validatePassword($this->old_pwd,$model->password_hash)){
            $this->addError($attribute,'原密码错误！');
        }
    }

    public function UpPwd(){
        return Users::idByUpPwd(Yii::$app->session->get('login_info')['id'],$this->new_pwd);
    }

}
