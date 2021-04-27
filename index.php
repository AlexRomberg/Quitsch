<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quietscheentenshop</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
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
        if (!isset($_SESSION['values'])) {
            $_SESSION['values'] = array("red" => 0, "blue"=> 0, "yellow"=> 0, "silver"=> 0, "gold" => 0);
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
            <li class="active"><a>Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li style="float:right"><a href="cart.php">Einkaufswagen <i><?php echo(countItems()); ?></i></a></li>
        </ul>
    </nav>
    <main>
        <div>
            <svg width="25%" viewBox="0 0 2000 2000" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                <g class="duck">
                    <g transform="matrix(1.13086,-0.127655,0.127655,1.13086,-344.695,450.234)">
                        <ellipse cx="636.595" cy="395.172" rx="115.629" ry="67.344" style="fill:rgb(255,134,0);" />
                    </g>
                    <g transform="matrix(1.13804,0,0,1.13804,-102.16,-200.219)">
                        <path d="M610.824,1024.12C513.593,1003.39 440.945,921.898 440.945,824.651C440.945,711.743 538.875,620.076 659.497,620.076C780.119,620.076 878.048,711.743 878.048,824.651C878.048,840.717 876.065,856.354 872.313,871.371C933.847,855.197 1001.47,846.252 1072.43,846.252C1357.15,846.252 1588.31,990.299 1588.31,1167.73C1588.31,1345.15 1357.15,1489.2 1072.43,1489.2C787.703,1489.2 556.544,1345.15 556.544,1167.73C556.544,1116.13 576.092,1067.36 610.824,1024.12Z" style="fill: #FF3E00;" />
                    </g>
                    <g transform="matrix(0.808395,0.0596169,-0.0633469,0.858972,335.206,102.888)">
                        <ellipse cx="988.564" cy="1080.05" rx="480.305" ry="243.964" style="fill-opacity:0.13;" />
                    </g>
                    <g transform="matrix(1.13804,0,0,1.13804,-102.16,-200.219)">
                        <ellipse cx="580.686" cy="794.79" rx="24.142" ry="29.86" style="fill:rgb(19,10,0);" />
                    </g>
                </g>
            </svg>
            <h1>Herzlich willkommen im Quietscheentenshop</h1>
            <a>Anmelden</a>
            <br>
            <a href="login.php">Noch kein Account? Hier kannst du dich regisrieren</a>
        </div>
    </main>
    <footer>©Alexander Romberg</footer>
</body>

</html>