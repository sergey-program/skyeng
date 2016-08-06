<?php

use app\forms\FormChartStep;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var \yii\web\View            $this
 * @var \app\forms\FormChartStep $formChartStep
 * @var array                    $rows
 */

?>
<script type="text/javascript">
    var dataPointArray = []; // default

    <?php if (\Yii::$app->request->isPost): ?>
        dataPointArray = [<?= implode(',', $formChartStep->getPreparePoints());?>];
    <?php endif; ?>
</script>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php $form = ActiveForm::begin(); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Укажите шаг на графике</h3>
            </div>

            <div class="panel-body">
                <?= $form->field($formChartStep, 'step')->dropDownList(FormChartStep::getStepList(), ['prompt' => 'Select step...']); ?>
                <?= $form->field($formChartStep, 'status')->dropDownList(FormChartStep::getStatusList(), ['prompt' => 'Select step...']); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton('Показать', ['class' => 'btn btn-success']); ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                <p class="text-muted">Используйте <i>CTRL + LCM</i> (левая кнопки мыши) для увеличения граффика в заданном диапазоне.</p>
            </div>
        </div>

    </div>
</div>
