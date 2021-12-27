<?php

if (isset($_POST['addlike'])) {
        require 'dbh.inc.php';
        $id = $_POST["addlike"];
        $selectQuery = mysqli_query($conn, "SELECT likes FROM posty WHERE idPosts = ". $id ." ");
        if (!$selectQuery) {
                echo 'Could not run query: ';
                exit;
        }

        $likes = $selectQuery->fetch_array()[0] ?? '';
        $likes++;
        echo $likes;

        $updateQuery = mysqli_query($conn, "UPDATE posty SET likes = $likes where idPosts = ". $id ." ");
        if (!$updateQuery) {
                echo 'Could not run update: ';
                exit;
        }

        mysqli_close($conn);

        header("Location: ../index.php?=likeadded");
        exit();
}

?>
