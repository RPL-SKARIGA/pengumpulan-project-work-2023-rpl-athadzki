<?php

require_once('../../../crud.php');

$home_tim = $_POST['home_tim'];
$home_score = $_POST['home_score'];
$away_tim = $_POST['away_tim'];
$away_score = $_POST['away_score'];
$match_date = $_POST['match_date'];
$liga_id = $_POST['liga_id'];

$tambahPertandingan = tambahPertandingan($liga_id, $match_date, $home_tim, $home_score, $away_tim, $away_score);

if($tambahPertandingan){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

echo "Gagal Tambah";