<?php

require_once('../../../crud.php');

$id = $_POST['id'];
$name = $_POST['name'];
$tim_id = $_POST['tim_id'];

$pemain = cariPemain($id);
if ($pemain != null){
    $tim_id_old = $pemain['tim_id'];
    $hasil = editPemain($id, $tim_id, $name);
    if ($hasil){
        if ($tim_id_old != $tim_id){
            tambahHistory($id, $tim_id, $tim_id_old);
        }
        header('Location: ../?tim_id='.$tim_id);
    }
    else {
        header('Location: ../?tim_id='.$tim_id);
    }
}else{
    header('Location: ../?tim_id='.$tim_id);
}