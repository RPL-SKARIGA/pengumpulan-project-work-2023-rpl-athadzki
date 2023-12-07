<?php

session_start();
require_once('../crud.php');

$id = $_GET['id'];

$result = hapusKomentar($id);

if($result){
    echo "<script>alert('Berhasil Hapus Komen!'); history.back();</script>";
}else{
    echo "<script>alert('Gagal Hapus Komen!'); history.back();</script>";
}