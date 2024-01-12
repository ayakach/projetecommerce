<?php
session_start();
//on va le stocket dans un array
$_session = array();
session_destroy();
header('location:connexion.php');
 ?>