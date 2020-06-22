<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quietscheentenshop</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="style/cart.css" />
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
        $prices = array('red' => 6.95, 'blue'=> 6.95, 'yellow'=> 6.95, 'silver'=> 8.95, 'gold' => 11.95);
        $keyName = array('red' => 'Rot', 'blue'=> 'Blau', 'yellow'=> 'Gelb', 'silver'=> 'Silber', 'gold' => 'Gold');

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

        function drawElement($name, $quantity, $price, $key) {
            echo('<tr>
                <td class="First">Quietscheente '.$name.'</td>
                <td>'.$price.' CHF</td>
                <td>'.number_format($quantity, 0, '.', '\'').'</td>
                <td>'.number_format((float)($price * $quantity), 2, '.', '\'').' CHF</td>
                <td><input class="btn" type="submit" name="'.$key.'" value="&#xf1f8;"></td>
            </tr>');
        }

        function removeClicked()
        {
            foreach ($_GET as $key => $value) {
                if (key_exists($key, $_SESSION['values'])) {
                    echo('exists!');
                    $_SESSION['values'][$key] = 0;
                } elseif ($key == 'finish') {
                    header('Location: cassa.php');
                }
            }
        }

        removeClicked();
    ?>

    <header href="index.php">
        <h1>Quietscheentenshop</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li class="active" style="float:right"><a>Einkaufswagen <i><?php echo(countItems()); ?></i></a></li>
        </ul>
    </nav>
    <main>
        <h1>Ihr Einkaufswagen</h1>
        <div class="shoppinglist">
            <form action="cart.php">
                <table>
                    <tr>
                        <th class="First">Produkt</th>
                        <th class="">Preis</th>
                        <th class="">Menge</th>
                        <th class="">Total</th>
                        <th class="Last"></th>
                    </tr>
                    <?php
                        $total = 0;
                        foreach ($_SESSION['values'] as $key => $value) {
                            if ($value > 0) {
                                drawElement($keyName[$key],$value, $prices[$key],$key);
                                $total += ($prices[$key]*$value);
                            }
                        }
                        if ($total > 0) {
                            echo('<tr style="height: 64px;">
                                <td class="First">Total</td>
                                <td></td>
                                <td>'.number_format(countItems(), 0, '.', '\'').'</td>
                                <td>'.number_format((float)$total, 2, '.', '\'').' CHF</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5"><input name="finish" type="submit" value="Zur Kasse  &#xf061;" style="border: none;border-radius: 30px;font-size: 20px;padding: 10px 14px;margin: 10px;background-color: limegreen;font-family: FontAwesome;"></td>
                            </tr>');
                        } else {
                            echo('<tr>
                                <td colspan="5" style="height: 64px; text-align: center;">Nichts im Einkaufswagen!</td>
                            </tr>');
                        }

                    ?>
                </table>
            </form>
        </div>
    </main>
    <footer>©Alexander Romberg</footer>
</body>

</html>