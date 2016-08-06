<?php

/**
 * @var \yii\web\View $this
 * @var array         $sql
 * @var array         $rows
 */

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-body">

                <?php if (empty($rows)): ?>
                    <p class="alert alert-danger text-center">Empty result...</p>
                    <p class="text-muted text-center">Измените данные в бд под указанную задачу.</p>
                <?php else: ?>

                    <h3>Select second entry</h3>
                    <p class="text-muted"><strong>SQL query</strong>:<br/><i><?= $sql; ?></i></p>
                    <table class="table table-bordered">
                        <tr>
                            <th>student_id</th>
                            <th>name</th>
                            <th>surname</th>
                            <th>payments_count</th>
                            <th>is "lost"</th>
                        </tr>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['surname']; ?></td>
                                <td><?= $row['payment_count']; ?></td>
                                <td><?= $row['latest_status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>