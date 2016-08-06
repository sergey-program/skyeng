<?php

use yii\db\Migration;
use yii\db\pgsql\Schema;

class m160806_162034_payments extends Migration
{
    public function safeUp()
    {
        $this->createTable('payments', [
                'id' => 'pk',
                'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'datetime' => Schema::TYPE_DATETIME . ' NOT NULL',
                'amount' => Schema::TYPE_FLOAT . ' NOT NULL',
            ]
        );

        return true;
    }

    public function safeDown()
    {
        $this->dropTable('payments');

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
