<?php

use app\forms\FormChartStep;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var \yii\web\View            $this
 * @var \app\forms\FormChartStep $formChartStep
 */

?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Chart</h3>
            </div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="panel-body">
                <?= $form->field($formChartStep, 'step')->dropDownList(FormChartStep::getStepList(), ['prompt' => 'Select step...']); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton('Apply', ['class' => 'btn btn-success']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>

