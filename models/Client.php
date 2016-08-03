<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Client
 *
 * @package app\models
 *
 * @property int    $id
 * @property string $name
 * @property int    $inviterID
 * @property string $surname
 * @property int    $status
 * @property int    $timeCreate
 *
 * @property User   $inviter
 */
class Client extends ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_REGISTERED = 2;
    const STATUS_REFUSED = 3;
    const STATUS_NOT_AVAILABLE = 4;

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'inviterID', 'status',], 'required'],
            [['surname', 'timeCreate'], 'safe']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'inviterID' => 'Приглашающий',
            'surname' => 'Фамилия',
            'status' => 'Имя',
            'timeCreate' => 'Имя',
        ];
    }

    ### relations

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInviter()
    {
        return $this->hasOne(User::className(), ['id' => 'inviterID']);
    }

    ### functions

}