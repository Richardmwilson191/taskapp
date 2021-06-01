<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=F, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/812b520597.js" crossorigin="anonymous"></script>
</head>
<style>
    body{
        background: url('https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pexels.com%2Fsearch%2Fwebsite%2520background%2F&psig=AOvVaw0dALTbUb6vWBiRa1IrzVhN&ust=1622576058052000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCJDi0IDV9PACFQAAAAAdAAAAABAJ');
    background-repeat: no-repeat;
    background-attachment: fixed;
background-size: 100% 100%;
    }
    .box {
        margin-top: 0;
        border: none;
        opacity: 3;
        box-shadow: 5px 10px 18px grey;
        border-radius: 25px;
       /*  padding: 10px; */
        height: 650px;
        width: 300px;
        background-repeat: no-repeat;
        background-size: auto;
        background-attachment: local;
        background-position: center;
        color: white;
    }

    form {
        font-size: 15px;
        color: white;
    }

    h1 {
        margin-top: 100px;
        font-size: 30px;
        font-family: 'Algerian';
        padding: 5px;
        color: white;
    }

    .textbox {
        padding: 10px 10px;
        border: none;
        border-bottom-style: solid;
        border-bottom-color: blue;
        border-bottom-width: thin;
        background-color: inherit;
        outline: none;
        color: #fff;
    }

    i {
        padding: 5px;
        background: inherit;
        min-width: 50px;
        text-align: center;
        color: #fff;
    }
    .bday{
        background: transparent;
       color: #fff;
    }

    input[type=submit] {
        margin-top: 45px;
        width: 200px;
        height: 50px;
        border-radius: 50px;
        font-size: 20px;
        color: white;
        background: transparent;

    }

    button {
        margin-top: 45px;
        width: 50px;
        height: 20px;
        border-radius: 10px;
        font-size: 10px;
        color: white;
        background-color: blue;

    }
    select {
        width: 65%;
        padding: 10px 10px;
        border: none;
        border-bottom-style: solid;
        border-bottom-color: blue;
        border-bottom-width: thin;
        background-color: inherit;
        outline: none;
        background: transparent;
        color: #fff;
        }
</style>

</head>

<body>
<center>


    <div class="box">
        <h1>Task Form</h1><br><br><br>
            <form action=" " method="post">
                <i class="far fa-user"></i>
                <input class="textbox" type="text" name="id" value="" placeholder="Task ID" required><br><br>
                <i class="far fa-sticky-note"></i>
                <input class="textbox" type="text" name="tsk" value="" placeholder="Task Name" required><br><br>
                <i class="far fa-clipboard"></i>
                <select id="task">
                    <option name="task" selected value="" disabled selected>Choose a Project</option>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select><br><br>
                <i class="fas fa-pen"></i>
                <select id="task1">
                    <option name="task" selected value="" disabled selected>Set Status</option>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <br><br>
                <label for="bdate">Start Time<span>*</span></label>
                    <input  class="bday" id="bdate" type="date" name="bdate">
                    
                    <br><br>
                    <label for="bdate">End Time<span>*</span></label>
                    <input  class="bday" id="bdate" type="date" name="bdate">
                    
                
                <input type="submit" name="submit" value="Create Task">
                
                <input type="submit" name="submit" value="Clear">
            </form>

    </div>
</center>
</body>

</html> 