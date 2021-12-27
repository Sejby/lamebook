<?php

if (isset($_POST['adddislike'])) {
        require 'dbh.inc.php';
        $id = $_POST["adddislike"];
        $selectQuery = mysqli_query($conn, "SELECT likes FROM posty WHERE idPosts = ". $id ." ");
        if (!$selectQuery) {
                echo 'Could not run query: ';
                exit;
        }

        $dislikes = $selectQuery->fetch_array()[0] ?? '';
        $dislikes--;
        echo $dislikes;

        $updateQuery = mysqli_query($conn, "UPDATE posty SET likes = $dislikes where idPosts = ". $id ." ");
        if (!$updateQuery) {
                echo 'Could not run update: ';
                exit;
        }

        mysqli_close($conn);

        header("Location: ../index.php?=dislikeadded");
        exit();
}

?>
