<? header("Content-Type: text/html; charset=UTF-8");?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>

<head>
    <title> Výukový program ptactva ČR </title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="application/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="application/javascript" src="js/valid_input.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">


</head>


<body>
    <div id="app">


        <div id="register">
            <form id="register_form">
                <div class="form-group required">
                    <label class="control-label" for="login">Uživatelské jméno</label>
                    <input id="login" class="form-control" name="login" type="text" placeholder="Uživatelské jméno">
                </div>

                <div class="form-group required">
                    <label class="control-label" for="name">Jméno Příjmení</label>
                    <input id="name" class="form-control" name="name" type="text" placeholder="Jméno Příjmení">
                </div>

                <div class="form-group required">
                    <label class="control-label" for="email">Emailová adresa</label>
                    <input id="email" class="form-control" name="email" type="text" placeholder="Emailová adresa">
                </div>

                <div class="form-group required">
                    <label class="control-label" for="password">Heslo</label>
                    <input id="password" class="form-control" name="password" type="password" placeholder="Heslo">
                </div>

                <div class="form-group required">
                    <label class="control-label" for="password_again">Potvrdit heslo</label>
                    <input id="password_again" class="form-control" name="password_again" type="password" placeholder="Heslo (znovu)">
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <input class="btn btn-primary" id="submit" name="submit" type="button" value="Zaregistrovat" >
                    </div>

                    <div class="col-md-4">
                        <span id="status_message"></span>
                    </div>

                </div>

            </form>


        </div>




    </div>

</body>

</html>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            var required = ['login', 'name', 'email', 'password', 'password_again'];
            $('#status_message').html("");
            set_white(required);
            var all_ok = true;

            // Required fields check
            if (!check_required(required)){
                $('#status_message').html("Vyplňte povinné pole");
                all_ok = false
            }

            // valid username check
            if (all_ok){
                if (!is_valid_login($('#login').val())){
                    all_ok = false;
                    $('#login').css('background-color', '#f47070');
                    $('#status_message').html("Nesprávný formát uživatelského jména. Délka: min: 4, max 30 znaků, povolené znaky: a-z,A-Z,0-9,-,_ ");
                }
            }

            // Password uniformity check
            if (all_ok) {
                if ($('#password').val() !== $('#password_again').val()) {
                    all_ok = false;
                    $('#password').css('background-color', '#f47070');
                    $('#password_again').css('background-color', '#f47070');
                    $('#status_message').html("Zadaná hesla se neshodují");
                }
            }

            // Password length check
            if (all_ok){
                if ($('#password').val().length < 6){
                    all_ok = false;
                    $('#password').css('background-color', '#f47070');
                    $('#status_message').html("Heslo musí být dlouhé minimálně 6 znaků");
                }
            }

            // Maximum input characters check (30)
            if (all_ok) {
                var _30_chars = ['login', 'password'];
                if (!max_char_check(30,_30_chars)){
                    all_ok = false;
                    $('#status_message').html("Překročen znakový limit (30)");
                }
            }

            // Maximum input characters check (60)
            if (all_ok) {
                var _60_chars = ['name'];
                if (!max_char_check(60,_60_chars)){
                    all_ok = false;
                    $('#status_message').html("Překročen znakový limit (60)");
                }
            }

            // Email validation
            if (all_ok){
                if ($('#email').val().length > 50){
                    all_ok = false;
                    $('#email').css('background-color', '#f47070');
                    $('#status_message').html("Překročen znakový limit (50)");
                }
                if (!is_valid_email($('#email').val())){
                    all_ok = false;
                    $('#email').css('background-color', '#f47070');
                    $('#status_message').html("Neplatná emailová adresa");
                }
            }


            if (all_ok) {
                var form_data = $('#register_form').serialize();
                $.ajax({
                    url: "register_script.php",
                    method: "POST",
                    data: form_data,
                    success: function (data) {
                        if(data === "EOK") {
                            $("#register_form").trigger('reset');
                            $('#status_message').html("Účet vytvořen, <a href=\"index.php\">přejít k přihlášení</a>");


                        }else {
                            $('#status_message').html(data);
                        }

                    },
                    error: function (data) {
                        $('#status_message').html(data);
                    }
                });
            }
        });
    });

</script>