<?php
session_start();
$bdd= new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
    if(!$_session=['mdps'])
   { header('location:connexion.php');}

    if(isset($_POST['envoi']))
     {if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['image']) AND !empty($_POST['prix']) AND !empty($_POST['categorie']) )
       { $titre=htmlspecialchars($_POST['titre']);
         $description=nl2br(htmlspecialchars($_POST['description']));
         $prix=htmlspecialchars($_POST['prix']);
         $image=htmlspecialchars($_POST['image']);
         $categorie=htmlspecialchars($_POST['categorie']);
         $insererArticle=$bdd->prepare('INSERT INTO articles(image,titre,prix,description,categorie) Values (?,?,?,?,?)');
         $insererArticle->execute(array($image,$titre,$prix,$description,$categorie));
         header('location:articles.php');

          echo "votre article a ete envoyer";

       }
       else echo" veuillez complete tous les champs...";
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Publier un article</title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <body>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="page.php">For you sweetie</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="articles.php"> Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="membres.php"> Members</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="publier_article.php" style="font-weight:bold;" >Ajouter nouveau Produit </a>
          </li>

        </ul>

      </div>
    </div>
  </nav>
    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <form class="" action=" " method="POST" style="border-radius: 10px;  border: 3px solid grey ;padding:20px 10px; margin-left:400px;">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Titre </label>
      <input type="name" class="form-control"  name="titre" required>
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <textarea class="form-control" name="description" required></textarea>
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Image</label>
      <input type="url" class="form-control" name="image"  required>
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Prix</label>
      <input type="number" class="form-control" name="prix" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Categorie</label>
    <select name="categorie">
      <option value="Homme"> Makeup</option>
      <option value="Homme"> produit capilaire</option>
      <option value="Femme">Produit soin </option></select></div>



    <button type="submit" class="btn btn-success" name="envoi" value="Envoyer" style="margin-left:70px;">Ajouter le nouveau Article</button>


  </form>
</div></div></div>

  </body>
</html>
