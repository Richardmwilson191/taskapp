<?php include('top.php'); ?>

<center>
  <form class="Up" action="../modules/signup_process.php" method="post">
  <center>
    <h1>Sign Up</h1>
    <br />
    <label for="name">Full Name: </label>
    <input
      class="textbox"
      type="text"
      name="name"
      id="name"
      placeholder="Enter your full name"
      required
    />
    <br /><br /><br />

    <label for="birth">Date of Birth: </label>
    <input class="textbox" type="date" name="dob" id="dob" required />
    <br /><br /><br />

    <label for="username">Username: </label>
    <input
      class="textbox"
      type="text"
      name="username"
      id="username"
      placeholder="Enter your unique username"
      required
    />
    <br /><br /><br />

    <label for="password">Password: </label>
    <input
      class="textbox"
      type="password"
      name="password"
      id="password"
      placeholder="Enter your password"
      required
    />
    <br /><br /><br />

    <label for="c_password">Confirm Password: </label>
    <input
      class="textbox"
      type="password"
      name="c_password"
      id="c_password"
      placeholder="Confirm your password"
      required
    />
    <br /><br /><br />

    <input type="submit" value="Submit" name="submit" />
    </center>
  </form>
</center>
<?php include('base.php') ?>
