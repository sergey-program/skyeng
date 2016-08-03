<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;

/**
 * Class ClientController
 *
 * @package app\controllers
 */
class ClientController extends AbstractController
{
    public $defaultAction = 'list';

    public function actionList()
    {
        return $this->render('list');
    }
}