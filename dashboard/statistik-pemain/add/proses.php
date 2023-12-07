<?php

require_once('../../../crud.php');

$match_id = $_POST['match_id'];
$id = $_POST['id'];
$gol = $_POST['gol'];
$assist = $_POST['assist'];
$tackle = $_POST['tackle'];
$kunci = $_POST['kunci'];
$rating = $_POST['rating'];
$merah = $_POST['merah'];
$kuning = $_POST['kuning'];

$cari = cariPemainBertanding($id, $match_id);
if($cari == null){
    $hasil = tambahStatistikPemain($match_id, $id, $gol, $assist, $tackle, $kunci, $rating, $merah, $kuning);
    if ($hasil) {
        echo 'true';
    }else{
        echo 'false';
    }
}else{
    echo 'false';
}