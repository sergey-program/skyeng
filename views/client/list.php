<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

/**
 * @var \yii\web\View                $this
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a class="text-success" href="<?= Url::to(['create']); ?>">Добавить</a>
                </div>

                <h3 class="panel-title">Клиенты</h3>
            </div>

            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'id',
                        'name',
                        'surname',
                        'statusAsString',
                        ['label' => 'Inviter', 'attribute' => 'inviter.email'],
                        'phone',
                        ['class' => ActionColumn::className(), 'template' => '{update} {delete}']
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
