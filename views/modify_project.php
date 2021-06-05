<?php include('top.php');
require('../modules/project_functions.php');
require('../modules/get_users.php');

?>

<center>
    <form class="create-container" action="" method="post">
        <center>
            <h1>Modify Project</h1>
            <label for="d_name">Project Name</label>
            <input class="textbox" type="text" name="p_name" id="p_name" placeholder="Enter new project name" required />
            <br /><br /><br />
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="new">New</option>
                <option value="inprogress">In Progress</option>
                <option value="onhold">On Hold</option>
                <option value="completed">Completed</option>
                <option value="deployed">Deployed</option>
            </select>
            <br /><br /><br />

            <input type="submit" value="Modify" name="modify" />
            <a href="show_project.php"><button type="button" class="cancel">Cancel</button></a>
        </center>
    </form>
</center>

<?php
if (isset($_POST['modify'])) {
    modifyProject();
}
