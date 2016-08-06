<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160806_162258_student extends Migration
{
    public function safeUp()
    {
        $this->createTable('student', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'surname' => Schema::TYPE_STRING . ' NULL',
            'gender' => 'ENUM ("male", "female", "unknown") DEFAULT "unknown"'
        ]);

        $this->createTable('student_status', [
            'id' => 'pk',
            'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => 'ENUM ("new", "studying", "vacation", "testing", "lost") NOT NULL DEFAULT "new"',
            'datetime' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);

        return true;
    }

    public function safeDown()
    {
        $this->dropTable('student');
        $this->dropTable('student_status');

        return true;
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
