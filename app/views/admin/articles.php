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
                    <h1>Liste des articles</h1><br>
                    <form action="" method="GET">
                        
                    </form>
                </div>
            </div>
            <div class="row">
                <!-- list articles -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Date Creation</th>
                            <th scope="col">Status</th>
                            <th scope="col">propriétaire</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            foreach($data['articles'] as $article){
                                echo '
                                    <tr>
                                        <td>'.$article['id'].'</td>
                                        <td>
                                            <img src="'.$article['image'].'" width="20" height="20"/>
                                        </td>
                                        <td>'.$article['title'].'</td>
                                        <td>'.$article['date'].'</td>
                                        <td>';
                                        if($article['status'] == "no"){
                                            echo '
                                                <a href="?controller=adminController&page=approuve&id='.$article['id'].'" class="btn btn-success btn-sm">Approuver</a>
                                            ';
                                        }else{
                                            echo $article['status'];
                                        }
                                        
                                        echo '</td>
                                        <td>'.$article['user'].'</td>
                                        <td>
                                            <a href="?controller=articleController&page=article&id='.$article['id'].'" target="_blanc" class="btn btn-sm btn-success">Afficher</a>
                                            <a href="" class="btn btn-sm btn-warning">Modifier</a>
                                            <a href="" class="btn btn-sm btn-danger">Supprimer</a>
                                            <a href="?controller=adminController&page=comments&id='.$article['id'].'" class="btn btn-sm btn-secondary">Avis</a>
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