<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <style type="text/css">
        .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
    </style>
    </head>
    <body><br><br><br><br><br><br><br><br>
        <center><h1>Inventory Manager</h1></center>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <div class= "centered">
        <form action="includes/process_login.php" method="post" name="login_form"> 			
            Employee ID:<br> <input type="text" class="form-control" name="emp_id" id="emp_id" />
            <br>
            Password:<br> <input type="password" class="form-control"
                             name="password" 
                             id="password"/>
                             <br>
            <input type="button" class="btn btn-primary"
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        <br>
        <p>If you don't have a login, please <a href="register.php">register</a></p>
        <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
        <p>You are currently logged <?php echo $logged ?>.</p>
    </div>
    </body>
</html>
