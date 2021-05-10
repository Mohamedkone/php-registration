<?php 

require 'base.php'

$firstname = $lastname = $email = $username = $password = $passwordConf = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    if (empty($_POST['firstname'])) {
        $firstname_error = "First name required"
    }else{
        $firstname = verifications($_POST['firstname']);
    }
    if (empty($_POST['lastname'])) {
        $lastname_error = "Last name required"
    }else{
        $lastname = verifications($_POST['lastname']);
    }
    if (empty($_POST['email'])) {
        $email_error = "Email required"
    }else{
        $email = verifications($_POST['email']);
    }
    if (empty($_POST['username'])) {
        $username_error = "username required"
    }else{
        $username = verifications($_POST['username']);
    }
    if (empty($_POST['password'])) {
        $password_error = "password required"
    }else{
        $password = verifications($_POST['password']);
    }
    if (empty($_POST['passwordConf'])) {
        $passwordConf_error = "Password confirmation required"
    }else{
        $passwordConf = verifications($_POST['passwordConf']);
    }
 

}


function verifications($infos){
    $infos = trim($infos);
    $infos = stripslashes($infos);
    $infos = htmlspecialchars($infos)
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
                    <input type="text" name="firstname" value="">
                </div>
                <div class="b b2">
                    <label for="Lastname">Last Name</label>
                    <input type="text" name="lastname" value="">
                </div>
            </div>
            <div class="b b3">
                <label for="Email">Email</label>
                <input type="email" name="email" value="">
            </div>
            <div class="b b4">
                <label for="Username">Username</label>
                <input type="text" name="username" value="">
            </div>
            <div class="passwords">
                <div class="b b5">
                    <label for="Password">Password</label>
                    <input type="password" name="password" value="">
                </div>
                <div class="b b6">
                    <label for="PasswordConf">Confirm Password</label>
                    <input type="password" name="passwordConf" value="">
                </div>
            </div>
            <div class="terms">
                <input type="checkbox" name="terms">
                <p>I accept the <a href="">Terms of Use</a> & <a href="">Policy</a></p>
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