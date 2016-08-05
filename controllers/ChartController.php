<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\forms\FormChartStep;

class ChartController extends AbstractController
{
    public function actionIndex()
    {
        $formChartStep = new FormChartStep();

        if ($this->isPost()){
            $formChartStep->load($this->post());
        }

        return $this->render('index');
    }
}