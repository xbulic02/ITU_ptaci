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
                echo "<tr><th>Správná odpověď</th><th>Tvoje odpověď</th></tr>";
                foreach ($_GET as $question){
                    $ref = $question['reference'];
                    $answer = $question['answer'];

                    echo "<tr><td>$ref</td><td>$answer</td></tr>";
                }

            ?>
        </table>
        <div id='result'></div>
    </div>




</div>

</body>

</html>
<script>
    function update_score(score){
        $.ajax({
            url: "update_score.php",
            method: "POST",
            data: "score="+score,
            success: function (data) {
            }
        });
    }
    $(document).ready(function () {
        var correct = 0;
        var rows = $('#result_table').find('> tbody > tr');
        for (var i = 1; i < rows.length; i++){
            var cells = $(rows[i]).find('> td');
            if (cells[0].innerHTML === cells[1].innerHTML){
                $(rows[i]).addClass("correct");
                correct++;
            }else {
                $(rows[i]).addClass("incorrect");

            }
        }
        $('#result').html("Počet správných odpovědí: "+correct);
        update_score(correct);
    })
</script>