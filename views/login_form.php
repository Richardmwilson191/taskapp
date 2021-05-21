<?php include('top.php'); ?>
    
<center>
    <div class="box">
        <h1>Sign In Form<br><br><br>
            <form action="../modules/login.php" method="post">
                <i class="far fa-user"></i>
                <input class="textbox" type="text" name="username" value="" placeholder="Username" required><br><br>
                <i class="fas fa-unlock"></i>
                <input class="textbox" type="password" name="password" value="" placeholder="Password" required><br><br>

                <input type="submit" name="login" value="Sign In">
                <label>
                    <h3><input type="checkbox" checked="checked" name="remember"> Remember me</h3>
                </label>

                <div style="background-color:#f1f1f1">
                    <button type="button">Cancel</button>&emsp;&emsp;&emsp;
                    <span>Forgot <a href="#">password?</a></span>
                </div>
            </form>

    </div>
</center>
<?php include('base.php') ?>
