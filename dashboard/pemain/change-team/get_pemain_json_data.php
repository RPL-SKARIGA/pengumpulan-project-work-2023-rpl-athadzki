<?php
require_once('../../../crud.php');
$id = $_POST['id'];
$pemain = cariPemainByTimId($id);
header('Content-Type: application/json');
echo json_encode($pemain);
