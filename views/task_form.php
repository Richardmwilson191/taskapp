<?php include('top.php');
include('../modules/get_projects.php');
?>
<br><br>
<center>
    <form class="create-container" action="../modules/create_task.php" method="post">
        <center>
            <h1>Create Task</h1>
            <br />
            <label for="task_id">Task ID</label>
            <input class="textbox" type="text" name="task_id" id="task_id" placeholder="Enter the task ID" required />
            <br /><br /><br />

            <label for="task_name">Task Name</label>
            <input class="textbox" type="text" name="task_name" id="task_name" placeholder="Enter task name" required />
            <br /><br /><br />

            <label for="p_id">Project ID</label>
            <select name="p_id" id="p_id">
                <?php $result = getProject();
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['p_id'];
                    echo "<option value=$id>" . $id . "</option>";
                }
                ?>
            </select>
            <br /><br /><br />

            <label for="p_status">End Date</label>
            <select name="p_status" id="p_status">
                <option value="new">New</option>
                <option value="inprogress">In Progress</option>
                <option value="onhold">On Hold</option>
                <option value="completed">Completed</option>
                <option value="deployed">Deployed</option>
            </select>
            <br /><br /><br />

            <label for="end_date">End Date</label>
            <input class="textbox" type="date" name="end_date" id="end_date" placeholder="Enter end date" />
            <br /><br /><br />

            <input type="submit" value="Submit" name="submit" />
            <a href="dashboard.php"><button type="button" class="cancel">Cancel</button></a>
            <a href=""><button type="button" class="cancel">Clear</button></a>
        </center>
    </form>
</center>

<?php include('base.php') ?>