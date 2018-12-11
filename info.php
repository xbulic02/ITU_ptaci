<? header("Content-Type: text/html; charset=UTF-8");?>
<?php
session_save_path("tmp/");
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>

<head>
    <title> Výukový program ptactva ČR </title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="application/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="application/javascript" src="js/valid_input.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        #result-box{
            width: 35%;
            height: 60%;
            left: 32.5%;
            padding: 2%;
        }
    </style>


</head>


<body>
<div id="app">
    <a href="menu.php" id="back">Menu</a>

    <div id="result-box">
       <p> Vytvořeno v rámci projektu do předmětu Tvorba Uživatelských
        rozhraní na Fakultě informačních technologií Vysokého učení technického v Brně
       </p>
        <p>
        Autoři: Vojtěch Čurda, Miroslav Bulička
        </p>
    </div>




</div>

</body>

</html>