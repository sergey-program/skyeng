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
                    <p class="alert alert-danger">Empty result...</p>
                <?php else: ?>
                    <p class="text-muted"><strong>SQL query</strong>:<br/><i><?= $sql; ?></i></p>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Gender</th>
                            <th>Status</th>
                        </tr>

                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['gender']; ?></td>
                                <td><?= $row['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>