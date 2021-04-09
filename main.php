<?php
include("connect.php");
?>
<!-- tester si l'utilisateur est connecté -->
<?php
session_start();
global $userID;
$userID = $_SESSION['numPersonnel'];

if(isset($_GET['deconnexion']))
{ 
  if($_GET['deconnexion']==true)
  {  
    session_unset();
    header("location:index.php");
  }
}
else{            
  // afficher un message
  $reponse = $bdd->query('SELECT personnel.nom_Personnel From personnel WHERE personnel.num_Personnel LIKE "'.$_SESSION['numPersonnel'].'"');
  while ($_SESSION = $reponse->fetch())
  {
            //echo $_SESSION['nom_Personnel'];
    $userName = $_SESSION['nom_Personnel'];
  }
  //echo "<br>Bonjour ". $userName." , vous êtes connectés! Votre id est : ".$userID;
  //echo '</br><a href="main.php?deconnexion=true">Déconnexion</a>';
}
?>

<!DOCTYPE html>
<html lang="fr" class="mp-page" >
<meta charset="utf-8">
  <head>
    <title>Vous concérnants</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    

  </head>
  <body >

    <div class="jumbotron text-center" style="margin-bottom:0">
      <div class="float-end">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="user.png" width="30px">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <li class="dropdown-item"><?="Bonjour ". $userName.",<br/> Votre id est : ".$userID?></li>
          <a href="main.php?deconnexion=true"><li class="dropdown-item">Déconnexion</li></a>
        </ul>
      </div>
      <h1>Vous concérnants !</h1>
    </div>
    <br />

    <div class="row">
    <div class="col-xl-1"></div>
    <div class="col-xl-10">
      <div class="table-affichage">          
          <!--TABLEAU DEMANDES-->
          <fieldset><legend>Demandes en Attentes</legend>
          <!-- Bouton d'ajout de daemande
            <div class="legend2" ><a href=""><img src="add.png" width="20px"></a></div>
          -->
            <table id="example" class="display example table table-striped">
              <thead>
                <tr>
                  <th>Numéro Demande</th>
                  <th>Intitulé</th>
                  <th>Description</th>
                  <th>Client</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $req = $bdd->query('SELECT num_Demande,nom_DEMANDE,Num_Client From demande WHERE num_Personnel LIKE "'.$userID.'"');
                while($donne=$req->fetch())
                {
                  echo'<tr><td>'.$donne['num_Demande'].'</td>';
                  echo'<td>'.$donne['nom_DEMANDE'].'</td>';
                  echo '<td>Cliquez ici pour la description de cette demande! </td>';
                  echo '<td>'.$donne['Num_Client'].'</td></tr>';
                }
                $req->closeCursor();
                ?>
              </tbody>
            </table>
          </fieldset>
        </div>

        <br/><br />

        <div class="table-affichage">  
          <!--TABLEAU INTERVENTIONS-->
          <fieldset><legend>Intervention Réalisées</legend>
          <!--Bouton d'ajout d'intervention
            <div class="legend2" ><a href=""><img src="add.png" width="20px"></a></div>
          -->
            <table id="example" class="display example">
              <thead>
                <tr>
                  <th>Numéro Intervention</th>
                  <th>Intitulé</th>
                  <th>Description</th>
                  <th>Client</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $req = $bdd->query('SELECT num_Intervention,nom_Intervention,Num_Client From intervention WHERE num_Personnel LIKE "'.$userID.'"');
                while($donne=$req->fetch())
                {
                  echo'<tr><td>'.$donne['num_Intervention'].'</td>';
                  echo'<td>'.$donne['nom_Intervention'].'</td>';
                  echo '<td>Cliquez ici pour la description de cette intervention! </td>';
                  echo '<td>'.$donne['Num_Client'].'</td></tr>';
                }
                $req->closeCursor();
                ?>
              </tbody>
            </table>
          </fieldset>
        </div>
        <br /> <br />
        </div>
      </div>
      <div class="col-xl-1"></div>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('.example').DataTable({
      "language": {
        "url" : "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
      }
    });
} );
</script>