<?php

use yii\db\Migration;

class m160928_053530_users extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%users}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(20)->notNull()->unique()->comment('用户名'),
            'head'=>$this->string()->comment('头像'),
            'password_hash'=>$this->string()->notNull()->comment('用户hash密码'),
            'email'=>$this->string()->notNull()->unique()->comment('用户邮箱'),
            'last_login_time'=>$this->intger()->comment('最后登录时间'),
            'last_login_ip'=>$this->string(15)->comment('最后登录Ip'),
            'create_time'=>$this->integer()->notNull()->comment('创建时间'),
            'update_time'=>$this->integer()->notNull()->comment('修改时间')
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
