<?php

require_once('../../../crud.php');

$pemain = $_POST['pemain'];
$home_tim = $_POST['home_tim'];
$away_tim = $_POST['away_tim'];

echo $home_tim;
echo $away_tim;

foreach ($pemain as $id) {
    $pemain = cariPemain($id);
    if ($pemain != null){
        $nama = $pemain['nama'];
        $hasil = editPemain($id, $away_tim, $nama);
        if ($hasil){
            if ($away_tim != $home_tim){
                tambahHistory($id, $away_tim, $home_tim);
            }
            header('Location: ../');
        }
        else {
            header('Location: ../');
        }
    }else{
        header('Location: ../');
    }
}