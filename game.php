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
    <script type="application/javascript" src="js/jquery.redirect.js"></script>
    <script type="text/javascript" src="img/atlas.json"></script>
    <style type="text/css">
        tbody{
            width: 100%;
            height: 100%;

        }
    </style>

</head>


<body>
<div id="app" style="background-image: none">
    <div id="answer-box">
        <table style="width: 100%; height: 100%; border: 0; table-layout: fixed;">
            <tr >
                <td>
                    <div class="button" id="button_0"></div>
                </td>
                <td>
                    <div class="button" id="button_1"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="button" id="button_2"></div>
                </td>
                <td>
                    <div class="button" id="button_3"></div>
                </td>
            </tr>

        </table>
    </div>


</div>

</body>

</html>

<script>


    $(document).ready(function() {
        var bird_list = load_json();
        var question_counter = 0;
        var answer_data = [];
        var previous = [];               // Birds that already appeared in test
        var question_data = new_question(bird_list, previous);


        $(".button").click(function () {
            var button = $(this).attr("id").slice(-1);
            console.log(button);
            answer_data.push({"reference" : bird_list[question_data.reference].name, "answer" : bird_list[question_data.buttons[button]].name});
            previous.push(question_data.reference);
            question_data = new_question(bird_list, previous);
            question_counter++;

            if(question_counter === 10){
                var query_string = serialize(answer_data);
                window.location.replace('end_game.php?'+query_string);
            }
        });


    });

    serialize = function(obj, prefix) {
        var str = [],
            p;
        for (p in obj) {
            if (obj.hasOwnProperty(p)) {
                var k = prefix ? prefix + "[" + p + "]" : p,
                    v = obj[p];
                str.push((v !== null && typeof v === "object") ?
                    serialize(v, k) :
                    encodeURIComponent(k) + "=" + encodeURIComponent(v));
            }
        }
        return str.join("&");
    }


    function new_question(bird_list, exclude) {
        console.log(JSON.stringify(bird_list.length));
        var new_ref = get_random_numbers(1,bird_list.length, exclude)[0];       // Get bird that will be guessed

        /* Assigning correct answer to a random button */
        var random_button_index = get_random_numbers(1,4,[])[0];
        console.log("correct answer is on button"+random_button_index);

        $('#button_'+random_button_index).html(bird_list[new_ref].name);
        $('#app').css("background-image", "url(" + bird_list[new_ref].img +  ")");


        var other_answers = get_random_numbers(4,bird_list.length, [new_ref]);

        /* Button filling */
        for (var i = 0; i < 4; i++){
            if (i !== random_button_index) {
                $('#button_' + i).html(bird_list[other_answers[i]].name);
            }
        }


        console.log(bird_list[new_ref].name);

        other_answers[random_button_index] = new_ref;
        
        for (var i = 0; i < other_answers.length; i++){
            console.log("answers: " + bird_list[other_answers[i]].name);
        }

        return {"reference" : new_ref, "buttons": other_answers};

    }


    function load_json(){
        return (function() {
            var json = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': "img/atlas.json",
                'dataType': "json",
                'success': function (data) {
                    json = data;
                }
            });
            return json;
        })();
    }

    function get_random_numbers(count,limit,exclude){

        var arr = [];
        while(arr.length < count){
            var r = Math.floor(Math.random()*limit);
            if(arr.indexOf(r) === -1 && exclude.indexOf(r) === -1) arr.push(r);
        }
        return arr;
    }
</script>