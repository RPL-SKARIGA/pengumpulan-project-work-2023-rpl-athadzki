<?php
require_once('../../crud.php');

$id = $_GET['id'];

if(hapusTim($id)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "<script>alert('Failed To Drop Pemain!'); history.back()</script>";
}
