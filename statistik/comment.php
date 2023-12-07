<?php

session_start();
require_once('../crud.php');

$match_id = $_POST['match_id'];
$user_id = $_SESSION['id'];
$desc = $_POST['comment'];
$date = date('Y-m-d');

$result = tambahKomentar($desc, $match_id, $user_id, $date);

if($result){
    echo "<script>alert('Berhasil Kirim Komen!'); history.back();</script>";
}else{
    echo "<script>alert('Gagal Kirim Komen!'); history.back();</script>";
}