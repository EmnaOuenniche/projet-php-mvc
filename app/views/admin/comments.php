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
            <div class="row">
                <!-- list filters form-->
                <div class="col">
                    <h1>Liste des commentaires</h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="text-align:center;"></h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">utilisateur</th>
                                <th scope="col">commentaire</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($data['comments'] as $comment){
                                    echo '
                                        <tr>
                                            <td>'.$comment['name'].'</td>
                                            <td>'.$comment['comment'].'</td>
                                            <td>
                                                <a href="?controller=adminController&page=removeComment&id='.$comment['id'].'" class="btn btn-sm btn-danger">Supprimer</a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=$GLOBALS['BASE_URL']?>/assets/js/bootstrap.min.js"></script>
</body>
</html>