<?php

namespace app\forms;

use yii\base\Model;

/**
 * Class FormChartStep
 *
 * @package app\forms
 *
 * @property int $step
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

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'step' => 'Шаг'
        ];
    }

    ### functions

    /**
     * @return array
     */
    public function getPoints()
    {
        $sql = 'SELECT *, COUNT(id) as counter, ROUND(`timeCreate`/(60 * 60 * 24 *' . $this->step . ')) AS timekey
                FROM client
                GROUP BY timekey, status';

        return \Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * Use Client constants like Client::STATUS_REGISTERED to filter result.
     *
     * @param string $clientStatus
     *
     * @return array
     */
    public function getPreparePoints($clientStatus)
    {
        $result = [];
        $points = $this->getPoints();

        if (!empty($points)) {
            foreach ($this->getPoints() as $row) {
                if ($row['status'] == $clientStatus) {
                    $result[] = '{x: ' . ($row['timeCreate'] * 1000) . ', y: ' . $row['counter'] . '}';
                }
            }
        }

        return $result;
    }

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