<?php

use app\models\Client;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var \yii\web\View      $this
 * @var \app\models\Client $client
 */

?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create new client</h3>
            </div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="panel-body">
                <?= $form->field($client, 'name'); ?>
                <?= $form->field($client, 'surname'); ?>
                <?= $form->field($client, 'status')->dropDownList([
                    Client::STATUS_NEW => 'new',
                    Client::STATUS_NOT_AVAILABLE => 'not available',
                    Client::STATUS_REFUSED => 'refused',
                    Client::STATUS_REGISTERED => 'registered'
                ], ['prompt' => '---']); ?>
            </div>

            <div class="panel-footer">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
