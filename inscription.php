
<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="espace_admin";
 try{
  $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 }
 catch(PDOException $e){
  echo"la connection a echoué:" . $e->getMessage();
 }

if(isset($_POST['pseudo']))
{
  $pseudo=$_POST['pseudo'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $numero_tele=$_POST['numero_tele'];
  $email=$_POST['email'];
  $mot_de_passe=$_POST['mot_de_passe'];

  $sql=("INSERT INTO `membres`(`pseudo`,`nom`,`prenom`,`numero_tele`,`email`,`mot_de_passe`) VALUES (:pseudo ,:nom , :prenom ,:numero_tele ,:email ,:mot_de_passe)");
 $stmt=$conn->prepare($sql);
 $stmt->bindparam(':pseudo',$pseudo);
 $stmt->bindparam(':nom',$nom); 
 $stmt->bindparam(':prenom',$prenom);
 $stmt->bindparam(':numero_tele',$numero_tele);
 $stmt->bindparam(':email',$email);
 $stmt->bindparam(':mot_de_passe',$mot_de_passe);
 $stmt->execute();
 $message = "Bienvenu chez nous ";
echo '<script>alert("' . $message.$pseudo. '");</script>';
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="cssinscription.css">
    
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
  
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url(photosvideos/pinckbg.jpg);
    }

    .container {
      width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .input-group input {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .input-group input[type="submit"] {
      width: auto;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background: #a15f8b;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .input-group input[type="submit"]:hover {
      background-color: pink;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Inscription</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="input-group">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required>
      </div>
      <div class="input-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="input-group">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>
      <div class="input-group">
        <label for="numero_tele">Numéro de téléphone :</label>
        <input type="text" id="numero_tele" name="numero_tele" required>
      </div>
      <div class="input-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="motdepasse">Mot de passe  :</label>
        <input type="password" id="motdepasse" name="mot_de_passe" required>
      </div>
      <div class="input-group">
        <center><input type="submit" value="S'inscrire"></center>
      </div>
    </form>
  </div>
</body>
</html>
</html>