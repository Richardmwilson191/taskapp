<?php
include('top.php');
include('../modules/get_dashboards.php'); ?>

<div class="list-container">
    <h2>Dashboards</h2>
    <?php $result = getDashboard();
    while ($row = mysqli_fetch_assoc($result)) : ?>
        <ul class="item-list">
            <li>Dashboard ID: <?= $row['db_id'] ?></li>
            <li>Project Name: <?= $row['db_name'] ?></li>
            <li>Created By: <?= $row['created_by'] ?></li>
        </ul>
    <?php endwhile; ?>
</div>

<?php include('base.php') ?>