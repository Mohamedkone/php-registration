<?php 
//Need base.php to connect to the database.
require 'base.php';

//Set the variables and intialize them to empty strings.
$firstname = $lastname = $email = $username = $password = $passwordConf = $terms = 
$firstname_error = $lastname_error = $email_error = $username_error 
= $password_error = $passwordConf_error = $terms_error = $checked = "";

/*verify the information sent by the users via the form. Save all the informations
if they are corrects in variables and if any information is not correct will send
error messages*/
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    if (empty($_POST['firstname'])) {
        $firstname_error = "First name required";
    }else{
        $firstname = verifications($_POST['firstname']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
            $firstname_error = "Letters and space only";
        }
    }
    if (empty($_POST['lastname'])) {
        $lastname_error = "Last name required";
    }else{
        $lastname = verifications($_POST['lastname']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
            $lastname_error = "Letters and space only";
        }
    }
    if (empty($_POST['email'])) {
        $email_error = "Email required";
    }else{
        $email = verifications($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "This email is not valid";
        }
    }
    if (empty($_POST['username'])) {
        $username_error = "Username required";
    }else{
        $username = verifications($_POST['username']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            $username_error = "Letters and space only";
        }
    }
    if (empty($_POST['password'])) {
        $password_error = "Password required";
    }else{
        $password = verifications($_POST['password']);
        if (strlen($password) < 6 ) {
            $password_error = "Password should be over 6 characters";
        };
    }
    if (empty($_POST['passwordConf'])) {
        $passwordConf_error = "Password confirmation required";
    }else{
        $passwordConf = verifications($_POST['passwordConf']);
        if (!preg_match("/$password/", $passwordConf)){
            $passwordConf_error = "Password doesn't match";
        }
    }

    if (isset($_POST['terms'])){
        $checked = "checked";
    }
    else{
        $checked = "";
        $terms_error = "Please check the box";
    }
}

// Verify user input to protect against html injections
function verifications($infos){
    $infos = trim($infos);
    $infos = stripslashes($infos);
    $infos = htmlspecialchars($infos);
    return $infos; 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Registration Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="container">
            <div class="f-title">
                <h1>Registration <span>form</span>.</h1>
            </div>
            <div class="name">
                <div class="b b1">
                    <label for="Firstname">First Name</label>
                    <input type="text" name="firstname" value="<?php echo $firstname ; ?>">
                    <span class="error"><?php echo $firstname_error ?></span>
                </div>
                <div class="b b2">
                    <label for="Lastname">Last Name</label>
                    <input type="text" name="lastname" value="<?php echo $lastname ; ?>">
                    <span class="error"><?php echo $lastname_error ?></span>
                </div>
            </div>
            <div class="b b3">
                <label for="Email">Email</label>
                <input type="email" name="email" value="<?php echo $email ; ?>">
                <span class="error"><?php echo $email_error ?></span>
            </div>
            <div class="b b4">
                <label for="Username">Username</label>
                <input type="text" name="username" value="<?php echo $username ; ?>">
                <span class="error"><?php echo $username_error ?></span>
            </div>
            <div class="passwords">
                <div class="b b5">
                    <label for="Password">Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                    <span class="error"><?php echo $password_error ?></span>
                </div>
                <div class="b b6">
                    <label for="PasswordConf">Confirm Password</label>
                    <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>">
                    <span class="error"><?php echo $passwordConf_error ?></span>
                </div>
            </div>
            <div class="check">
                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" <?php echo $checked ?> >
                    <p>I accept the <a href="">Terms of Use</a> & <a href="">Policy</a></p>
                </div>
                <span class="error"><?php echo $terms_error ?></span>
            </div>
            <div class="buttons">
                <button class="btn" type="submit">Register</button>
            </div>
            <div class="other">
                <a href="">Already have an account?</a>
            </div>
        </div>
    </form>
</body>

</html>