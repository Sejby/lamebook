<?php

    if(isset($_POST["riplike"]) == true){
        header("Location: ../index.php?error=likecannotbeadded");
        exit();
    }

?>