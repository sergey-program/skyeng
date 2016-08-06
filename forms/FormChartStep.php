<?php

namespace app\forms;

use app\models\Client;
use yii\base\Model;

/**
 * Class FormChartStep
 *
 * @package app\forms
 *
 * @property int $step
 * @property int $inviterID
 * @property int $status
 */
class FormChartStep extends Model
{
    public $step;
    public $inviterID;
    public $status;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['step', 'inviterID', 'status'], 'required']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'step' => 'Шаг',
            'inviter' => 'Пригласивший',
            'status' => 'Статус'
        ];
    }

    ### functions

    /**
     * Select data from db as array for chart.
     *
     * @return array
     */
    public function getPoints()
    {
        $sql = 'SELECT *, COUNT(id) as counter, ROUND(timeCreate / (60 * 60 * 24 * ' . $this->step . ')) AS timeKey
                FROM client
                WHERE inviterID = ' . $this->inviterID . ' AND status = ' . $this->status . ' GROUP BY timeKey, status';

        return \Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * Prepare specificated data for chart.
     *
     * @return array
     */
    public function getPreparePoints()
    {
        $result = [];
        $points = $this->getPoints();

        if (!empty($points)) {
            foreach ($this->getPoints() as $row) {
                // time as milliseconds (*1000)
                $result[] = '{x: ' . ($row['timeCreate'] * 1000) . ', y: ' . $row['counter'] . '}';
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
            1 => '1 день',
            3 => '3 дня',
            7 => '7 дней',
            14 => '14 дней',
            30 => '30 дней'
        ];
    }

    /**
     * @return array
     */
    public static function getStatusList()
    {
        return [
            Client::STATUS_NEW => 'Новый',
            Client::STATUS_REGISTERED => 'Зарегистрированный',
            Client::STATUS_REFUSED => 'Отказался',
            Client::STATUS_NOT_AVAILABLE => 'Недоступы'
        ];
    }
}