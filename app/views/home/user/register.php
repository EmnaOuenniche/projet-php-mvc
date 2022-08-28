<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="<?=$GLOBALS['BASE_URL']?>/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once('app/views/includes/main-navbar.php'); ?>

<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-12 d-flex justify-content-center text-center">
            <form action="" method="POST">

                <span>Inscription</span><br><br>
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Nom complet" required>
                </div><br>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                </div><br>
                <div class="form-group">
                    <input name="pass" type="password" class="form-control" placeholder="Mot de passe" required>
                </div><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="a" checked required>
                    <label class="form-check-label">
                        Lecteur
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="b" required>
                    <label class="form-check-label">
                        Auteur
                    </label>
                </div>
                <br><br>

                
                <input type="submit" class="btn btn-primary" value="Inscription"/>
            </form>
        </div>
    </div>
</div>


<script src="<?=$GLOBALS['BASE_URL']?>/assets/js/bootstrap.min.js"></script>
</body>
</html>