<?php

namespace app\forms;

use yii\base\Model;

/**
 * Class FormChartStep
 *
 * @package app\forms
 */
class FormChartStep extends Model
{
    public $step;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['step', 'required'],
            ['step', 'integer']
        ];
    }

    ### functions

    /**
     * @return array
     */
    public static function getStepList()
    {
        return [
            1 => '1 day',
            3 => '3 days',
            7 => '7 days',
            14 => '14 days',
            30 => '30 days'
        ];
    }
}