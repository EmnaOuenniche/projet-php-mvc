<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="<?=$GLOBALS['BASE_URL']?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['BASE_URL']?>/assets/trix/trix.css">
    <script type="text/javascript" src="<?=$GLOBALS['BASE_URL']?>/assets/trix/trix.js"></script>
</head>
<body>
<?php include_once('app/views/includes/main-navbar.php'); ?>

<div class="container pt-5 pb-5">
    <div class="row pt-5 pb-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="text-align:center;">
            <h1>Ajouter un article</h1><br>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Titre de l'articel</label>
                    <input name="title" type="text" class="form-control" required>
                </div>
                <br>
                <div class="form-group" style="text-align:left;">
                    <label>Contenue de l'article</label>
                    <input id="content" type="hidden" name="content" name="content">
                    <trix-editor input="content"></trix-editor>
                </div>
                <br>
                <div class="mb-3">
                    <label>Choisir image de l'article</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <input type="submit" value="ajouter un article" class="btn btn-primary">
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>

<script src="<?=$GLOBALS['BASE_URL']?>/assets/summernote/summernote-bs4.min.js" ></script>
<script src="<?=$GLOBALS['BASE_URL']?>/assets/js/bootstrap.min.js"></script>
</body>
</html>