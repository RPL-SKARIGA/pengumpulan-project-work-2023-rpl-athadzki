<?php
require "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST["email"];

$query_sql = "INSERT INTO User (username, password, email) VALUES ('$username','$password','$email')";

if (mysqli_query($conn, $query_sql)) {
    echo "<script type='text/javascript'>
                    window.location='../index.php';
                </script>";
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);
}
?>

