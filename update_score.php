<?php
require_once 'db_init.php';
session_save_path("tmp/");
session_start();
$login = $_SESSION['login'];
/* Getting user score */
$db = get_db();
$query = $db->query("SELECT * FROM `user` WHERE login = '$login'");
if ($query->num_rows == 1){
    $row = $query->fetch_assoc();
    $score = $row['high_score'];
}else{
    echo null;
    exit(1);
}

/* Updating score */
if ($_POST['score'] > $score){
    $query = $db->query("UPDATE `user` SET high_score = '{$_POST['score']}' WHERE login = '$login'");
    if ($query !== null){
        echo "OK";
        exit(0);
    }
}