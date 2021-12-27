<?php
require "header.php";
?>

<head>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="shortcut icon" type="image/png" href="obrazky/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b893199397.js" crossorigin="anonymous"></script>

    <?php
    if (isset($_GET["error"]) && $_GET["error"] == "wrongpwd") {
        $alert = "Nesprávné heslo!";
        echo "<script type='text/javascript'>alert('$alert');</script>";
    }

    ?>

</head>


<body>
    <div id="stocks">
        <div class="stockDiv"><p>Stock</p></div>
        <div class="stockDiv"><p>Stock</p></div>
        <div class="stockDiv"><p>Stock</p></div>
        <div class="stockDiv"><p>Stock</p></div>
        <div class="stockDiv"><p>Stock</p></div>
    </div>


    <div id="content">
        <?php

        if (isset($_SESSION['userId'])) {

            echo '<div id="pridaniPrispevku">
                  <h3 id="pridejsvujnapad">Co se vám honí hlavou?</h3><a href="addpost.php"><button class="btn btn-success" id="tlacitkopridani">Přidat Příspěvek</button></a>
                  </div>';
        } else {
            echo '<div id="pridaniPrispevku">
                  <h3 id="info-warning">Pro přidání příspěvku se musíte nejdříve přihlásit nebo <a href="signup.php">zaregistrovat</a>.</h3>
                  </div>';
        }

        $mysqli = new mysqli('localhost', 'root', '', 'lamebook_database');
        $sql = "SELECT idPosts, date, user, topic, postText, likes FROM posty";
        if ($stmt = $mysqli->prepare($sql)) {
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $date, $user, $topic, $text, $likes);
                    while ($row = $stmt->fetch()) {

                        echo '<div class="prispevek">';

                        if (isset($_SESSION['userId'])) {
                            echo '
                            <div class="vote-button">
                            <form action="includes/addlike.inc.php" method="post"><button type="submit" value=' . $id . ' name="addlike"><i class="fas fa-thumbs-up like"></i> </button> </form> <h3>' . $likes . '</h3>
                            <form action="includes/adddislike.inc.php" method="post"> <button type="submit" value=' . $id . ' name="adddislike"> <i class="fas fa-thumbs-down dislike"></i> </button> </form>
                            </div>  ';
                        }

                        echo '<div class="content">';
                        if (isset($_SESSION['userUId'])) {
                            if ($user == $_SESSION['userUId']) {
                                echo '
                                <div id="formystlacitkama">
                                <form method="post" action="changepost.php" id="formsbuttonama1">
                                <button type="submit" name="zmenitPost" value=' . $id . ' class="btn btn-warning btn-sm" id="meniciTlacitko">Změnit</button>
                                </form>
                                
                                <form method="post" id="formsbuttonama2">
                                <button type="submit" name="odstranitPost" value=' . $id . ' class="btn btn-danger btn-sm" id="odstranovaciTlacitko">Odstranit příspěvek</button>
                                </form>
                                </div>  
                                ';
                            }
                        }
                        echo '<h3 class="jmenouzivatele">' . $topic . '</h3>
                                <p class="textuzivatele">' . $text . '</p>          
                                <h3 class="datum">Přidáno: ' . $date . '</h3>
                                <h3 class="autor">Autor: ' . $user . '</h3>
                                </div>
                                </div>';
                    }
                }
            }
        } else {
            echo $mysqli->error;
        }

        if (isset($_POST['odstranitPost'])) {
            $sql = "DELETE FROM posty WHERE idPosts =" . $_POST['odstranitPost'] . " ";
            $res = $mysqli->query($sql);
            $page = $_SERVER['PHP_SELF'];
            echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
        }

        ?>
    </div>

    <script>
        
    </script>
</body>

<?php
require "footer.php";
?>