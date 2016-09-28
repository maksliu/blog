<?php

use yii\db\Migration;

class m160928_124856_articles extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%articles}}',[
            'id'=>$this->primaryKey(),
            'opid'=>$this->string(6)->notNull()->unique()->comment('文章唯一编号'),
            'title'=>$this->string(100)->notNull()->unique()->comment('用户名'),
            'images'=>$this->string()->comment('文章图片'),
            'keywords'=>$this->string()->comment('关键字'),
            'description'=>$this->string()->comment('描述'),
            'section_id'=>$this->intger()->notNull()->comment('栏目ID'),
            'section_opid'=>$this->string(6)->notNull()->comment('栏目唯一编号'),
            'comtent'=>$this->text()->comment('内容'),
            'status'=>$this->smallInteger()->notNull()->defaultValue(0)->comment('发布状态 0-草稿 1-发布'),
            'create_time'=>$this->integer()->notNull()->comment('创建时间'),
            'update_time'=>$this->integer()->notNull()->comment('修改时间')
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%articles}}');
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
