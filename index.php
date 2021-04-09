<?php
include("connect.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Gestion Client</h1>
  <p>Accueil</p> 
</div>



<div class="container" style="margin-top:30px">
  <div class="row">

    
    <div class="col-sm-12">
      

      <div id="container" style="margin-top:10%">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h2>Connexion</h2>
                
                <label><b>Numéro Personnel</b></label>
                <input type="text" placeholder="Entrer le numéro personnel" name="num_personnel" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" name='formconnexion' value='CONNEXION' >

                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                <a class="inscription" href="inscription.php">Inscritption</a>
            </form>
           
        </div>
    </div>
  </div>
</div>
</body>
</html>
