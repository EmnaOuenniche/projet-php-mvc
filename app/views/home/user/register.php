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
                    <input name="name" type="text" class="form-control" placeholder="Nom complet">
                </div><br>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                </div><br>
                <div class="form-group">
                    <input name="pass" type="password" class="form-control" placeholder="Mot de passe"><a href="#">Afficher/cacher le mot de passe</a>
                </div><br>
                
                <input type="submit" class="btn btn-primary" value="connexion"/>
            </form>
        </div>
    </div>
</div>


<script src="<?=$GLOBALS['BASE_URL']?>/assets/js/bootstrap.min.js"></script>
</body>
</html>