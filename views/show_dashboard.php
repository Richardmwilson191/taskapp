<?php
include('top.php');
include('../modules/get_dashboards.php'); ?>

<div class="list-container">
    <h2>Dashboards</h2>
    <table class="item-list">
        <tr>
            <th>Dashboard ID</th>
            <th>Dashboard Name</th>
            <th>Created By</th>
            <th colspan="3">Options</th>
        </tr>
        <?php $result = getDashboard();
        while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td>
                    <a href="projects_by_dashboard.php?id=<?= $row['db_id'] ?>">
                        <?= $row['db_id'] ?>
                    </a>
                </td>
                <td><?= $row['db_name'] ?></td>
                <td><?= $row['created_by'] ?></td>
                <td><a href="add_dashboard_user.php?id=<?= $row['db_id'] ?>">Add</a></td>
                <td><a href="modify_dashboard.php?id=<?= $row['db_id'] ?>">Modify</a></td>
                <td><a href="../module/delete_dashboard.php?id=<?= $row['db_id'] ?>">Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include('base.php') ?>