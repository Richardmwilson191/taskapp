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
        </tr>
        <?php $result = getDashboard();
        while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td>
                    <a href="projects_by_dashboard.php?id= <?= $row['db_id'] ?>">
                        <?= $row['db_id'] ?>
                    </a>
                </td>
                <td><?= $row['db_name'] ?></td>
                <td><?= $row['created_by'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include('base.php') ?>