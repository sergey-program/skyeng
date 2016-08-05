<?php

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
                <h3 class="panel-title">Update</h3>
            </div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="panel-body">
                <?= $this->render('_formClient',['form' => $form, 'client' => $client]) ;?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton('Apply', ['class' => 'btn btn-primary']); ?>
                <?= Html::a('Back', ['list'], ['class' => 'btn btn-info']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
