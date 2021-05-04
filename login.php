
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Vertical form</h2>
        <form role="form" action="login.php?login=true">
            <div class="form-group">
                <label for="usr_name">Username:</label>
                <input type="text" class="form-control" name = "username" id="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" name="login" class="btn btn-default">Login</button>
            <a href="index.php" class="btn btn-default">Go back</a>
        </form>
    </div>

</body>
<html>

<?php
require ("DB/Database.php");
$db = new DB();
if(isset($_POST['register'])){
    $db -> validateUser($_POST['username'], $_POST['psw']);
}
?>