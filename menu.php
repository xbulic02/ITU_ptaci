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
    <script type="application/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="application/javascript" src="js/valid_input.js"></script>
    <style type="text/css">
        tbody{
            width: 100%;
            height: 100%;
        }
        tr{
            width: 100%;
            height: 10%;
        }
        #list_container{
            width: 75%;
            height: 100%;
            position: relative;
        }
        .diff {
            width: 100%;
            height: 100%;
            text-align: center;
            font-size: 1.1vw;
            left: 15%;
            position: relative;
            padding: 0;
        }

        .diff li {
            margin:0 5% 0 0;
            width:25%;
            height:50%;
            position:relative;
            -moz-box-shadow: inset 0px 1px 0px 0px #666666;
            -webkit-box-shadow: inset 0px 1px 0px 0px #666666;
            box-shadow: inset 0px 1px 0px 0px #666666;
            background-color: #7d7d7d;
            border: 1px solid #b3b3b3;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-weight: bold;
            text-decoration: none;
        }

        .diff label, .diff input {
            display:block;
            position:absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
        }

        .diff input[type="radio"] {
            opacity:0.011;
            z-index:100;
        }

        .diff input[type="radio"]:checked + label {
            background-color:#555555;
        }

        .diff label {
            /*border:1px solid #CCC;*/
            cursor:pointer;
            z-index:90;
            padding-top: 10%;
        }

        .diff label:hover {
            background-color:#666666;;
        }
    </style>


</head>


<body>
<div id="app">


    <div id="menu">
        <table id="buttons" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <a href="game.php" class="button">Nová hra</a>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="list_container">
                        <ul class="diff">
                            <li>
                                <input type="radio" id="easy" name="difficulty" checked />
                                <label for="easy">Lehká</label>
                            </li>
                            <li>
                                <input type="radio" id="medium" name="difficulty" />
                                <label for="medium">Střední</label>
                            </li>
                            <li>
                                <input type="radio" id="hard" name="difficulty" />
                                <label for="hard">Těžká</label>
                            </li>
                        </ul>
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    <a class="button" href="encyclopedia.php">Encyklopedie</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="button" href="high_scores.php">Tabulka výsledků</a>
                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="button" href="info.php">Info</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="button" href="logout.php">Odhlásit</a>
                </td>
            </tr>


        </table>


    </div>




</div>

</body>

</html>