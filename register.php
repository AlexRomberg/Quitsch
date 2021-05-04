<!DOCTYPE html>
<html lang="de">

<head>
    <title>Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/register.css" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />


</head>
<form action="action_page.php">
    <div class="container">
        <h1>Register</h1>
        <p>Bitte ausfüllen um ein Account zu erstellen</p>
        <hr>

        <label for="Username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
        <hr>


        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
</form>

