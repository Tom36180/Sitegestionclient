<?php
session_start();
if(isset($_POST['num_personnel']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'mcte6416_bdgestionclient';
    $db_password = '#db7c,2@G(VF';
    $db_name     = 'mcte6416_bdgestionclient';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $numPersonnel = htmlspecialchars($_POST['num_personnel']); 
    $password = $_POST['password'];
    
    if($numPersonnel !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM personnel where 
              num_Personnel = '".$numPersonnel."' and motdepasse = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['numPersonnel'] = $numPersonnel;
           //$_SESSION['numPersonnel'] = mysqli_query('SELECT personnel.num_Personnel FROM personnel WHERE personnel.num_Personnel LIKE "$numPersonnel"');
           header('Location: main.php');
        }
        else
        {
           header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php');
}
mysqli_close($db); // fermer la connexion
?>