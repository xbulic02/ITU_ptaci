<?php
    session_save_path("tmp/");
    session_start();
    session_destroy();
    header('Location: index.php');
    exit;
?>