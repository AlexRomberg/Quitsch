<?php
session_start();
if (isset($_GET["login"])) {
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('DB/database.php');
        }
    }
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    }

    $sql = 'SELECT * from USERS where USERNAME="' . $_POST["usr_name"] . '";';


    $ret = $db->query($sql);
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        $id = $row['ID'];
        $username = $row["USERNAME"];
        $password = $row['PASSWORD'];
    }
    if ($id != "") {
        if ($password == $_POST["pwd"]) {
            $_SESSION["login"] = $username;
            header('Location: index.php');
        } else {
            echo "Wrong Password";
        }
    } else {
        echo "User not exist, please register to continue!";
    }

    $db->close();
}

?>
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
                <input type="text" class="form-control" id="usr_name" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <a href="index.php" class="btn btn-default">Go back</a>
        </form>
    </div>

</body>
<html>