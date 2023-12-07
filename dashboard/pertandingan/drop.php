<?php
require_once('../../crud.php');
$id=$_GET['id'];
$hasil=HapusPertandingan($id);
if ($hasil){
    header('Location: /FOOTYSTATS/dashboard/pertandingan');
}
else {
    header('Location: /FOOTYSTATS/dashboard/pertandingan');
}