<?php include('top.php');
require('../modules/dashboard_functions.php');
require('../modules/get_users.php');

?>

<center>
    <form class="create-container" action="" method="post">
        <center>
            <h1>Modify Dashboard</h1>
            <label for="d_name">Dashboard Name</label>
            <input class="textbox" type="text" name="db_name" id="db_name" placeholder="Enter d_name" required />
            <br /><br /><br />

            <input type="submit" value="Modify" name="modify" />
            <a href="show_dashboard.php"><button type="button" class="cancel">Cancel</button></a>
        </center>
    </form>
</center>

<?php
if (isset($_POST['modify'])) {
    modifyDashboard();
}
