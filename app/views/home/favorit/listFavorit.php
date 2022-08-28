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
                    <h1>Liste des articles favorits</h1><br>
                    <form action="" method="GET">
                        
                    </form>
                </div>
            </div>
            <div class="row">
                <!-- list articles -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($data['articles'] as $article){
                                echo '
                                    <tr>
                                        <td>'.$article['title'].'</td>
                                        <td>
                                            <a href="?controller=favoritController&page=remove&id='.$article['id'].'" class="btn btn-sm btn-danger">Supprimer</a>
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
<script src="<?=$GLOBALS['BASE_URL']?>/assets/js/bootstrap.min.js"></script>
</body>
</html>