<?php
session_start();
 $bdd= new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
 if(!$_session=['mdps'])
 { header('location:connexion.php');}
 ?>

 <!doctype html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Hugo 0.104.2">
     <title>Albums </title>


     <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


     <style>
       .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
       }

       @media (min-width: 768px) {
         .bd-placeholder-img-lg {
           font-size: 3.5rem;
         }
       }

       .b-example-divider {
         height: 3rem;
         background-color: rgba(0, 0, 0, .1);
         border: solid rgba(0, 0, 0, .15);
         border-width: 1px 0;
         box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
       }

       .b-example-vr {
         flex-shrink: 0;
         width: 1.5rem;
         height: 100vh;
       }

       .bi {
         vertical-align: -.125em;
         fill: currentColor;
       }

       .nav-scroller {
         position: relative;
         z-index: 2;
         height: 2.75rem;
         overflow-y: hidden;
       }

       .nav-scroller .nav {
         display: flex;
         flex-wrap: nowrap;
         padding-bottom: 1rem;
         margin-top: -1px;
         overflow-x: auto;
         text-align: center;
         white-space: nowrap;
         -webkit-overflow-scrolling: touch;
       }
     </style>


   </head>
   <body>




 <header>

   <nav class="navbar navbar-expand-lg bg-light">
   <div class="container-fluid">
     <a class="navbar-brand" href="page.php">For you sweetie</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="articles.php" style="font-weight:bold;"> Articles</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="membres.php"> Members</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" href="publier_article.php" >Ajouter Nouveau Produits  </a>
         </li>
        
       </ul>
          <div style="display:flex; justify:content:flex-end;">
            <a href="logout.php" class="btn btn-danger"> Se deconnecter</a>
          </div>

       </ul>

     </div>
   </div>
 </nav>
 </header>

 <main>



   <div class="album py-5 bg-light">
     <div class="container">

       <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

         <?php
            $recupArticles=$bdd->query('SELECT * FROM articles');
            while ($article=$recupArticles->fetch())
            { ?>

         <div class="col">
           <div class="card shadow-sm">
               <title><?=$article['titre'];?></title><img src="<?=$article['image']?>"  alt="" style="width:200px; text-align:center;">
             <div class="card-body">
               <p class="card-text">
                 <?=  substr($article['description'],0,200); ?></p>
               <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                   <a href="modifier_article.php?id=<?= $article['id'];?>">
                     <button type="button" class="btn btn-sm btn-outline-secondary" style="padding:1px; margin:5px; background-color:#0096FF; color:white;">Modifier</button></a>

                     <a href="supprimer_article.php?id=<?= $article['id'];?>">
                       <button type="button" class="btn btn-sm btn-outline-secondary" style="padding:1px;margin:5px;background-color:#953553; color:white;">Supprimer</button></a>
                 </div>
                 <small class="text-muted" >    <?=$article['prix'];?> DH</small>
                       <br>
               </div>
             </div>
           </div>

         </div>


         <?php

         }
         ?>


       </div>
     </div>
   </div>

 </main>






   </body>
 </html>