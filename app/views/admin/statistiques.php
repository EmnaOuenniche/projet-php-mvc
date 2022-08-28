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

<div class="container pt-5 pb-5">
    <div class="row pt-5 pb-5">
        <div class="col-sm-12" style="text-align:center;">
            <div class="row" style="text-align:center;">
                <div class="col-sm-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            Totale article : <br>
                            <?=$data['stats']['articles']?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            Totale commentaire : <br>
                            <?=$data['stats']['comments']?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            Totale utilisateurs : <br>
                            <?=$data['stats']['users']?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            Totale notes : <br>
                            <?=$data['stats']['notes']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=$GLOBALS['BASE_URL']?>/assets/js/bootstrap.min.js"></script>
</body>
</html>