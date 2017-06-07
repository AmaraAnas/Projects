<?php

// Redirige l'utilisateur s'il n'est pas identifié
if(empty($_COOKIE["ID_ADMIN"]))
{
     header("Location: connexion.php");
}
else
{
     // Suppression des cookies
     setcookie("ID_ADMIN", "", time() - 1, "/");
     setcookie("PSEUDO", "", time() - 1, "/");

     // Redirection de l'utilisateur
     header("Location: index.php");
     
}

?>