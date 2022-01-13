<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ezstonks";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}