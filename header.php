<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>EZstonks</title>
</head>

<body>
    <header>
        <a href="index.php">
            <h1 id="logo">ezstonks</h1>
        </a>

        <div class="form-inline">
            <?php
            if (isset($_SESSION['userId'])) {
                echo '
                </form>
                <form action="profile.php" method="post">
                <h3 id="jmenousera">Uživatel: ' . $_SESSION['userUId'] . '</h3>
                <button type="submit" class="btn btn-light" id="nastaveni-button" name="nastaveni">Nastavení</button>
                </form>
                
                <form action="includes/logout.inc.php" method="post">
                <button type="submit" class="btn btn-danger" name="logout-submit">Odhlásit</button>
                </form>';
                
            } else {
                echo '
                        <form action="includes/login.inc.php" method="post">
                        <input type="text" class="form-control" name="mailuid" placeholder="Uživatelské jméno">
                        <input type="password" class="form-control" name="pwd" placeholder="Heslo">
                        <button type="submit" class="btn btn-dark" id="login-button" name="login-submit">Přihlásit</button>
                        </form>
                        <form action="signup.php">
                        <button type="submit" class="btn btn-light" id="registr-button">Registrovat</button>
                        </form>';
            }
            ?>
        </div>
    </header>
</body>

</html>