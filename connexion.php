<?php
session_start();
$erreur="";
if(isset($_POST['valider']))
{
  if(!empty($_POST['pseudo']) and !empty($_POST['mdps']))
  {  $_pseudo_par_defaut="admin";
    $_mdps_par_defaut_="admin12345";

     $_pseudo_saisi=htmlspecialchars($_POST['pseudo']);
     $_mdps_saisi=htmlspecialchars($_POST['mdps']);
      if($_pseudo_par_defaut==$_pseudo_saisi and $_mdps_par_defaut_==$_mdps_saisi)
      {
         $_session['mdps']=$_mdps_saisi;
         header('location:page.php');
      }
      else{
        echo"veuillez de saisir votre pseudo ou mdps est incorrect";
      }
   }
  else{
    $erreur="veuillez completer tous les champs";
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> espace de connexion admin</title>
    <link rel="stylesheet" href="conx2.css">
  </head>
  <body>
  <div class="navbar">
  <a href="acceuil.php">ACCEUIL</a>
  <a href="nosoffres.php">NOS OFFRES </a>
  <a href="makeup.php">MAKEUP</a>
  <a href="soins.php">SOIN DE LA PEAU</a>
  <a href="cheveux.php">CHEVEUX</a>
  <a href="connexion.php">VOTRE ESPACE</a>
  <a href="contacter.php">CONTACTER NOUS</a>
</div>

    <form method="POST" action="" style="text-align:center;" class="box">
     <h1>Connexion</h1>
       <input type="text" name ="pseudo" autocomplete="on" placeholder="Nom d'utilisateur">
       <br>
       <input type="password" name="mdps" placeholder="Mot de passe"> <br><br>
       <input type="submit" name="valider" value="Connexion" class="button">
       <p class="box-register">Vous êtes nouveau ici?
           <a href="inscription.php">S'inscrire</a>
    </form>
    <?php if(!empty($erreur)) { ?>
    <div class="erreur" style="background-color: #C00;  color:white;  padding:10px;">
    <?php echo $erreur ?>
    <?php  } ?>
    </div>

  </body>
</html>
