<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\models\Student;
use app\models\StudentStatus;

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
        $sqlAll = 'SELECT *, SUM(amount) as amount_sum FROM payment GROUP BY student_id ORDER BY amount_sum DESC';
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

    public function actionJoinEntry()
    {
        $sql = 'SELECT student.id, student.gender, student_status.status FROM student LEFT JOIN student_status ON student.id = student_status.student_id WHERE student.gender = "' . Student::GENDER_UNKNOWN . '" AND student_status.status = "' . StudentStatus::STATUS_VACATION . '"';
        $rows = \Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('join-entry', [
            'sql' => $sql,
            'rows' => $rows
        ]);
    }
}