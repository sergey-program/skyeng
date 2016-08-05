<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\forms\FormChartStep;

/**
 * Class ChartController
 *
 * @package app\controllers
 */
class ChartController extends AbstractController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $formChartStep = new FormChartStep();

        if ($this->isPost()){
            $formChartStep->load($this->post());
        }

        return $this->render('index', ['formChartStep' => $formChartStep]);
    }
}