<?php

namespace app\commands;

use app\models\Client;
use app\models\Payment;
use app\models\Student;
use app\models\StudentStatus;
use yii\console\Controller;
use yii\data\Pagination;

/**
 * Class BaseController
 *
 * @package app\commands
 */
class BaseController extends Controller
{
    /**
     * Temp data for tests.
     */
    public function actionCreateData()
    {
        \Yii::$app->db->createCommand('TRUNCATE ' . Client::tableName() . '; TRUNCATE ' . Student::tableName() . '; TRUNCATE ' . StudentStatus::tableName() . '; TRUNCATE ' . Payment::tableName() . ';')->execute();

        $statuses = [Client::STATUS_NEW, Client::STATUS_NOT_AVAILABLE, Client::STATUS_REFUSED, Client::STATUS_REGISTERED];

        for ($i = 0; $i < 500; $i++) {
            $client = new Client();
            $client->name = 'name' . \Yii::$app->security->generateRandomString(4);
            $client->surname = 'surname' . \Yii::$app->security->generateRandomString(4);
            $client->inviterID = 1;
            $client->timeCreate = time() + ((60 * 60 * 4) * $i); //
            $client->status = $statuses[mt_rand(0, 3)];
            $client->save();
        }

        $genders = [Student::GENDER_MALE, Student::GENDER_FEMALE, Student::GENDER_UNKNOWN];

        for ($i = 0; $i < 100; $i++) {
            $student = new Student();
            $student->name = 'name' . \Yii::$app->security->generateRandomString(4);;
            $student->surname = 'surname' . \Yii::$app->security->generateRandomString(4);;
            $student->gender = $genders[mt_rand(0, 2)];
            $student->save();

            $this->generatePayments($student);
            $this->generateStatuses($student);
        }
    }

    private function generatePayments(Student $student)
    {
        for ($i = 0; $i < 10; $i++) {
            $payment = new Payment();
            $payment->datetime = date("Y-m-d H:i:s");
            $payment->amount = rand() / getrandmax();
            $payment->student_id = $student->id;
            $payment->save();
        }
    }

    private function generateStatuses(Student $student)
    {
        $statuses = [StudentStatus::STATUS_NEW, StudentStatus::STATUS_LOST, StudentStatus::STATUS_STUDY, StudentStatus::STATUS_STUDY, StudentStatus::STATUS_TEST, StudentStatus::STATUS_VACATION];

        for ($i = 0; $i < 10; $i++) {
            $studentStatus = new StudentStatus();
            $studentStatus->student_id = $student->id;
            $studentStatus->status = $statuses[mt_rand(0, 5)];
            $studentStatus->datetime = date("Y-m-d H:i:s");
            $studentStatus->save();
        }
    }
}
