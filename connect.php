<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mcte6416_bdgestionclient', 'mcte6416_bdgestionclient', '#db7c,2@G(VF', [PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION]);
  //echo "La connexion est établie avec succès";
} 
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
?>