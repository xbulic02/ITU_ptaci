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


</head>


<body>
<div id="app">
    <a href="menu.php" id="back">Menu</a>

    <div id="result-box">
        <table id="result_table">
            <?php
            require_once 'db_init.php';
            echo "<tr><th>Jméno</th><th>Skóre</th></tr>";
            $db = get_db();
            $query = $db->query("SELECT * FROM user ORDER BY high_score DESC");


            for ($i = 0; $i<10; $i++){

                $row = $query->fetch_assoc();
                if ($row != null){
                    echo "<tr><td>{$row['name']}</td><td>{$row['high_score']}</td></tr>";
                } else{
                    echo "<tr><td></td><td></td></tr>";
                }
            }

            ?>
        </table>

    </div>




</div>

</body>

</html>