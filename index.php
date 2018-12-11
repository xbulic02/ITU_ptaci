<? header("Content-Type: text/html; charset=UTF-8");?>
<?php
    session_save_path("tmp/");
    session_start();
    if(isset($_SESSION['login'])){
        header("location: menu.php");
    }
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


        <div id="login-box">
            <form id="login_form">
                <div class="form-group">
                    <label class="control-label" for="login">Uživatelské jméno</label>
                    <input class="form-control" id="login" name="login" type="text" placeholder="Uživatelské jméno">
                </div>

                <div class="form-group">
                    <label class="control-label" for="password">Heslo</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Heslo">
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <input class="btn btn-primary" id="submit" name="submit" type="button" value="Přihlásit" >
                    </div>

                    <div class="col-md-4">
                        <span id="status_message"></span>
                    </div>

                    <div class="col-md-4">
                        <a href="register.php">Zaregistrovat</a>
                    </div>


                </div>

            </form>


        </div>




    </div>

</body>

</html>

<script>
    $("#password").keyup(function(event) {
        if (event.keyCode === 13) {
            $("#submit").click();
        }
    });

    $(document).ready(function() {
        $('#submit').click(function () {
            var form_data = $('#login_form').serialize();

            $.ajax({
                url: "login_script.php",
                method: "POST",
                data: form_data,
                success: function (data) {
                    if (data === "E_OK")
                        window.location.replace('menu.php');
                    else {
                        $('#status_message').html("Neplatné uživatelské jméno nebo heslo");
                    }
                },
                error: function (data) {
                    $('#status_message').html(data);
                }
            });
        });
    });

</script>