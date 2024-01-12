<?php
session_start();
$bdd= new PDO('mysql:host=localhost;dbname=espace_admin;','root','');

   if(isset($_GET['id']) AND (!empty($_GET['id'])))
     { $getid=$_GET['id'];
       $recupUser= $bdd->prepare('SELECT * FROM membres WHERE id=? ');
      $recupUser->execute(array($getid));
      if($recupUser->rowCount() >0)
      {$bannirUser= $bdd->prepare('DELETE FROM membres WHERE id=?');
       $bannirUser->execute(array($getid));
        header('location:membres.php');

    }
      else echo "Ce membre n'existe pas";
      }

   else{
       echo "l'identifiant n'a pas ete recuperer";
     }



 ?>
