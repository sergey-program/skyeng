<?php

use app\models\Client;

/**
 * @var \yii\web\View             $this
 * @var \yii\bootstrap\ActiveForm $form
 * @var Client                    $client
 */

?>

<?= $form->field($client, 'name'); ?>
<?= $form->field($client, 'surname'); ?>
<?= $form->field($client, 'phone'); ?>
<?= $form->field($client, 'status')->dropDownList([
    Client::STATUS_NEW => 'new',
    Client::STATUS_NOT_AVAILABLE => 'not available',
    Client::STATUS_REFUSED => 'refused',
    Client::STATUS_REGISTERED => 'registered'
], ['prompt' => '---']); ?>
