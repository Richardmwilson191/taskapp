<?php include('top.php') ?>

<center>
  <form class="create-container" action="../modules/create_dashboard.php" method="post">
    <center>
      <h1>Create Dashboard</h1>
      <br />
      <label for="db_id">Database ID</label>
      <input class="textbox" type="text" name="db_id" id="db_id" placeholder="Enter the dashboard id" required />
      <br /><br /><br />

      <label for="d_name">Dashboard Name</label>
      <input class="textbox" type="text" name="db_name" id="db_name" placeholder="Enter dashboard name" required />
      <br /><br /><br />

      <input type="submit" value="Submit" name="submit" />
      <a href="dashboard.php"><button type="button" class="cancel">Cancel</button></a>
    </center>
  </form>
</center>

<?php include('base.php') ?>