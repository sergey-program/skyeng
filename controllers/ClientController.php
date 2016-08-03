<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\models\Client;

/**
 * Class ClientController
 *
 * @package app\controllers
 */
class ClientController extends AbstractController
{
    public $defaultAction = 'list';

    /**
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $client = new Client();

        return $this->render('create', ['client' => $client]);
    }
}