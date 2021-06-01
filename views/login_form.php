<?php include('top.php'); ?>
    
<center>
    <div class="box">
        <h1>Sign In Form</h1>
            <form action="../modules/login.php" method="post">
                <i class="far fa-user"></i>
                <input class="textbox" type="text" name="username" value="" placeholder="Username" required><br><br><br><br>
                <i class="fas fa-unlock"></i>
                <input class="textbox" type="password" name="password" value="" placeholder="Password" required><br><br>

                <input type="submit" name="login" value="Sign In"><br><br>

               
                    <input type="checkbox" checked="checked" name="remember">
                    <label><h3> Remember me</h3></label><br><br>

                <div>
                 <button type="button">Cancel</button>&emsp;&emsp;&emsp;</button><br><br>
              
                </div>
                <br><br>
                <span>Forgot<a href="#"> password?</a></span>
                
            </form>

    </div>
</center>
<?php include('base.php') ?>
