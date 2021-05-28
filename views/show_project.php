<?php
include('top.php');
include('../modules/get_projects.php'); ?>

<div class="list-container">
    <h2>Projects</h2>
    <?php $result = getProject();
    while ($row = mysqli_fetch_assoc($result)) : ?>
        <ul class="item-list">
            <li>Dashboard ID: <?= $row['db_id'] ?></li>
            <li>Project ID: <?= $row['p_id'] ?></li>
            <li>Project Name: <?= $row['p_name'] ?></li>
            <li>Project Status: <?= $row['p_status'] ?></li>
            <li>Start date: <?= $row['p_start_dt'] ?></li>
            <li>End date: <?= $row['p_end_dt'] ?></li>
            <li>Created By: <?= $row['created_by'] ?></li>
        </ul>
    <?php endwhile; ?>
</div>

<?php include('base.php') ?>