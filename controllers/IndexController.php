<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;

/**
 * Class IndexController
 *
 * @package app\controllers
 */
class IndexController extends AbstractController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionSecondEntry()
    {
        $sqlAll = 'SELECT *, SUM(amount) as amount_sum FROM payment GROUP BY student_id ORDER BY student_id';
        $rowsAll = \Yii::$app->db->createCommand($sqlAll)->queryAll();

        $sqlOne = $sqlAll . ' LIMIT 1,1';
        // use queryAll to show that sql gives single entry, otherwise we should use queryOne
        $rowsOne = \Yii::$app->db->createCommand($sqlOne)->queryAll();

        return $this->render('second-entry', [
            'sqlAll' => $sqlAll,
            'rowsAll' => $rowsAll,
            'sqlOne' => $sqlOne,
            'rowsOne' => $rowsOne
        ]);
    }
}