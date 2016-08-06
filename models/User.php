<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

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
class User extends ActiveRecord implements IdentityInterface
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

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return self::findOne($id);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return null;
	}


	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return true;
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