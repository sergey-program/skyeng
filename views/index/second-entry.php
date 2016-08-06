<?php

/**
 * @var \yii\web\View $this
 * @var array         $sqlAll
 * @var array         $rowsAll
 * @var array         $sqlOne
 * @var array         $rowsOne
 */

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-body">

                <?php if (empty($rowsAll) || empty($rowsOne)): ?>
                    <p class="alert alert-danger">Empty result...</p>
                <?php else: ?>

                    <h3>Select second entry</h3>
                    <p class="text-muted"><strong>SQL query</strong>:<br/><i><?= $sqlOne; ?></i></p>
                    <table class="table table-bordered">
                        <tr>
                            <th>student_id</th>
                            <th>amount_sum</th>
                        </tr>
                        <?php foreach ($rowsOne as $row): ?>
                            <tr>
                                <td><?= $row['student_id']; ?></td>
                                <td><?= $row['amount_sum']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <h3>Select all</h3>
                    <p class="text-muted"><strong>SQL query</strong>:<br/><i><?= $sqlAll; ?></i></p>
                    <table class="table table-bordered">
                        <tr>
                            <th>student_id</th>
                            <th>amount_sum</th>
                        </tr>

                        <?php foreach ($rowsAll as $row): ?>
                            <tr>
                                <td><?= $row['student_id']; ?></td>
                                <td><?= $row['amount_sum']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>