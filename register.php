<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js?newversion"></script>
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
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

    <body><div class= "centered">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        
        <h1>Registeration</h1>

        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>   
        <ul>
            <li>Employee IDs must be valid</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>         
        <form method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">

            Employee ID:<br> <input class="form-control" type="text" name="emp_id" id="emp_id" /><br>
            Password:<br> <input type="password" class="form-control"  name="password" id="password"/><br>
            Confirm password:<br> <input class="form-control" type="password" name="confirmpwd" id="confirmpwd" /><br>
            <input type="button" 
                    class="btn btn-primary"
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.emp_id,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <br>
        <p>Return to the <a href="index.php">login page</a>.</p>
        </div>
    </body>
</html>
