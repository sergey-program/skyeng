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
            ['step', 'safe']
        ];
    }
}