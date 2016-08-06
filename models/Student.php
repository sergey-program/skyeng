<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Student
 *
 * @package app\models
 *
 * @property int         $id
 * @property string      $name
 * @property string|null $surname
 * @property string|null $gender // enum("male","female","unknown")
 */
class Student extends ActiveRecord
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    const GENDER_UNKNOWN = 'unknown';

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['surname', 'gender'], 'safe']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [];
    }

    ### relations

    ### functions
}