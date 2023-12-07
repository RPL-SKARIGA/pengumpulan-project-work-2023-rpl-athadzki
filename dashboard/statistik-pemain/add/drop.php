<?php

require_once('../../../crud.php');

$id = $_GET['id'];
$match_id = $_GET['match_id'];

$hasil = hapusStatistikPemain($match_id, $id);

if($hasil){
    if(isset($_SERVER["HTTP_REFERER"])){
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
    }
}else{
    echo "<script type='text/javascript'>alert('Pemain Gagal Dihapus Dari Pertandingan');history.back();</script>";
    if(isset($_SERVER["HTTP_REFERER"])){
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
    }
}

?>