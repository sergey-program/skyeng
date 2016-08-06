<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class StudentStatus
 *
 * @package app\models
 *
 * @property int    $id
 * @property int    $student_id
 * @property string $status // enum ("new","studying","vacation","testing","lost")
 * @property string $datetime
 */
class StudentStatus extends ActiveRecord
{
    const STATUS_NEW = 'new';
    const STATUS_STUDY = 'studying';
    const STATUS_VACATION = 'vacation';
    const STATUS_TEST = 'testing';
    const STATUS_LOST = 'lost';

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'student_status';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['student_id', 'status', 'datetime'], 'required']
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