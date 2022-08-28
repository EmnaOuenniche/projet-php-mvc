<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<?php include_once('app/views/includes/main-navbar.php'); ?>
<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-sm-12" style="text-align:center;">
            <h1>Projet Blog MVC</h1>
        </div>

        <div class="col-sm-12 pt-5" style="text-align:center;">
            <h3>Liste Des Articles</h3>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <?php
                    foreach ($data["articles"] as $article) {
                        echo '
                        <div class="col-sm-4 pt-4 pb-4">
                            <div class="card" style="width:100%">
                                <img src="'.$article['image'].'" class="card-img-top" width="100%" height="350px">
                                <div class="card-body">
                                    <h5 class="card-title">'.$article['title'].'</h5>
                                    <p class="card-text"><b>Auteur : </b>'.$article['user'].'</p>
                                    <a href="?controller=articleController&page=article&id='.$article['id'].'" class="btn btn-primary">Consulter l\'article</a>
                                </div>
                            </div>
                        </div>
                        
                        
                        ';
                    }


                ?>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>