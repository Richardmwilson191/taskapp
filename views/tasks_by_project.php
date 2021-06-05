<?php include('top.php');
include('../modules/get_tasks_by_project.php');
?>

<div class="list-container">
    <h2><?= $_GET['p_name'] ?> Tasks</h2>
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
        <?php
        $id = $_GET['id'];
        $result = get_tasks_by_project($id);
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
    </table>
</div>

<?php include('base.php'); ?>