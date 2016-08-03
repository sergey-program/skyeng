<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160803_154010_base extends Migration {

	public function safeUp() {
		$this->createTable('user', [
			'id' => 'pk',
			'email' => Schema::TYPE_STRING . ' NULL',
		]);

		$this->createTable('client', [
			'id' => 'pk',
			'name' => Schema::TYPE_STRING . ' NULL',
			'inviterID' => Schema::TYPE_INTEGER . ' NOT NULL',
			'surname' => Schema::TYPE_STRING . ' NULL',
			'status' => Schema::TYPE_INTEGER . ' NULL',
			'timeCreate' => Schema::TYPE_BIGINT . ' NULL'
		]);

		return true;
	}

	public function safeDown() {
		$this->dropTable('user');
		$this->dropTable('client');

		return true;
	}
}
