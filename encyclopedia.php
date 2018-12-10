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
    <style type="text/css">
        #result_container{
            height:100%;
            width:100%;
            overflow: auto;
        }
        ::-webkit-scrollbar {
            width: 20px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #111111;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #222222;
        }

        .bird_record {
            width: 90%;
            height: 15%;
            border-radius: 5px;
            box-shadow: inset 0 0 5px grey;
            border: 1px solid #1d2124;
            padding: 0.5%;
            margin: 2% 0% 2% 0%;
            font-family: monospace;

        }

        .bird_thumb{
            position: relative;
            width: 30%;
            height: 95%;
            top: 2.5%;
            left: 0;
            background-size: cover;
        }
        .bird_record:hover {
            cursor: pointer;
            background-color: rgba(0,0,0,0.5);

        }
        .bird_name{
            position: relative;
            left: 50%;
            bottom: 65%;
            width: 50%;
            font-size: 2vw;
        }


    </style>


</head>


<body>
<div id="app">
    <a href="menu.php" id="to-menu">Menu</a>

    <div id="result-box">
        <div id="result_container">
            <?php
            $file = file_get_contents("img/atlas.json");
            $bird_arr = json_decode($file, true);

            $i = 0;
            foreach ($bird_arr as $bird_record){
                $style = "background-image: url(\"{$bird_record['img']}\");";
                echo "<div class='bird_record' onclick='bird_page({$i})' >";
                echo "<div class='bird_thumb' style='$style'></div>";
                echo "<div class='bird_name'> {$bird_record['name']} </div></div>";
                $i++;
            }




            ?>


        </div>
    </div>




</div>

</body>

</html>
<script type="application/javascript">
    function bird_page(id) {
        window.location.href = "bird.php?id="+id;

    }


</script>