<?php

require_once('../../../crud.php');

$id = $_POST['match_id'];
$tim_home = $_POST['home_tim'];
$tim_away = $_POST['away_tim'];
$score_home = $_POST['home_score'];
$score_away = $_POST['away_score'];
$match_date = $_POST['match_date'];

$hasil= editPertandingan($id, $match_date, $tim_home, $score_home, $tim_away, $score_away);
if ($hasil){
    header('Location: /FOOTYSTATS/dashboard/pertandingan');
}
else {
    header('Location: /FOOTYSTATS/dashboard/pertandingan');
}