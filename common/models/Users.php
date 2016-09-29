<?php

namespace common\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord{

    /**
    * 作用：定义表名
    */
    public static function tableName(){
        return '{{%users}}';
    }

    /**
    *作用：根据ID查询用户信息
    */
    public static function idByUser($id){
        return self::findOne($id);
    }

    //public function

}
