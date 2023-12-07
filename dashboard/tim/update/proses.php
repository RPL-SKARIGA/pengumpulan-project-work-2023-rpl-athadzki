<?php

require_once('../../../crud.php');

$id = $_POST['id'];
$name = $_POST['name'];
$tim_id = $_POST['tim_id'];

$hasil= editPemain($id, $tim_id, $name);
if ($hasil){
    header('Location: ../?tim_id='.$tim_id);
}
else {
    header('Location: ../?tim_id='.$tim_id);
}