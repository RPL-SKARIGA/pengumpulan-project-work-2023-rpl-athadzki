<?php
    $server = "localhost";
    $database = "FootyStats";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($server, $user, $password, $database);

    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }else{
        echo "";
    }
    return $conn;
    ?>