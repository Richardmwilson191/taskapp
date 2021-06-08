<?php
include('top.php');
include('../modules/get_projects.php'); ?>

<div class="list-container">
    <h2>Projects</h2>
    <table class="item-list">
        <tr>
            <th>Dashboard ID</th>
            <th>Project ID</th>
            <th>Project Name</th>
            <th>Project Status</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Created By</th>
        </tr>
        <?php $result = getProject();
        while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td>
                    <a href="projects_by_dashboard.php?id=<?= $row['db_id'] ?>">
                        <?= $row['db_id'] ?>
                    </a>
                </td>
                <td>
                    <a href="tasks_by_project.php?id=<?= $row['p_id'] ?>&p_name=<?= $row['p_name'] ?>">
                        <?= $row['p_id'] ?>
                    </a>
                </td>
                <td><?= $row['p_name'] ?></td>
                <td><?= $row['p_status'] ?></td>
                <td><?= $row['p_start_dt'] ?></td>
                <td><?= $row['p_end_dt'] ?></td>
                <td><?= $row['created_by'] ?></td>
                <?php if ($_SESSION['username'] == $row['created_by']) : ?>
                    <td><a href="add_project_user.php?id=<?= $row['p_id'] ?>">Add</a></td>
                    <td><a href="modify_project.php?id=<?= $row['p_id'] ?>">Modify</a></td>
                    <td><a href="../modules/delete_project.php?id=<?= $row['p_id'] ?>">Delete</a></td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
        <a href="../modules/restore_projects.php"><button>Restore All</button></a>
</div>

<?php include('base.php') ?>