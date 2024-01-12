<?php
 $bdd= new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
  if(isset($_GET['id']) AND !empty($_GET['id']))
  { $getid=$_GET['id'];
    $recupArticle= $bdd->prepare('SELECT * FROM articles WHERE id=? ');
    $recupArticle->execute(array($getid));
     if($recupArticle->rowCount() >0)
     {  $articleInfos=$recupArticle->fetch();
       $titre=$articleInfos['titre'];
       $image=$articleInfos['image'];
       $description=str_replace('<br />',' ',$articleInfos['description']);
       $prix=$articleInfos['prix'];
    if(isset($_POST['Valider']))
  {
      $titre_saisi=htmlspecialchars($_POST['titre']);
      $image_saisi=htmlspecialchars($_POST['image']);
        $description_saisie=nl2br(htmlspecialchars($_POST['description']));
        $prix_saisi=htmlspecialchars($_POST['prix']);
        $updateArticle=$bdd->prepare('UPDATE articles SET titre=?, image=?,description=?, prix=? WHERE id=?');
        $updateArticle->execute(array($titre_saisi,$image_saisi,$description_saisie,$prix_saisi,$getid));
       header('location:articles.php');
}

      }
        else { echo "Aucun Article trouve"; }
  }
  else{ echo "Aucun identifiant trouve";}
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
             <a class="nav-link active" aria-current="page" href="articles.php" > Articles</a>
           </li>
           <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="membres.php"> Members</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="publier_article.php" style="font-weight:bold;" >Ajouter nouveau produit </a>
           </li>

         </ul>

       </div>
     </div>
   </nav>
     <div class="album py-5 bg-light" >
       <div class="container">

         <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
           <form class="" action=" " method="POST" style="border-radius: 10px;  border: 3px solid #961BFF ;padding:20px 10px; margin-left:400px;"  >
     <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label">Titre </label>
       <input type="name" class="form-control"  name="titre" value="<?= $titre;?>" required>
     </div>



     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Image</label>
       <input type="text" class="form-control" name="image" value="<?= $image;?>" required>
     </div>


     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Prix</label>
       <input type="number" class="form-control" name="prix"value="<?= $prix;?>" required>
     </div>
     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Description</label>
      <textarea name="description" class="form-control" required><?=$description;?></textarea>
        </div>
     <button type="submit" class="btn btn-primary" name="Valider" value="Valider"style="margin-left:130px;" >Modifier</button>


   </form>
 </div></div></div>

   </body>
 </html>
