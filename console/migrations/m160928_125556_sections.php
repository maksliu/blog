<?php
/**
* @author manarch
* @time 2016/09/28
*/
use yii\db\Migration;

class m160928_125556_sections extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%sections}}',[
            'id'=>$this->primaryKey(),
            'opid'=>$this->string(6)->notNull()->unique()->comment('唯一编号'),
            'name'=>$this->string(100)->notNull()->comment('用户名 同级目录下栏目名唯一'),
            'keywords'=>$this->string()->comment('关键字'),
            'description'=>$this->string()->comment('描述'),
            'pid'=>$this->intger()->notNull()->defaultValue(0)->comment('上级Id'),
            'depth'=>$this->intger()->notNull()->defaultValue(0)->comment('上级Id'),
            'order_num'=>$this->intger()->defaultValue(0)->comment('排序号'),
            'allow_child'=>$this->smallInteger(1)->defaultValue(1)->comment('是否允许添加下级 1-yes 0-no'),

            'created_at'=>$this->integer()->notNull()->comment('创建时间'),
            'updated_at'=>$this->integer()->notNull()->comment('修改时间')
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%sections}}');
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
