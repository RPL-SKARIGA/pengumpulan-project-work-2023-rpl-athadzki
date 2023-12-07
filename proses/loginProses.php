<?php
require "koneksi.php";
session_start(); // Memulai sesi

$username = $_POST['username'];
$password = $_POST['password'];

$query_admin = "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'";
$result_admin = mysqli_query($conn, $query_admin);

$query_sql = "SELECT * FROM User WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query_sql);
$data = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result_admin) == 1){
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $data['id'];
    header("Location: ../dashboard/index.php");

}elseif (mysqli_num_rows($result) == 1) {
    // Login berhasil, simpan nama pengguna ke dalam sesi
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $data['id'];
    header("Location: ../"); // Redirect ke halaman index.php setelah login berhasil
    exit;
} else {
    // Login gagal, tampilkan pesan kesalahan
    echo "<center><h1>Password anda salah. Silahkan coba kembali</h1>
            <button><strong><a href='../user_login.php'>Login</a></strong></button></center>";
}
?>