<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Users extends ActiveRecord{

    /**
    * 作用：定义表名
    */
    public static function tableName(){
        return '{{%users}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
    *作用：根据ID查询用户信息
    */
    public static function idByUser($id){
        return self::findOne($id);
    }

    /**
    * 作用：根据用户名查询用户的对象信息
    */
    public static function nameByObj($name){
        return self::findOne(['name'=>$name]);
    }

    public static function idByUpPwd($id,$new_pwd){
        $model = self::findOne($id);
        $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($new_pwd);
        return $model->save();
    }

}
