<?php include('top.php');
include('../modules/get_dashboards.php');
?>

<center>
    <form class="create-container" action="../modules/create_project.php" method="post">
        <center>
            <h1>Create Project</h1>
            <br />
            <label for="p_id">Project ID</label>
            <input class="textbox" type="text" name="p_id" id="p_id" placeholder="Enter the project ID" required />
            <br /><br /><br />

            <label for="p_name">Project Name</label>
            <input class="textbox" type="text" name="p_name" id="p_name" placeholder="Enter project name" required />
            <br /><br /><br />

            <label for="db_id">Dashboard ID</label>
            <select name="db_id" id="db_id">
                <?php $result = getDashboard();
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['db_id'];
                    echo "<option value=$id>" . $id . "</option>";
                }
                ?>
            </select>
            <br /><br /><br />

            <label for="s_date">Start Date</label>
            <input class="textbox" type="date" name="s_date" id="s_date" placeholder="Enter start date" required />
            <br /><br /><br />

            <label for="e_date">End Date</label>
            <input class="textbox" type="date" name="e_date" id="e_date" placeholder="Enter end date" />
            <br /><br /><br />

            <label for="status">End Date</label>
            <select name="status" id="status">
                <option value="new">New</option>
                <option value="inprogress">In Progress</option>
                <option value="onhold">On Hold</option>
                <option value="completed">Completed</option>
                <option value="deployed">Deployed</option>
            </select>
            <br /><br /><br />

            <input type="submit" value="Submit" name="submit" />
            <a href="dashboard.php"><button type="button" class="cancel">Cancel</button></a>
        </center>
    </form>
</center>

<?php include('base.php') ?>