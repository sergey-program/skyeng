<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class User
 *
 * @package app\models
 *
 * @property int      $id
 * @property string   $email
 *
 * @property Client[] $clients
 */
class User extends ActiveRecord
{

	/**
	 * @return string
	 */
	public static function tableName()
	{
		return 'user';
	}

	/**
	 * @return array
	 */
	public function rules()
	{
		return [
			['email', 'required'],
			['email', 'email']
		];
	}

	/**
	 * @return array
	 */
	public function attributeLabels()
	{
		return [
			'email' => 'Email'
		];
	}

	### relations

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getClients()
	{
		return $this->hasMany(Client::className(), ['inviterID' => 'id']);
	}

	### functions
}