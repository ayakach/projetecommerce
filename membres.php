<?php
session_start();
$bdd= new PDO('mysql:host=localhost;dbname=espace_admin;','root','');

if(!$_session=['mdps'])
{ header('location:connexion.php');}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Afficher les membres</title>
   </head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <body>

     <!--afficher tous les membres-->
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
             <a class="nav-link " aria-current="page" href="membres.php" style="font-weight:bold;"> Members</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="publier_article.php">Ajouter nouveau Produits</a>
           </li>

         </ul>
         <div style="display:flex; justify:content:flex-end;">
           <a href="logout.php" class="btn btn-danger"> Logout</a>
         </div>

       </div>
     </div>
   </nav>
   <div class="container my-5">
     <h2>La liste des Clients</h2>
     <a  class="btn btn-primary" href="newClient.php" role="button"> Nouveau Client</a>

   </div>

   <table class="table" style="margin-left:150px;  width:1050px;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Telephone</th>
      <th scope="col">Adresse</th>
      

    </tr>
  </thead>
  <tbody>
    <?php
       $recupUsers=$bdd->query('SELECT * FROM membres');
       while ($user=$recupUsers->fetch())
       { ?>

         <tr>
           <th ><?= $user['id'];?></th>
           <td><?= $user['pseudo']; ?></td>
           <td><?= $user['nom']; ?></td>
           <td> <?= $user['numero_tele']; ?></td>
           <td> <?= $user['email']; ?></td>
           
           <td>

              <a href="bannir.php?id=<?= $user['id'];  ?>"class="btn btn-danger btn-sum" >Supprimer </a> </td>
         </tr>

           <?php
       }
     ?>
  </tbody>

</table>







   </body>
 </html>
