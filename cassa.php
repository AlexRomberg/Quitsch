<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quietscheentenshop</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#ff3e00">
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
    <?php
        session_start();

        session_unset();
        session_destroy();

        if (!isset($_SESSION['values'])) {
            $_SESSION['values'] = array('red' => 0, 'blue'=> 0, 'yellow'=> 0, 'silver'=> 0, 'gold' => 0);
        }

        function countItems() {
            $count = 0;
            foreach ($_SESSION['values'] as $value) {
                $count += $value;
            }
            return $count;
        }
    ?>
    <header href="index.php">
        <h1>Quietscheentenshop</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li style="float:right"><a href="cart.php">Einkaufswagen <i><?php echo(countItems()); ?></i></a></li>
        </ul>
    </nav>
    <main>
        <h1 style="margin-top: 50px;">Vielend Dank für den Einkauf!</h1>
    </main>
    <footer>©Alexander Romberg</footer>
</body>

</html>