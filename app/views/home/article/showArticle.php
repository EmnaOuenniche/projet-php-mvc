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
        <div class="col-sm-1"></div>
        <div class="col-sm-10 pb-5">
            <div style="text-align:center;">
                <h1 ><?=$data['article']['title']?></h1><br>
                <img src="<?=$data['article']['image']?>" width="auto" height="500px"><br><br>
                <p>
                    <b>Date Creation : </b> <?=$data['article']['date']?><br>
                    <b>Auteur / propriétaire : </b><?=$data['article']['user']?><br>
                    <b>Avis :</b> <?=$data['article']['AVGnote']?> (<?=$data['article']['notesCount']?> avis)<br>
                </p>
            </div>
            
            <hr>
            <?=$data['article']['content']?><br>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <hr>
    <div class="row pt-5 pb-5">
        <div class="col-sm-12">
            <h3>Commentaires</h3>
        </div>
        <div class="col-sm-5">
            <form action="?controller=commentController&page=add&user_id=<?=$_SESSION['id']?>&article_id=<?=$_GET['id']?>" method="POST">
                <div class="mb-3">
                    <label  class="form-label">Ecrire un Commentaire</label>
                    <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="ajouter commentaire">
            </form>
        </div>
        <div class="col-sm-5">
            <div class="mb-3">
                <label  class="form-label">Donner votre note (votre reponse : <?=$data['article']['note'] ?>)</label><br>
                <a href="?controller=noteController&page=add&user_id=<?=$_SESSION['id']?>&article_id=<?=$_GET['id']?>&note=1" class="btn btn-secondary btn-sm">1</a>
                <a href="?controller=noteController&page=add&user_id=<?=$_SESSION['id']?>&article_id=<?=$_GET['id']?>&note=2" class="btn btn-secondary btn-sm">2</a>
                <a href="?controller=noteController&page=add&user_id=<?=$_SESSION['id']?>&article_id=<?=$_GET['id']?>&note=3" class="btn btn-secondary btn-sm">3</a>
                <a href="?controller=noteController&page=add&user_id=<?=$_SESSION['id']?>&article_id=<?=$_GET['id']?>&note=4" class="btn btn-secondary btn-sm">4</a>
                <a href="?controller=noteController&page=add&user_id=<?=$_SESSION['id']?>&article_id=<?=$_GET['id']?>&note=5" class="btn btn-secondary btn-sm">5</a>
            </div>
        </div>
        <div class="col-sm-2">
            <?php
                if($data['article']['isFavorit']){
                    echo '
                        <a href="?controller=favoritController&page=add&user_id='.$_SESSION['id'].'&article_id='.$_GET['id'].'" class="btn btn-danger btn-sm">supprimer favoris</a>
                    ';
                }else{
                    echo '
                        <a href="?controller=favoritController&page=remove&user_id='.$_SESSION['id'].'&article_id='.$_GET['id'].'" class="btn btn-primary btn-sm">Ajouter au favoris</a>
                    ';
                }
            ?>
        </div>
        <div class="col-sm-12">
            <!-- List of Comments -->
            <?php
                foreach ($data['article']['comments']  as $comment) {
                    echo '
                    
                    <div class="row p-5">
                        <div class="col-sm-6">
                            <span><b>'.$comment['name'].'</b><small> ('.date('d/m/Y H:i:s',$comment['date']).')</small></span><br>
                            <span>'.$comment['comment'].'</span>
                        </div>
                    </div>
                    
                    ';
                }


            ?>
            
        </div>
    </div>
</div>

<script src="<?=$GLOBALS['BASE_URL']?>/assets/js/bootstrap.min.js"></script>
</body>
</html>