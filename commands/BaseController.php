<?php

namespace app\commands;

use app\models\Client;
use yii\console\Controller;

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
        $statuses = [Client::STATUS_NEW, Client::STATUS_NOT_AVAILABLE, Client::STATUS_REFUSED, Client::STATUS_REGISTERED];
        Client::deleteAll();

        for ($i = 0; $i < 500; $i++) {
            $client = new Client();
            $client->name = 'name' . \Yii::$app->security->generateRandomString(4);
            $client->surname = 'surname' . \Yii::$app->security->generateRandomString(4);
            $client->inviterID = 1;
            $client->timeCreate = time() + ((60 * 60 * 4) * $i); //
            $client->status = $statuses[mt_rand(0, 3)];
            $client->save();
        }
    }
}
