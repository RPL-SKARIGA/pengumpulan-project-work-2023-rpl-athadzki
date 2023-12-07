<?php
require_once('../../../crud.php');

$name = $_POST['name'];
$tim_id = $_POST['tim_id'];

$target_dir = "../../../image/pemain/";
$target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(tambahPemain($tim_id, $name)){
    if(isset($_POST["submit"])) {
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["fileInput"]["name"]));
        $check = copy($_FILES["fileInput"]["tmp_name"], $target_dir . $name . ".png");
        if($check !== false) {
            header('Location: ../');
        } else {
            echo "<script>alert('Failed To Add Pemain!'); history.back()</script>";
        }
    }else{
        echo "<script>alert('Failed To Add Pemain!'); history.back()</script>";
    }
}else{
    echo "<script>alert('Failed To Add Pemain!'); history.back()</script>";
}
