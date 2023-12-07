<?php
require_once('../../../crud.php');

$name = $_POST['name'];
$liga_id = $_POST['liga'];
$stadion = $_POST['stadion'];

$target_dir = "../../../image/tim/";
$target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(tambahTim($name, $liga_id, $stadion)){
    if(isset($_POST["submit"])) {
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["fileInput"]["name"]));
        $check = copy($_FILES["fileInput"]["tmp_name"], $target_dir . $name . ".png");
        if($check !== false) {
            header('Location: ../');
        } else {
            echo "<script>alert('Failed To Add Tim!'); history.back()</script>";
        }
    }else{
        echo "<script>alert('Failed To Add Tim!'); history.back()</script>";
    }
}else{
    echo "<script>alert('Failed To Add Tim!'); history.back()</script>";
}
