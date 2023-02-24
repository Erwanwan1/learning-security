<?php
require_once 'vendor/autoload.php';
require_once('functions.php');

use ZxcvbnPhp\Zxcvbn;

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {

    $zxcvbn = new Zxcvbn();
    $result = $zxcvbn->passwordStrength($_POST['password']);

    if ($result['score'] >= 3) {
        $result = saveUser(htmlentities($_POST['username']), htmlentities($_POST['email']), htmlentities($_POST['password']));
        if($result === true) {
            header('Location: index.php');
        } else {
            echo "Une erreur est survenue " . $result;
        }
    }
    else {
        $passwordStrenght = "Mot de passe trop faible";
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma super app sécurisée - Inscription</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Inscription</h1>
    <form action="/register.php" method="post" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" class="form-control" id="username" name="username" required>
            <div class="invalid-feedback">
                S'il vous plaît entrez un nom d'utilisateur.
            </div>
        </div>
        <div class="form-group">
            <label for="email">Adresse email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">
                S'il vous plaît entrez une adresse email valide.
            </div>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" onkeyup="" required>
            <div>
                <label>Force du mot de passe :</label>
                <progress id="password_strength" value="0" max="4"></progress>
                <span><?php if (isset($passwordStrenght)) {echo $passwordStrenght;} ?></span>
            </div>
            <div class="invalid-feedback">
                S'il vous plaît entrez un mot de passe.
            </div>
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirmez le mot de passe :</label>
            <input type="password" class="form-control" id="password-confirm" name="password-confirm" required>
            <div class="invalid-feedback">
                S'il vous plaît confirmez votre mot de passe.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
    <script type="text/javascript" src="zxcvbn.js"></script>
    <script>
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("password-confirm");
        var password_strength = document.getElementById("password_strength");

        function validatePassword(){
            console.log('here');
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
                return false;
            } else {
                confirm_password.setCustomValidity('');
                return true;
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function computePasswordStrenght(){
            var result = zxcvbn(password.value);

            if (result.score < 3) {
                password_strength.style.background = "red";
            } else if (result.score === 3) {
                password_strength.style.background = "orange";
            } else if (result.score > 3) {
                password_strength.style.background = "green";
            }
            password_strength.value = result.score;
        }

        password.onkeyup = computePasswordStrenght;
    </script>
</div>
</body>
</html>