<?php include('top.php');
require('../modules/project_functions.php');
require('../modules/get_users.php');
// require_once('notifications.php');
?>

<center>
    <form class="create-container" action="" method="post">
        <center>
            <h1>Add Project User</h1>
            <label for="username">Username</label>
            <input class="textbox" type="text" name="username" id="username" placeholder="Enter username" required />
            <br /><br /><br />

            <input type="submit" value="Add" name="add" />
            <a href="show_dashboard.php"><button type="button" class="cancel">Cancel</button></a>
        </center>
    </form>
</center>



<?php
if (isset($_POST['add'])) {
    $users = getUsers();
    $username = $_POST['username'];
    if (in_array($username, $users)) {
        $id = $_GET['id'];
        addProjectUser($id);
    } else {
        Notice::addMessage("The user $username does not exist", 'caution');
        header('location:add_project_user.php');
    }
}
?>

<?php include('base.php'); ?>