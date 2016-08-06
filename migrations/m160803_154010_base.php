<?php

use app\models\User;
use yii\db\Migration;
use yii\db\mysql\Schema;

class m160803_154010_base extends Migration {

	public function safeUp() {
		$this->createTable('user', [
			'id' => 'pk',
			'email' => Schema::TYPE_STRING . ' NULL',
		]);

		// create base admin user
		$user = new User();
		$user->email = 'admin@email.com';
		$user->save();

		$this->createTable('client', [
			'id' => 'pk',
			'inviterID' => Schema::TYPE_INTEGER . ' NOT NULL',
			'name' => Schema::TYPE_STRING . ' NULL',
			'surname' => Schema::TYPE_STRING . ' NULL',
			'phone' => Schema::TYPE_STRING . ' NULL',
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
