<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Client
 *
 * @package app\models
 *
 * @property int        $id
 * @property string     $name
 * @property int        $inviterID
 * @property string     $surname
 * @property int        $status
 * @property int        $timeCreate
 * @property int|string $phone
 *
 * @property User       $inviter
 * @property string     $statusAsString
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
            [['surname', 'phone', 'timeCreate'], 'safe']
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
            'status' => 'Статус',
            'statusAsString' => 'Статус',
            'timeCreate' => 'Дата подключения',
            'phone' => 'Телефон'
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

    /**
     * @return string
     */
    public function getStatusAsString()
    {
        switch ($this->status) {
            case self::STATUS_REGISTERED:
                return 'Зарегистрированный';
            case self::STATUS_REFUSED:
                return 'Отказался';
            case self::STATUS_NOT_AVAILABLE:
                return 'Недоступен';
            case self::STATUS_NEW:
            default:
                return 'Новый';
        }
    }
}