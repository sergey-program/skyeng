<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Payments
 *
 * @package app\models
 *
 * @property int    $id
 * @property int    $student_id
 * @property string $datetime
 * @property float  $amount
 */
class Payments extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['student_id', 'datetime', 'amount'], 'required']
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