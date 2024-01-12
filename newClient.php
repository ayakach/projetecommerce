<?php
$bdd= new PDO('mysql:host=localhost;dbname=espace_admin;','root','');

$pseudo="";
$nom="";
$email="";
$Telephone="";
$Adresse="";
$errorMessage="";
$messagesucces="";
if($_SERVER['REQUEST_METHOD']=='POST')
{ $pseudo=$_POST["pseudo"];
  $nom=$_POST["nom"];
  $email=$_POST["email"];
  $Telephone=$_POST["Telephone"];

  do{ if(empty($pseudo) AND empty($nom) AND empty($email) AND empty($Telephone))
  {  $errorMessage="tous les champs son existes";
    break;}

    //insertion sur la base de donnes

    $sql="INSERT INTO membres(pseudo,nom,email,numero_tele)".
          "VALUES('$pseudo','$nom','$email','$Telephone')";
          $result=$bdd->query($sql);
            if(!$result)
     {      $errorMessage="Invalid query:"  .$bdd->error;
             break;}
    $pseudo="";
    $nom="";
    $email="";
    $Telephone="";
    $messagesucces="ce client est cree avec succes";

    header("location:membres.php");
    exit;


  } while(false);
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container my-5" style="margin-left:250px; width:1000px;">
      <h2>Nouveau Client</h2>
    <?php
     if(!empty($errorMessage)){
       echo"
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
       <strong> $errorMessage </strong>
       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label=''></button>
       </div> " ;   }


      ?>
      <form  method="Post" >
        <div class="row mb-3">
          <label  class="col-sm-3 col-form-label">Prenom</label>
          <div class="col-sm-5 ">
              <input type="text" class="form-control" name="pseudo" value"">
          </div>
        </div>

        <div class="row mb-3">
          <label  class="col-sm-3 col-form-label">Nom</label>
          <div class="col-sm-5 ">
              <input type="text" class="form-control" name="nom" value"">
          </div>
        </div>

        <div class="row mb-3">
          <label  class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-5 ">
              <input type="text" class="form-control" name="email" value"">
          </div>
        </div>

        <div class="row mb-3">
          <label  class="col-sm-3 col-form-label">Telephone</label>
          <div class="col-sm-5 ">
              <input type="number" class="form-control" name="Telephone" value"">
          </div>
        </div>

        <div class="row mb-3">
          <label  class="col-sm-3 col-form-label">Adresse</label>
          <div class="col-sm-5 ">
              <input type="text" class="form-control" name="Adresse" value"">
          </div>
        </div>

        <div class="row mb-3">
          <div class="offset-sm-3 col-sm-3 d-grid ">
        <button type="submit" class="btn btn-primary" href="membres.php">Valider</button> </div>
          <div class=" col-sm-3 d-grid ">
        <a type="submit" class="btn btn-outline-primary" href="membres.php" role="button">Cancel</a> </div>
      </div></div>
        <?php
           if(!empty($messagesucces))
         {echo"  <div class='row mb-3'>
             <div class='offset-sm-3 col-sm-3 d-grid ''>
             <div class='alert alert-success alert-dismissible fade show' role='alert'>
             <strong>$messagesucces</strong>
             <button type='button' class='btn-close' data-bs-dismiss='alert' area-label='Close'></button></div>
         " ;}
         ?>









      </form>

    </div>


  </body>
</html>
