<?php
include('top.php');
include('../modules/get_tasks.php'); ?>

<div class="list-container">
    <h2>Tasks</h2>
    <table class="item-list">
        <tr>
            <th>Task ID</th>
            <th>Task Name</th>
            <th>Project ID</th>
            <th>Task Status</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Created By</th>
        </tr>
        <?php $result = getTask();
        while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['task_id'] ?></td>
                <td><?= $row['task_name'] ?></td>
                <td><?= $row['p_id'] ?></td>
                <td><?= $row['p_status'] ?></td>
                <td><?= $row['start_date'] ?></td>
                <td><?= $row['end_date'] ?></td>
                <td><?= $row['created_by'] ?></td>
            </tr>
        <?php endwhile; ?>
</div>

<?php include('base.php') ?>