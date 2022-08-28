<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="?controller=homeController" class="nav-link link-dark px-2 active" aria-current="page">Acceuil</a></li>
        <?php
          if(isset($_SESSION['id']) && isset($_SESSION['role'])){
            if($_SESSION['role'] == "3"){
              // lecteur - normal user
              echo '
                <li class="nav-item"><a href="?controller=favoritController&page=listFavorit" class="nav-link link-dark px-2">Favoris</a></li>
              ';
            }
            if($_SESSION['role'] == "2"){
              // lecteur - Auteur
              echo '
                <li class="nav-item"><a href="?controller=articleController&page=myArticles" class="nav-link link-dark px-2">Mes Articles</a></li>
                <li class="nav-item"><a href="?controller=articleController&page=addArticle" class="nav-link link-dark px-2">Ajouter un Article</a></li>
              ';
            }
            if($_SESSION['role'] == "1"){
              // lecteur - Admin
              echo '
                <li class="nav-item"><a href="?controller=adminController&page=addArticle" class="nav-link link-dark px-2">Ajouter un Article</a></li>
                <li class="nav-item"><a href="?controller=articleController&page=myArticles" class="nav-link link-dark px-2">Mes Articles</a></li>
                <li class="nav-item"><a href="?controller=adminController&page=listArticles" class="nav-link link-dark px-2">Tous les articles</a></li>
                <li class="nav-item"><a href="?controller=adminController&page=users" class="nav-link link-dark px-2">Utilisateurs</a></li>
                <li class="nav-item"><a href="?controller=adminController&page=statistiques" class="nav-link link-dark px-2">Statistiques</a></li>

              ';
            }
          }
        ?>
      </ul>
      <ul class="nav">
        <?php
          if(isset($_SESSION['id']) && isset($_SESSION['role'])){

            echo '
              <li class="nav-item"><a href="?controller=userController&page=logout" class="nav-link link-dark px-2">Déconnexion</a></li>
            ';
          }else{
            echo '
              <li class="nav-item"><a href="?controller=userController&page=login" class="nav-link link-dark px-2">connexion</a></li>
              <li class="nav-item"><a href="?controller=userController&page=register" class="nav-link link-dark px-2">Inscription</a></li>
            ';
          }
        ?>
        
      </ul>
    </div>
</nav>