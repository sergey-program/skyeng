<?php

use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 */

?>

<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a class="list-group-item" href="<?= Url::to(['create']); ?>">Create client</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Clients</h3>
            </div>

            <div class="panel-body">
                <p>some data</p>
            </div>
        </div>
    </div>
</div>
