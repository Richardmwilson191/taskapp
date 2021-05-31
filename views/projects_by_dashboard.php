<?php include('top.php');
include('../modules/get_projects_by_dashboard.php');
?>

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
        <?php
        $id = $_GET['id'];
        $result = get_projects_by_dashboard($id);
        while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td>
                    <a href="projects_by_dashboard.php?id= <?= $row['db_id'] ?>">
                        <?= $row['db_id'] ?>
                    </a>
                </td>
                <td><?= $row['p_id'] ?></td>
                <td><?= $row['p_name'] ?></td>
                <td><?= $row['p_status'] ?></td>
                <td><?= $row['p_start_dt'] ?></td>
                <td><?= $row['p_end_dt'] ?></td>
                <td><?= $row['created_by'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include('base.php'); ?>