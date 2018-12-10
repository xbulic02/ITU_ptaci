<? header("Content-Type: text/html; charset=UTF-8");?>
<?php
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
        #name{
            color: white;
            background-color: rgba(22,22,22,0.5);
            position: relative;
            top: 70%;
            height: 10%;
            width: 100%;
            padding: 1%;
            text-align: center;
            font-size: 3vw;
        }
        #desc{
            color: white;
            background-color: rgba(22,22,22,0.5);
            position: relative;
            top: 70%;
            height: 20%;
            width: 100%;
            padding: 1%;
            font-size: 1.5vw;
        }
        #prev{
            position: absolute;
            background-image: url("prev.png");
            background-size: cover;
            display: block;
            /* margin: 2%; */
            text-indent: -9999px;
            top: 0;
            height: 95%;
            width: 20%;
        }
        #next{
            position: absolute;
            background-image: url("next.png");
            background-size: cover;
            display: block;
            /* margin: 2%; */
            text-indent: -9999px;
            right: 0;
            z-index: 5;
            height: 90%;
            width: 15%;
            top: 0;
        }
    </style>


</head>


<body>
<?php
    $file = file_get_contents("img/atlas.json");
    $bird_arr = json_decode($file, true);
    $image_url = $bird_arr[$_GET['id']]['img'];
?>
<div id="app" style="background-image: <?php echo "url('img/{$image_url}')"?>">
    <a href="encyclopedia.php" id="to-menu">enc</a>
    <div id="name">
        <?php
        if ($_GET['id'] != 0){
            $prev = $_GET['id'] - 1;
            echo "<a href=\"bird.php?id={$prev}\" id=\"prev\">prev</a>";
        }
        echo $bird_arr[$_GET['id']]['name'];
        if ($_GET['id'] != count($bird_arr)-1){
            $next = $_GET['id'] + 1;
            echo "<a href=\"bird.php?id={$next}\" id=\"next\">next</a>";
        }?>
    </div>
    <div id="desc"><?php echo $bird_arr[$_GET['id']]['desc']?></div>





</div>

</body>

</html>