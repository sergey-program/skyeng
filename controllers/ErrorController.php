<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;

/**
 * Class ErrorController
 *
 * @package app\controllers
 */
class ErrorController extends AbstractController
{
    /**
     * @return array
     */
    public function actions()
    {
        return ['error' => ['class' => 'yii\web\ErrorAction']];
    }
}